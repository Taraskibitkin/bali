<?php

namespace Multiple\Backend\Controllers;

use Multiple\Shared\Models\RoomOptions;
use Multiple\Shared\Models\RoomServices;
use Multiple\Shared\Models\RoomToOptions;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Model\Query\Builder as Builder;
use Multiple\Shared\Libs\Helper;
use Multiple\Shared\Models\Rooms;
use Multiple\Shared\Models\RoomLang;
use Multiple\Shared\Models\Hosters;
use Multiple\Shared\Models\HosterLang;
use Multiple\Shared\Models\Regions;
use Multiple\Shared\Models\RoomToServices;

class VillaController extends ControllerBase
{

   public function showVillasAction()
   {
      $villas = RoomLang::find([
         'lang = :lang:',
         'bind'  => [
            'lang' => $this->session->get('adminLang')
         ],
         'order' => 'id'
      ]);

      $this->view->villas = $villas;
      $this->view->pick('villa/show-villas');

   }





   public function createVillaAction()
   {
      $this->view->actionTitle = 'Add New Villa';
      $this->view->actionForm  = '/admin/villa/saveVilla';

      $this->view->hosters = HosterLang::find([ 'lang = :lang:',
         'bind' => [ 'lang' => $this->session->get('adminLang') ]
      ]);

      $this->view->regions = Regions::find();
      $this->view->pick('villa/edit-villa');
   }





   public function editVillaAction( $id )
   {
      $this->view->actionTitle = 'Edit Villa';
      $this->view->actionForm  = '/admin/villa/saveVilla';
      $this->view->pick('villa/edit-villa');

      if ( $this->request->isGet() ):

         $this->view->villaInfo = Rooms::findFirstByid($id);
         $this->view->regions   = Regions::find();
         $this->view->hosters   = HosterLang::find([
            'lang = :lang:',
            'bind'  => [
               'lang' => $this->session->get('adminLang')
            ],
            'order' => 'id'
         ]);

      endif;
   }





   public function editVillaServicesAction( $id )
   {
      $this->view->villaID = $id;

      //fetch services
      $services                = $this->modelsManager->executeQuery("
      SELECT rs.id, rs.service_title, rs.service_logo
      FROM Multiple\Shared\Models\RoomToServices as rts
      INNER JOIN Multiple\Shared\Models\RoomServices as rs
      ON rts.service_id = rs.id
      WHERE rts.room_id = ?0",
         [ $id ]
      );
      $this->view->services    = $services;
      $this->view->allServices = RoomServices::find();

      //fetch options
      $housing = $this->modelsManager->executeQuery("
        SELECT ro.id, ro.option_title, rto.option_value
        FROM Multiple\Shared\Models\RoomOptions as ro
        INNER JOIN Multiple\Shared\Models\RoomToOptions as rto
        ON rto.option_id = ro.id
        WHERE rto.room_id = ?0",
         [ $id ]
      );

      $this->view->housing    = $housing;
      $this->view->allHousing = RoomOptions::find();

      $this->view->pick('villa/edit-services');
   }





   public function editVillaTextAction( $id )
   {
      $villaLang = RoomLang::findFirst([ 'room_id = :r_id: AND lang = :r_lang: ',
         'bind' => [
            'r_id'   => $id,
            'r_lang' => $this->session->get('adminLang'),
         ]
      ]);

      $this->view->villa = $villaLang;
      $this->view->pick('villa/edit-text');

      if ( $this->request->isPost() && $villaLang ):

         $villaLang->room_name        = $this->request->getPost('room_name');
         $villaLang->room_short_title = $this->request->getPost('room_short_title');
         $villaLang->room_desc        = $this->request->getPost('room_desc') ?: ' ';
         $villaLang->seo_title        = $this->request->getPost('seo_title') ?: ' ';
         $villaLang->seo_desc         = $this->request->getPost('seo_desc') ?: ' ';

         if ( $villaLang->save() ) {
            $this->flash->success('Villa was successfully saved');

         } else {
            $this->flash->error('Something went wrong!');
         }

      endif;
   }





