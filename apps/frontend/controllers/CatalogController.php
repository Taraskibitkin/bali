<?php

namespace Multiple\Frontend\Controllers;

use Phalcon\Mvc\Model\Query\Builder as Builder;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

use Multiple\Shared\Libs\Helper;
use Multiple\Shared\Models\Rooms;
use Multiple\Shared\Models\Orders;
use Multiple\Shared\Models\RoomLang;
use Multiple\Shared\Models\Hosters;
use Multiple\Shared\Models\HosterLang;
use Multiple\Shared\Models;

class CatalogController extends ControllerBase
{

   public function indexAction()
   {
      $this->view->title = 'Catalog';
      $this->assets->addCss('css/catalogue.css');

      $languageCode = Helper::getLangID($this->session->get('lang'));

      $page = $this->dispatcher->getParam('page');

      $queryParams = [
         'models'     => [ 'Multiple\Shared\Models\Rooms' ],
         'columns'    => [
            'Multiple\Shared\Models\Rooms.id',
            'Multiple\Shared\Models\Rooms.room_price',
            'Multiple\Shared\Models\Rooms.main_img',
            'Multiple\Shared\Models\RoomLang.room_short_title',
            'Multiple\Shared\Models\RoomLang.room_name'
         ],

         'conditions' =>
            'Multiple\Shared\Models\Rooms.room_status = ' . Rooms::ROOM_FREE .
            ' AND Multiple\Shared\Models\RoomLang.lang = ' . $languageCode,
      ];

      $builder = new Builder($queryParams);
      $builder->join('Multiple\Shared\Models\RoomLang',
         'Multiple\Shared\Models\RoomLang.room_id = Multiple\Shared\Models\Rooms.id');
         
         

     $paginator = (new PaginatorQueryBuilder([
            "builder" => $builder,
            "limit"   => 100000,
            "page"    => $page
         ]
      ))->getPaginate(); 

      $this->view->villas = $paginator;
      $this->view->last   = $paginator->last;

      if ( $paginator->total_pages == 1 ) {
      	$this->view->is_paged = false;

      } elseif ( $paginator->total_pages >= 2 ) {

         $this->view->range = range(1, $paginator->last);
      }
   }





   public function villaAction( $villaID )
   {
      if ( ( !filter_var($villaID, FILTER_VALIDATE_INT) === false ) && $villaID > 0 ):

         $villa = Rooms::findFirst($villaID);

         if ( $villa !== false ):

            $this->assets
               ->addCss('css/room.css')
               ->addCss('css/carusel.css');

            $this->assets
               ->addJs('js/click-carousel.min.js')
               ->addJs('js/click-carousel-main.js')
               ->addJs('http://maps.google.com/maps/api/js?sensor=true')
               ->addJs('js/gmaps.js')
               ->addJs('js/map-config.js');

            $languageCode = Helper::getLangID($this->session->get('lang'));

            $result = $this->modelsManager->executeQuery(
               "SELECT r.id, r.google_map_title, r.hoster_id,
                   r.room_google_map, r.room_name, r.room_price, r.room_gallery,
                   rl.room_short_title, rl.room_name, rl.room_desc
               FROM Multiple\Shared\Models\Rooms as r
               INNER JOIN Multiple\Shared\Models\RoomLang as rl
               ON rl.room_id = r.id
               WHERE rl.lang = ?0
               AND r.id = ?1",

               [ $languageCode, $villaID ]
            );

            $this->view->villa = $result{0};

            //gallery
            $gallery              = unserialize($villa->room_gallery);
            $this->view->gallery  = $gallery;
            $this->view->firstImg = $gallery[0];

            $villaLang = RoomLang::findFirst([ 'room_id = ?0 AND lang = ?1',
               'bind' => [ $villaID,
                  $languageCode
               ]
            ]);

            $this->view->title          = $villaLang->seo_title;
            $this->view->seoDescription = $villaLang->seo_desc;

            // hoster
            $hoster                 = Hosters::findFirst($villa->hoster_id);
            $this->view->hoster     = $hoster;
            $this->view->hosterText = $hoster->getHosterLang([ 'lang = ?0',
               'bind' => [ $languageCode ]
            ]);

            // fetch all services
            $query                = $this->modelsManager->createQuery("
                SELECT service_title, service_logo
                FROM Multiple\Shared\Models\RoomServices as rs
                INNER JOIN Multiple\Shared\Models\RoomToServices as rts
                ON rs.id = rts.service_id
                WHERE rts.room_id = ?0"
            );
            $this->view->services = $query->execute([ $villaID ]);

            // fetch all housing
            $query               = $this->modelsManager->createQuery("
          SELECT ro.option_title, rto.option_value
          FROM Multiple\Shared\Models\RoomOptions as ro
          INNER JOIN Multiple\Shared\Models\RoomToOptions as rto
          ON rto.option_id = ro.id
          WHERE rto.room_id = ?0"
            );
            $this->view->housing = $query->execute([ $villaID ]);

         // if wrong id
         else:
            $this->response->redirect('catalog');
         endif;
      else:
         $this->response->redirect('catalog');
      endif;
   }





