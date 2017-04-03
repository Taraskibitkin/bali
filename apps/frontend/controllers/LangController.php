<?php
namespace Multiple\Frontend\Controllers;

use Multiple\Shared\Libs\Helper;
use Phalcon\Mvc\View;
use Phalcon\Http\Response;

class LangController extends ControllerBase
{

  public function initialize()
  {
    $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
  }





  public function indexAction($lang)
  {
//    $lang  = $this->request->get('l');
    $langs = Helper::$availableLangs;

    if ( !array_key_exists($lang, $langs) ) {
      return $this->response->redirect('/');
    }

    $referredURL = $this->request->getServer('HTTP_REFERER');



    //add lang code to url
    if ( $lang != Helper::$defaultLangCode ) {
      $afterLang = str_replace(SITE_URL, SITE_URL . '/' . $lang, $referredURL);

      //remove lang code from url
    } else {
      $afterLang = SITE_URL . substr($referredURL, strlen(SITE_URL) + 3);
    }


    return $this->response->redirect($afterLang);
  }
}