   public function saveVillaAction()
   {

      if ( $this->request->isPost() ):

         $villaID    = $this->request->getPost('id', 'int');
         $isNewVilla = false;

         //if Villa already exists
         if ( $villaID != 0 ) {

            $villa = Rooms::findFirstByid($villaID);

         } else {

            //create new villa here
            $isNewVilla = true;
            $villa      = new Rooms();
         }

         $villa->room_price = $this->request->getPost("room_price");

         //set default value
         if ( !$villa->room_gallery || $isNewVilla ) {
            $villa->room_gallery = ' ';
         }

         if ( isset( $_FILES['main_img']['name'] ) ) {

            $ext        = pathinfo($_FILES['main_img']['name'], PATHINFO_EXTENSION);
            $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $_FILES['main_img']['name']);
            $fileName   = str_replace(' ', '-', trim($withoutExt)) . uniqid() . '.' . $ext;
            $uploaddir  = APP_PATH . '/uploads/images/villas/';
            $uploadfile = $uploaddir . $fileName;

            if ( move_uploaded_file($_FILES['main_img']['tmp_name'], $uploadfile) ) {
               $villa->main_img = $fileName;

            }
         }

         $villa->hoster_id        = $this->request->getPost('hoster_id', 'int');
         $villa->region_id        = $this->request->getPost('region_id', 'int');
         $villa->room_google_map  = $this->request->getPost('room_google_map');
         $villa->google_map_title = $this->request->getPost('google_map_title');

         if ( $villa->save() ):

            //do some stuff for new villa
            if ( $isNewVilla ):

               $langs = Helper::$availableLangs;

               //create languages for villa
               foreach ( $langs as $langName => $langID ):

                  $villaLang                   = new RoomLang();
                  $villaLang->room_name        = ' ';
                  $villaLang->room_desc        = ' ';
                  $villaLang->room_short_title = ' ';
                  $villaLang->room_id          = $villa->id;
                  $villaLang->lang             = $langID;
                  $villaLang->save();
               endforeach;

               $this->flash->success('Villa was successfully created');
               $this->dispatcher->forward([
                  'module' => 'backend',
                  'controller' => 'villa',
                  'action' => 'showVillas'
               ]);

            else:
               $this->flash->success('Villa was updated successfully');
            endif;

         else:
            foreach ( $villa->getMessages() as $message ):
               $this->flash->error($message);
            endforeach;
         endif;
      endif;
   }





   public function deleteVillaAction( $villaID )
   {
      $villa = Rooms::findFirstByid($villaID);

      //we should delete all foreign keys from other tables at first
      if ( $villa !== false ) {

         //remove languages records
         $villaLanguages = RoomLang::find([ 'room_id = :roomID:',
            'bind' => [ 'roomID' => $villaID ]
         ]);

         $villaLanguages->delete();


         //remove services
         $villaServices = RoomToServices::find(([ 'room_id = :roomID:',
            'bind' => [ 'roomID' => $villaID ]
         ]));

         if($villaServices) {
            $villaServices->delete();
         }

         //remove options
         $villaOptions = RoomToOptions::find(([ 'room_id = :roomID:',
            'bind' => [ 'roomID' => $villaID ]
         ]));

         if($villaOptions){
            $villaOptions->delete();
         }

         //remove villa
         $villa->delete();

         $this->response->redirect('admin/villa/showVillas');
      }
   }





   //python style - yeah!!11!
   public function editGalleryAction( $villaID )
   {
      $this->view->pick('villa/edit-gallery');
      $villa               = Rooms::findFirstById($villaID);
      $gallery             = unserialize($villa->room_gallery);
      $this->view->gallery = $gallery;

      if ( $this->request->isPost() ):
         if ( $this->request->hasFiles() ):
            $files = [ ];
            foreach ( $this->request->getUploadedFiles() as $file ):
               $filename = uniqid() . '-' . uniqid();
               if ( $file->moveTo(APP_PATH . Rooms::UPLOAD_PATH . $filename) ):
                  $files[] = $filename;
               endif;
            endforeach;
            $this->view->gallery = $files;
            $villa->room_gallery = serialize($files);

            if ( $villa->save() ):
               $this->flash->success('Success!');
            else:
               foreach ( $villa->getMessages() as $message ):
                  $this->flash->error($message);
               endforeach;
            endif;
         endif;
      endif;
   }

}