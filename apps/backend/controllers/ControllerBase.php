<?php

namespace Multiple\Backend\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Config;

class ControllerBase extends Controller
{
    public function initialize()
    {
      if(!$this->session->has('adminAccess'))
      {
        $this->response->redirect('/');
        return;
      }
    }
}
