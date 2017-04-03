<?php
namespace Multiple\Frontend\Controllers;

use Phalcon\Mvc\View;
use Phalcon\Http\Request;
use Phalcon\Db\RawValue;
use Multiple\Shared\Models;
use Multiple\Shared\Models\Orders;
use Multiple\Shared\Models\Rooms;
use Multiple\Shared\Models\Users;
use Multiple\Backend\Controllers;

class AjaxController extends ControllerBase
{

   public function initialize()
   {
      parent::initialize();

      $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
      //allow only ajax requests
      if ( !$this->request->isAjax() ) {
         return false;
      }
   }





   protected function isOrderDatesCorrect( $orderFrom, $orderTo )
   {
      $data_format = 'Y-m-d';

      $today        = strtotime(date($data_format));
      $next_day     = strtotime(date($data_format, strtotime("+1 day")));
      $next_3_month = strtotime(date($data_format, strtotime("+3 month")));

      return ( $orderFrom > $orderTo
         || $orderTo > $next_3_month
         || $today > $orderFrom
         || $today > $orderTo
         || $today > $next_day
         || $orderFrom == $orderTo
      );
   }





   public function reserveOrderAction()
   {
      $order = $this->session->get('order');

      if ( $order !== null && $order->save() ) {
         $this->session->remove('order');
         die( '{"status":"1"}' );
      }

      die( '{"message":"' . $this->t->_("#o_selectdays") . '", "status":"2"}' );
   }





   public function checkPaypalAction()
   {
      $fromDate = strtotime($this->request->getPost('dateFrom'));
      $toDate   = strtotime($this->request->getPost('dateTo'));

      if ( $this->isOrderDatesCorrect($fromDate, $toDate) ) {
         die( '{"message": "Invalid dates input", "status":"2"}' );
      }

      $villaID = $this->request->getPost('villaID', 'int');
      $villa   = Rooms::findFirst($villaID);


      //что за статус 2? хм наверное ошибка
      if ( $villa == false ) {
         die( '{"message": "Invalid dates input", "status":"2"}' );
      }

      $orders = Orders::find([
         'villa_id = ?0',
         'bind' => [ $villaID ]
      ]);


      //проверяем забронировал ли этот заказ
      foreach ( $orders as $order ) {

         $isDatesCorrect =
            ( $fromDate > $order->ordered_from && $toDate > $order->ordered_to && $fromDate > $order->ordered_to )
            || ( $order->ordered_from > $fromDate && $order->ordered_to > $toDate && $order->ordered_from > $toDate );

         if ( !$isDatesCorrect ) {
            $this->session->remove('order');
            die( '{"message": "Villa has already ordered for these days", "status":"2"}' );
         }
      }

      $authInfo            = $this->session->get('authIdentity');
      $order               = new Orders();
      $order->user_id      = $authInfo['userID'];
      $order->villa_id     = $villaID;
      $order->ordered_from = $fromDate;
      $order->ordered_to   = $toDate;
      $order->created_at   = new RawValue('now()');
      $order->is_payed     = 0;
      $order->save();

      $this->session->set('order', $order);

      $totalDays = floor(( $toDate - $fromDate ) / ( 60 * 60 * 24 ));
      die( '{"status":1, "message": "' . $totalDays . ' days - Order now", "days":"' . $totalDays . '"}' );
   }





   public function userAddFavouritesAction()
   {
      $authInfo = $this->session->get('authIdentity');

      if ( $authInfo ) {
         $villaID = intval($this->request->getPost('villaID'));
         $villa   = Rooms::findFirst($villaID);

         if ( $villa !== false ) {

            $userID = $authInfo['userID'];
            $user   = Users::findFirst($userID);

            if ( $user->favourite_villas == null ) {
               $favourites = [ $villaID ];

            } else {
               $favourites   = unserialize($user->favourite_villas);
               $favourites[] = $villaID;
               $favourites   = array_unique($favourites);
            }

            $user->favourite_villas = serialize($favourites);

            if ( $user->save() ) {
               die( '{"statusClass":"glyphicon-star added-villa"}' );
            }
         }
      }

      die( '{"statusClass":"glyphicon-remove-circle"}' );
   }





   public function removeFavouriteAction()
   {
      $authInfo = $this->session->get('authIdentity');
      $userID   = $authInfo['userID'];

      if ( $userID ) {

         $villaID    = $this->request->getPost('villaID', 'int');
         $user       = Users::findFirst($userID);
         $favourites = unserialize($user->favourite_villas);

         // remove favourite villa
         if ( ( $key = array_search($villaID, $favourites) ) !== false ) {
            unset( $favourites[$key] );
         }

         $user->favourite_villas = serialize($favourites);

         if ( $user->save() ) {
            die( '{"message":"Saved"}' );
         }
      }
   }
}