   public function findAction()
   {
      $this->view->title = 'Find Villas';
      $this->assets->addCss('css/catalogue.css');

      $page          = $this->dispatcher->getParam('page');
      $adultsCount   = $this->request->get('a', 'int');
      $childrenCount = $this->request->get('c', 'int');
      $fromDate      = $this->request->get('from', 'int');
      $toDate        = $this->request->get('to', 'int');
//
//

//      $orders = \Orders::findAll();

      //чтобы узнать

      //mega filter
//      foreach ( $orders as $order ) {
//
//         $isDatesCorrect =
//            ( $fromDate > $order->ordered_from && $toDate > $order->ordered_to && $fromDate > $order->ordered_to )
//            || ( $order->ordered_from > $fromDate && $order->ordered_to > $toDate && $order->ordered_from > $toDate );
//
//         if ( !$isDatesCorrect ) {
//            $this->session->remove('order');
//            die( '{"message": "Villa has already ordered for these days", "status":"2"}' );
//         }
//      }



      $personCount = $adultsCount + $childrenCount;

      $query = $this->modelsManager->createQuery("
          SELECT r.id, room_name, room_short_title, room_status, main_img, room_price
          FROM Multiple\Shared\Models\Rooms as r
          INNER JOIN Multiple\Shared\Models\RoomToOptions as ro
          ON ro.room_id = r.id
          INNER JOIN Multiple\Shared\Models\RoomLang as rl
          ON rl.room_id = r.id AND rl.lang = :lang_id:
          WHERE r.room_status = :room_status:
          AND ro.option_id = 3
          AND CAST( ro.option_value AS UNSIGNED ) >= :person_count:
    ");




      $langID = Helper::getLangID($this->session->get('lang'));

      $villas = $query->execute([
         'person_count' => $personCount,
         'lang_id'      => $langID,
         'room_status'  => Rooms::ROOM_FREE
      ]);

      $paginator = (new PaginatorModel([
         'data'  => $villas,
         'limit' => 9,
         'page'  => $page
      ]))->getPaginate();

      $this->view->villas = $paginator;
      $this->view->last   = $paginator->last;

      if ( $paginator->total_pages == 1 ) {
         $this->view->is_paged = false;

      } elseif ( $paginator->total_pages >= 2 ) {

         $this->view->range = range(1, $paginator->last);
      }

      $this->view->pick("catalog/index");
   }





   public function findRegionAction( $region_id )
   {
      $this->view->title = 'Find By Region';

      $this->assets->addCss('css/catalogue.css');

      $languageCode = Helper::getLangID($this->session->get('lang'));
      $page         = $this->dispatcher->getParam('page');

      $queryParams = [
         'models'     => [ 'Multiple\Shared\Models\Rooms' ],
         'columns'    => [
            'Multiple\Shared\Models\Rooms.id',
            'Multiple\Shared\Models\Rooms.room_price',
            'Multiple\Shared\Models\Rooms.main_img',
            'Multiple\Shared\Models\RoomLang.room_short_title',
            'Multiple\Shared\Models\RoomLang.room_name'
         ],

         'conditions' =>
            'Multiple\Shared\Models\Rooms.room_status = ' . Rooms::ROOM_FREE .
            ' AND Multiple\Shared\Models\Rooms.region_id = ' . $region_id
            . ' AND Multiple\Shared\Models\RoomLang.lang = ' . $languageCode,
      ];

      $builder = new Builder($queryParams);
      $builder->join('Multiple\Shared\Models\RoomLang',
         'Multiple\Shared\Models\RoomLang.room_id = Multiple\Shared\Models\Rooms.id');




      $paginator = (new PaginatorQueryBuilder([
            "builder" => $builder,
            "limit"   => 9,
            "page"    => $page
         ]
      ))->getPaginate();

      $this->view->villas = $paginator;
      $this->view->last   = $paginator->last;

      if ( $paginator->total_pages == 1 ) {
         $this->view->is_paged = false;

      } elseif ( $paginator->total_pages >= 2 ) {

         $this->view->range = range(1, $paginator->last);
      }

      $this->view->pick("catalog/index");
   }
}
