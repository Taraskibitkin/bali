<?php

namespace Multiple\Backend\Controllers;

use Multiple\Shared\Models\Users;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Model\Query\Builder as Builder;
use Multiple\Shared\Libs\Helper;
use Multiple\Shared\Models\Rooms;
use Multiple\Shared\Models\RoomLang;
use Multiple\Shared\Models\Hosters;
use Multiple\Shared\Models\HosterLang;

class UserController extends ControllerBase
{








  public function showUsersAction()
  {
    $users = Users::find([
      'order' => 'id'
    ]);

    $this->view->users = $users;
    $this->view->pick('user/show-users');
  }










  public function createUserAction()
  {
    $this->view->actionTitle = 'Add New User';
    $this->view->actionForm  = '/admin/user/createUser';
    $this->view->pick('user/edit-user');

    if ( $this->request->isPost() ):
      $this->saveUser();
    endif;
  }










  public function editUserAction( $id )
  {
    if ( $this->request->isPost() ):
      $this->saveUser($id);
    endif;

    $this->view->actionTitle = 'Edit User';
    $this->view->actionForm  = '/admin/user/editUser';
    $this->view->pick('user/edit-user');

    $user                 = Users::findFirstByid($id);
    $this->view->userInfo = $user;
  }










  public function saveUser($userID = 0)
  {
      $isNewUser = false;

      if ( $userID != 0 ) {
        $user = Users::findFirstByid($userID);
      } else {
        $user      = new Users();
        $isNewUser = true;
      }

      $user->name         = $this->request->getPost('name');
      $user->sourname     = $this->request->getPost('sourname');
      $user->email        = $this->request->getPost('email');
      $user->birth_date   = $this->request->getPost('birth_date');
      $user->phone        = $this->request->getPost('phone');
      $user->living_place = $this->request->getPost('living_place');
      $user->languages    = $this->request->getPost('languages');

      if( $isNewUser ){
        $user->password = $this->request->getPost('password');
      }

      if (!$user->save() ) {

        foreach ( $user->getMessages() as $message ) {
          $this->flash->error($message);
        }
      } else {
        $this->flash->success('User saved');

      }
  }










  public function deleteUserAction( $userID )
  {
    $user = Users::findFirstByid($userID);
    $user->delete();
    $this->response->redirect('/admin/user/showUsers');
    return;
  }
}
