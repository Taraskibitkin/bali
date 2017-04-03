<?php

namespace Multiple\Backend\Controllers;

use Phalcon\Mvc\View;
use Phalcon\Mvc\Model\Query;
use Phalcon\Mvc\Model\Query\Builder as Builder;
use Multiple\Shared\Libs\Helper;
use Multiple\Shared\Models\Users;
use Multiple\Shared\Models\Rooms;
use Multiple\Shared\Models\Orders;

class OrderController extends ControllerBase
{

   public function showAction()
   {
      $orders             = Orders::find([ 'order' => 'ordered_from' ]);
      $this->view->orders = $orders;

      //its better to use phalcon relations but only one method is allowed - findFirst
      //just do it with PHQL, sorry for such dirty coding, just use phalcon first time
      $users = $this->modelsManager->executeQuery("
         SELECT usr.id, usr.name, usr.sourname, usr.email, usr.phone, usr.user_photo
         FROM Multiple\Shared\Models\Orders as ord
         INNER JOIN   Multiple\Shared\Models\Users as usr
         ON ord.user_id = usr.id"
      )->toArray();

      $indexedUsers = [];
      foreach($users as $user){
         if(!isset($indexedUsers[ $user['id'] ])){
            $indexedUsers[ $user['id'] ] = $user;
         }
      }

      //get users from user array by id, that's why I used foreach upper
      $this->view->users = $indexedUsers;



      //English language by default
      $villas = $this->modelsManager->executeQuery("
         SELECT rm.id, rm.room_price, rm.main_img, rl.room_name
         FROM Multiple\Shared\Models\Orders as ord
         INNER JOIN  Multiple\Shared\Models\Rooms as rm
         ON ord.villa_id = rm.id
         INNER JOIN Multiple\Shared\Models\RoomLang as rl
         ON rm.id = rl.room_id AND rl.lang = 1
         "
      )->toArray();

      $indexedVillas = [];
      foreach($villas as $villa){
         if(!isset($indexedVillas[ $villa['id'] ])){
            $indexedVillas[ $villa['id'] ] = $villa;
         }
      }

      $this->view->villas = $indexedVillas;

      $this->view->pick('order/show-orders');
   }





   public function createAction()
   {
      if ( $this->request->isPost() ):
         $this->save();
      endif;

      $this->view->actionTitle = 'Add New Order';
      $this->view->actionForm  = '/admin/order/create';
      $this->view->users       = $this->modelsManager
         ->createQuery("SELECT id, name, sourname FROM Multiple\Shared\Models\Users")
         ->execute();

      $this->view->villas = $this->modelsManager
         ->createQuery("SELECT room_id, room_name FROM Multiple\Shared\Models\RoomLang WHERE lang = ?0")
         ->execute([ $this->session->get('adminLang') ]);

      $this->view->pick('order/edit-order');
   }





   public function editAction( $id )
   {
      if ( $this->request->isPost() ):
         $this->save($id);
      endif;

      $this->view->pick('order/edit-order');
      $this->view->actionTitle = 'Edit Order';
      $this->view->actionForm  = '/admin/order/edit';
      $order                   = Orders::findFirstByid($id);
      $this->view->orderInfo   = $order;

      $this->view->users = $this->modelsManager
         ->createQuery("SELECT id, name, sourname FROM Multiple\Shared\Models\Users")
         ->execute();

      $this->view->villas = $this->modelsManager
         ->createQuery("SELECT room_id, room_name FROM Multiple\Shared\Models\RoomLang WHERE lang = ?0")
         ->execute([ $this->session->get('adminLang') ]);

   }





   public function save( $orderID = 0 )
   {

      if ( $orderID != 0 ) {
         $order = Orders::findFirstByid($orderID);
      } else {
         $order = new Orders();
      }

      $order->user_id      = $this->request->getPost('user_id');
      $order->villa_id     = $this->request->getPost('villa_id');
      $order->is_payed     = $this->request->getPost('is_payed');
      $order->ordered_from = $this->request->getPost('ordered_from');
      $order->ordered_to   = $this->request->getPost('ordered_to');

      if ( !$order->save() ) {

         foreach ( $order->getMessages() as $message ) {
            $this->flash->error($message);
         }
      } else {
         $this->flash->success('Order saved');
      }
   }





   public function deleteAction( $userID )
   {
      $order = Orders::findFirstByid($userID);
      $order->delete();
      $this->response->redirect('/admin/order/show');
   }
}
