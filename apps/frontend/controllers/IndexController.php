<?php

namespace Multiple\Frontend\Controllers;

use Phalcon\Mvc\View;

use Multiple\Shared\Models\Pages;
use Multiple\Shared\Libs\Helper;

class IndexController extends ControllerBase
{
   public function indexAction()
   {
      $this->view->disableLevel(View::LEVEL_LAYOUT);
      $this->view->title = 'Bali Pro Rent';
   }





   // знаю, не круто порождать кучу роутов для страниц из бд
   // надо загуглить этот момент, а то поддерживать не очень
   public function sightsAction()
   {
      $this->view->pick('index/sights');

//      $this->setupPage('sights');
   }





   public function aboutAction()
   {
      $this->view->pick('index/about');
//      $this->setupPage('about');
   }





   public function faqAction()
   {
      $this->assets->addCss('css/pages/faq.css');
      $this->assets->addJS('js/pages/faq.js');
      $this->setupPage('faq');
   }





   public function contactAction()
   {

      if ( $this->request->isPost() ) {

         $userName    = $this->request->getPost('user_name');
         $userEmail   = $this->request->getPost('user_email');
         $userPhone   = $this->request->getPost('user_phone');
         $userCountry = $this->request->getPost('user_country');
         $userComment = $this->request->getPost('user_comment');

         if ( !$userName || !$userEmail ) {
            $this->flash->error($this->t->_('#m_cor_data'));
            return;
         }

         $mainResult = false;
         $emails     = Helper::getAdminEmails();

         $headers = 'From: support@baliprorent.com' . "\r\n" .
            'Reply-To: support@baliprorent.com' . "\r\n";

         //Support@baliprorent.com
         foreach ( $emails as $email ){
            $mainResult = mail($email, 'BaliProRent From Contact Page',
               "Contact details:\r\nName: $userName\r\nEmail: $userEmail\r\nPhone:$userPhone\r\nCountry:$userCountry
               \r\nComment: $userComment", $headers);
         }

         if ( $mainResult ){
            $this->flash->success($this->t->_('#m_sent'));

         } else {
            $this->flash->error($this->t->_('#m_n_sent'));
         }
      }
   }





   //returns page object model by slug
   protected function setupPage( $slug )
   {
      $languageID = $this->session->get('lIndex');

      $page = Pages::findFirst([
         'conditions' => 'language = ?0 AND slug = ?1',
         'bind'       => [ $languageID, $slug ],
      ]);

      $this->view->title          = $page->title;
      $this->view->page           = $page;
      $this->view->seoDescription = $page->meta_description;

      $this->view->pick('index/single-page');
   }
}
