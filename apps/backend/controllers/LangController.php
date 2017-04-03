<?php

namespace Multiple\Backend\Controllers;

use Phalcon\Mvc\View;
use Multiple\Shared\Libs\Helper;


class LangController extends ControllerBase
{

  public function indexAction($l, $langID)
  {
    $this->view->setRenderLevel(View::LEVEL_NO_RENDER);

    if( in_array($langID, Helper::$availableLangs) ){
      $this->session->set('adminLang',     $langID);
      $this->session->set('adminLangCode', Helper::getLangCode($langID));
    }
    return $this->response->redirect($this->request->getServer('HTTP_REFERER'));
  }
}
