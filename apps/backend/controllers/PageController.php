<?php

namespace Multiple\Backend\Controllers;

use Multiple\Shared\Models\Rooms;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Model\Query;
use Phalcon\Mvc\Model\Query\Builder as Builder;
use Multiple\Shared\Models\Users;
use Multiple\Shared\Libs\Helper;
use Multiple\Shared\Models\Pages;
use Multiple\Shared\Models\RoomLang;
use Multiple\Shared\Models\Hosters;
use Multiple\Shared\Models\HosterLang;

class PageController extends ControllerBase
{


   public function showAction()
   {
      $languageID = $this->session->get('adminLang');
      $pages      = Pages::find([
         'conditions' => 'language = ?0',
         'bind'       => [ $languageID ],
         'order'      => 'id'
      ]);

      $this->view->pages    = $pages;
      $this->view->pick('pages/show-pages');
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
      $this->view->page = Pages::findFirstByid($id);
      $this->initPage();
   }





   protected function initPage()
   {
      $this->view->actionTitle = 'Edit Page';
      $this->view->actionForm  = '/admin/page/save';
      $this->view->pick('pages/edit-page');
   }





   public function saveAction()
   {
      $pageID = $this->request->getPost('id', 'int');

      $page                   = Pages::findFirst($pageID);
      $page->title            = $this->request->getPost('title');
      $page->meta_description = $this->request->getPost('meta_description');
      $page->html_code        = $this->request->getPost('html_code');
      $this->view->page       = $page;

      if ( $page->save() ):
         $this->flash->success('Page saved');
      else:
         foreach ( $page->getMessages() as $message ):
            $this->flash->error($message);
         endforeach;
      endif;

      $this->initPage();
   }





   public function deleteAction( $userID )
   {
      $order = Orders::findFirstByid($userID);
      $order->delete();
      $this->response->redirect('/admin/order/show');
   }
}
