<?php

namespace Multiple\Backend\Controllers;

use Multiple\Shared\Models\Users;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Model\Query\Builder as Builder;
use Multiple\Shared\Libs\Helper;
use Multiple\Shared\Models\Rooms;
use Multiple\Shared\Models\RoomLang;
use Multiple\Shared\Models\Hosters;
use Multiple\Shared\Models\Settings;

class SettingsController extends ControllerBase
{

   public function showAction()
   {
      $settings             = Settings::find();
      $this->view->settings = $settings;
      $this->view->pick('settings/show-settings');

      if ( $this->request->isPost() ):

         foreach ( $settings as $option ):
            $option->value = $this->request->getPost( str_replace( ' ', '_', $option->title ) );
            $option->save();
         endforeach;

         $this->flash->success('Options saved');
         $this->response->redirect('/admin/settings/show');
      endif;
   }
}
