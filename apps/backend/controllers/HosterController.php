<?php

namespace Multiple\Backend\Controllers;

use Phalcon\Mvc\View;
use Phalcon\Mvc\Model\Query\Builder as Builder;
use Multiple\Shared\Libs\Helper;
use Multiple\Shared\Models\Rooms;
use Multiple\Shared\Models\RoomLang;
use Multiple\Shared\Models\Hosters;
use Multiple\Shared\Models\HosterLang;

class HosterController extends ControllerBase
{


   public function showHostersAction()
   {
      $hosters = HosterLang::find([
         'lang = :lang:',
         'bind'  => [
            'lang' => $this->session->get('adminLang')
         ],
         'order' => 'id',
      ]);

      $this->view->hosters = $hosters;
      $this->view->pick('hoster/show-hosters');
   }





   public function createHosterAction()
   {
      $this->view->actionTitle = 'Add New Hoster';
      $this->view->actionForm  = '/admin/hoster/saveHoster';
      $this->view->pick('hoster/edit-hoster');
   }





   public function editHosterAction( $id )
   {

      $this->view->actionTitle = 'Edit Hoster';
      $this->view->actionForm  = '/admin/hoster/saveHoster';
      $this->view->pick('hoster/edit-hoster');

      if ( $this->request->isGet() ):

         $hoster = Hosters::findFirstByid($id);

         $this->view->hosterInfo = $hoster;
         $this->view->hosters    = HosterLang::find([ 'lang = :lang:',
            'bind' => [
               'lang' => $this->session->get('adminLang')
            ]
         ]);

      endif;
   }





   public function editHosterTextAction( $id )
   {
      $hosterLang = HosterLang::findFirst([ 'hoster_id = :host_id: AND lang = :h_lang: ',
         'bind' => [
            'host_id' => $id,
            'h_lang'  => $this->session->get('adminLang'),
         ]
      ]);

      $this->view->hoster = $hosterLang;
      $this->view->pick('hoster/edit-text');

      //post method
      if ( $this->request->isPost() && $hosterLang ):

         $hosterLang->hoster_name = $this->request->getPost('hoster_name');;
         $hosterLang->hoster_desc = $this->request->getPost('hoster_desc');

         if ( $hosterLang->save() ) {
            $this->flash->success('Hoster was successfully saved');

         } else {
            $this->flash->error('Something went wrong');

         }

      endif;
   }





   public function saveHosterAction()
   {
      if ( $this->request->isPost() ):

         $hosterPostID = $this->request->getPost('id', 'int');
         $isNewHoster  = false;

         if ( $hosterPostID != 0 ) {
            $hoster = Hosters::findFirstByid($hosterPostID);

         } else {
            $isNewHoster = true;
            $hoster      = new Hosters();
         }

         $photoName = 'hoster_photo';

         $file = $this->request->getUploadedFiles();
         $file = $file{0};

         //CHECK IF IS PICTURE
         if ( $file->getName() ) {
            $fileName = Helper::getRandomString(2) . '-' . $file->getName();
            $file->moveTo(APP_PATH . Hosters::UPLOAD_PATH . $fileName);
            $hoster->hoster_photo = $fileName;
         }

//         if ( isset( $_FILES[$photoName]['name'] ) ) {
//
//            $ext        = pathinfo($_FILES[$photoName]['name'], PATHINFO_EXTENSION);
//            $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $_FILES[$photoName]['name']);
//            $fileName   = $withoutExt . uniqid() . '.' . $ext;
//            $uploadfile = APP_PATH . Hosters::UPLOAD_PATH . $fileName;
//
//            var_dump($_FILES[$photoName]['tmp_name']);
//
//            var_dump(move_uploaded_file($_FILES[$photoName]['tmp_name'], $uploadfile));
//
//            if ( move_uploaded_file($_FILES[$photoName]['tmp_name'], $uploadfile) ) {
//               $hoster->hoster_photo = $fileName;
//            }
//
//         }

         if ( $hoster->save() ) {

            if ( $isNewHoster ) {

               $langs = Helper::$availableLangs;

               foreach ( $langs as $langName => $langID ) {

                  $hosterLang              = new HosterLang();
                  $hosterLang->hoster_name = ' ';
                  $hosterLang->hoster_desc = ' ';
                  $hosterLang->hoster_id   = $hoster->id;
                  $hosterLang->lang        = $langID;
                  $hosterLang->save();
               }

               $this->flash->success('Hoster was successfully created');

            } else {

               $this->flash->success('Hoster was updated successfully');
            }

         } else {

            foreach ( $hoster->getMessages() as $message ) {
               $this->flash->error($message);
            }
         }

         return $this->dispatcher->forward([
            'module'     => 'backend',
            "controller" => "hoster",
            "action"     => "showHosters"
         ]);

      endif;
   }





   public function deleteHosterAction( $hosterID )
   {
      $villasBinded = Rooms::find([
         'hoster_id = :hosterID:',
         'bind' => [
            'hosterID' => $hosterID
         ]
      ]);

      // if there are no links to villas
      // we should get false here
      $villaIDs = [ ];
      foreach ( $villasBinded as $villa ) {
         $this->flash->error($villa->id . ' inside');
         $villaIDs[] = $villa->id;
      }

      //could not check if villasBinded equals false(
      if ( !empty( $villaIDs ) ) {

         $villaIDs = implode(', ', $villaIDs);
         $this->flash->error('This hoster is binded to villas with id: ' . $villaIDs);
         return;
      }

      $hoster      = Hosters::findFirstByid($hosterID);
      $hosterLangs = HosterLang::find([
         'hoster_id = :hosterID:',
         'bind' => [
            'hosterID' => $hosterID
         ]
      ]);

      //drop them baby :D
      $hosterLangs->delete();
      $hoster->delete();

      $this->flash->success('Hoster was deleted');
      $this->response->redirect('/admin/hoster/showHosters');
      return;
   }
}
