<?php

namespace Multiple\Frontend\Controllers;

use Multiple\Shared\Libs\Helper;
use Phalcon\Mvc\Controller;
use Phalcon\Config;

class ControllerBase extends Controller
{

   public $linkPrefix = '';

   protected $t;



   public function initialize()
   {
      $this->t        = $this->_getTranslation();
      $this->view->t  = $this->t;
      $dispatcherLang = trim($this->dispatcher->getParam('lang'));
      $lang           = '';

      if ( $dispatcherLang != '' ) {
         $lang = '/' . $dispatcherLang;
      }

      $this->view->linkPrefix = SITE_URL . $lang;

      //social links
      $this->view->soc = Helper::getSocialLinks();
   }




   protected function _getTranslation()
   {
      $appLanguage = $this->dispatcher->getParam('lang') ?: Helper::$defaultLangCode;

      $this->session->set('lang', $appLanguage);
      $this->session->set('lIndex', Helper::getLangID($appLanguage));

      require __DIR__ . "/../messages/" . $appLanguage . ".php";

      return new \Phalcon\Translate\Adapter\NativeArray([
         "content" => $messages
      ]);
   }
}
