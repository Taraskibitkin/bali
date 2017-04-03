<?php
namespace Multiple\Backend\Controllers;

use Phalcon\Mvc\View;
use Phalcon\Mvc\Model\Query\Builder as Builder;
use Multiple\Shared\Libs\Helper;

class AdminController extends \Phalcon\Mvc\Controller
{

  public function initialize()
  {
    if ( !$this->session->get('adminLang') ) {

      $this->session->set('adminLang', Helper::$defaultLangID);
      $this->session->set('adminLangCode', Helper::$defaultLangCode);
    }
  }


  //
  // ACCESS TO ADMIN PAGE
  //
  public function indexAction()
  {
    //бы было как в laravel - методы getIndex или postIndex
    //приходится http методы if'ом разделять

    // trying to become authorized - form sent
    if ( $this->request->isPost() ) {

      $login    = $this->request->getPost('admin_email');
      $password = $this->request->getPost('admin_password');

      //raw values Baby
      if ( $login == 'zzAdmin_BaliProRent' && $password == '%!^%@##&@^#!%@#FGGFDfdsvc' ) {
        $this->session->set('adminAccess', true);

      } else {

        $this->view->pick('admin/login');
        sleep(3);
      }
    }


    // get page
    if ( $this->request->isGet() ) {

      // has no permissions
      if ( !$this->session->has('adminAccess') ) {
        $this->view->pick('admin/login');
        return;

        // it's admin
      } else {
        $this->view->pick('admin/index');
      }
    }
  }


}

