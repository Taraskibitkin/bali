<?php

namespace Multiple\Frontend\Controllers;

use Phalcon\Mvc\Model\Query\Builder;
use Multiple\Shared\Models;
use Multiple\Shared\Models\Users;
use Multiple\Shared\Models\Orders;
use Multiple\Shared\Models\Rooms;

use Multiple\Shared\Libs\Helper;
use Multiple\Shared\Libs\FacebookAuth;
use Multiple\Shared\Libs\GoogleAuth;

class UserController extends ControllerBase
{

   public function initialize()
   {
      $this->view->facebookURL   = FacebookAuth::getFacebookURL();
      $this->view->goolgePlusURL = GoogleAuth::getGoogleURL();
      parent::initialize();
   }





   public function afterExecuteRoute()
   {
      $this->session->set('prevPage', $_SERVER['PHP_SELF']);
   }





   public function loginAction()
   {
      $form = new \LoginForm;

      if ( $this->request->isPost() ) {

         if ( $form->isValid($this->request->getPost()) == false ) {
            foreach ( $form->getMessages() as $message ) {
               $this->flash->error($message);
            }

         } else {

            $email    = $this->request->getPost('log_email', [ 'lower', 'trim' ]);
            $password = $this->request->getPost('log_password');
            $user     = Users::findFirst([ "email = '$email'" ]);

            if ( $email == $user->email && Users::saltPassword($password) == $user->password ) {

               if ( $user->active == 'Y' ) {

                  $this->setUserSessionIdentity($user->id, $user->name . ' ' . $user->sourname, $user->user_photo, false);
                  $this->response->redirect('catalog');
                  return;

               } else {
                  $this->flash->error($this->t->_('#confirm'));
               }
            } else {
               $this->flash->error($this->t->_('#invalid_login'));
            }
         }

         unset( $_POST['csrf'] );
      }

      $this->view->title = $this->t->_('#login');
      $this->view->form  = $form;
   }





   public function googleCallbackAction()
   {
      $this->view->title = 'Google Authorization';

      $code = $this->request->get('code');

      if ( $code ) {

         $params = [
            'client_id'     => GoogleAuth::$client_id,
            'client_secret' => GoogleAuth::$client_secret,
            'redirect_uri'  => GoogleAuth::$redirect_uri,
            'grant_type'    => 'authorization_code',
            'code'          => $code
         ];

         $result = Helper::curlRequest(
            GoogleAuth::$token_url,
            urldecode(http_build_query($params)),
            'post'
         );

         $tokenInfo = json_decode($result, true);

         if ( isset( $tokenInfo['access_token'] ) ) {

            $params['access_token'] = $tokenInfo['access_token'];

            $result   = Helper::curlRequest('https://www.googleapis.com/oauth2/v1/userinfo' . '?' . urldecode(http_build_query($params)));
            $userInfo = json_decode($result);

            if ( $userInfo->verified_email === true ) {

               $googleID = $userInfo->id;
               $email    = $userInfo->email;
               $name     = $userInfo->given_name;
               $sourname = $userInfo->family_name;

               $user = Users::findFirst([ 'google_id= :gID:',
                  'bind' => [ 'gID' => $googleID ]
               ]);

               if ( $user === false ) {

                  $user             = new Users();
                  $user->google_id  = $googleID;
                  $user->name       = $name;
                  $user->sourname   = $sourname;
                  $user->email      = $email;
                  $user->password   = Users::saltPassword(uniqid());
                  $user->active     = 'Y';
                  $user->user_photo = $userInfo->picture;
                  $user->soc_authed = 1;
                  $user->save();
               }

               $this->setUserSessionIdentity($user->id, $userInfo->name, $userInfo->picture, true);

               $this->response->redirect('/catalog');
            }
         }
      }
   }





   public function facebookCallbackAction()
   {
      $code = $this->request->get('code');

      if ( $code ) {

         $params = [
            'client_id'     => FacebookAuth::$client_id,
            'redirect_uri'  => FacebookAuth::$redirect_uri,
            'client_secret' => FacebookAuth::$client_secret,
            'code'          => $code,
         ];

         $requestResult = Helper::curlRequest(FacebookAuth::$token_url . http_build_query($params));
         parse_str($requestResult, $tokenInfo);

         if ( isset( $tokenInfo['access_token'] ) ) {

            $params = [ 'access_token' => $tokenInfo['access_token'] ];

            $response = Helper::curlRequest('https://graph.facebook.com/me?' . urldecode(http_build_query($params)));

            $userInfo = json_decode($response);

            if ( intval($userInfo->id) != 0 ) {

               $fbID = $userInfo->id;
               $user = Users::findFirst([ 'fb_id= :fbID:',
                  'bind' => [ 'fbID' => $fbID ]
               ]);

               $fbUserName = $userInfo->name;
               $name       = substr($fbUserName, 0, strpos($fbUserName, ' '));
               $sourname   = substr($fbUserName, strpos($fbUserName, ' '));
               $photo      = 'http://graph.facebook.com/' . $fbID . '/picture';

               if ( $user === false ) {

                  $user             = new Users();
                  $user->user_photo = $photo;
                  $user->fb_id      = $fbID;
                  $user->name       = $name;
                  $user->sourname   = $sourname;
                  $user->email      = 'fbGenerated@' . uniqid() . '.fb.com';
                  $user->password   = Users::saltPassword(uniqid());
                  $user->active     = 'Y';
                  $user->soc_authed = 1;
                  $user->save();
               }

               $this->setUserSessionIdentity($user->id, $fbUserName, $photo, true);

               $this->response->redirect('/catalog');
            }
         }
      }
   }





   public function registrationAction()
   {
      $form              = new \RegistrationForm;
      $this->view->form  = $form;
      $this->view->title = $this->t->_('#registr');

      //form validation
      if ( $this->request->isPost() && $form->isValid($this->request->getPost()) !== false ) {

         $name      = $this->request->getPost('reg_name', [ 'string', 'striptags' ]);
         $sourname  = $this->request->getPost('reg_sourname', [ 'string', 'striptags' ]);
         $email     = $this->request->getPost('reg_email', [ 'lower', 'email', 'trim' ]);
         $password  = $this->request->getPost('reg_password');
         $dateDay   = $this->request->getPost('reg_b_day');
         $dateMonth = $this->request->getPost('reg_b_month');
         $dateYear  = $this->request->getPost('reg_b_year');

         $user                = new Users();
         $user->name          = $name;
         $user->sourname      = $sourname;
         $user->email         = $email;
         $user->password      = Users::saltPassword($password);
         $user->active        = 'N';
         $user->activate_code = Helper::getRandomString(45);

         // if user has not entered some data - set by default
         $user->birth_date = ( ( $dateYear ) ?: 1980 ) . '-' . ( ( $dateDay ) ?: 1 ) . '-' . ( ( $dateMonth ) ?: 1 );

         if ( !$user->save() ) {
            foreach ( $user->getMessages() as $message ) {
               $this->flash->error($message);
            }
            return;

         } else {

            //photo
            if ( $this->request->hasFiles() ) {
               $file = $this->request->getUploadedFiles();
               $file = $file{0};

               //CHECK IF IS PICTURE
               //Save twice: first for getting just created user id
               if ( $file->getName() ) {
                  $fileName         = $user->id . '-' . $file->getName();
                  $user->user_photo = $fileName;
                  $file->moveTo(APP_PATH . Users::UPLOAD_PATH . $fileName);
                  $user->save();
               }
            }

            $userFullName = $name . ' ' . $sourname;
            $activateLink = SITE_URL . '/user/activateUser/' . $user->activate_code;

            $message = "Hello, $userFullName!\nPlease, confirm your email on BaliProRent with this link $activateLink
                                \n\nIf you not do this request, ignore this message";

            mail($email, 'Confirmation Code | BaliProRent', $message);
            $this->flash->success($this->t->_('#reg_success'));

            $this->view->form = new \LoginForm;
            $this->view->pick('user/login');
         }

      } else {
         foreach ( $form->getMessages() as $message ) {
            $this->flash->error($message);
         }
      }

      unset( $_POST['csrf'] );
   }





   public function logoutAction()
   {
      $this->session->destroy();
      $this->response->redirect('index');
   }





   public function activateUserAction()
   {
      $this->view->title = $this->t->_('#act_usr');
      $code              = $this->dispatcher->getParam('code');

      $user = Users::findFirst([ 'activate_code = :code:',
         'bind' => [ 'code' => $code ]
      ]);

      if ( $this->request->isGet() ) {
         $this->view->showForm = true;

         if ( strlen($code) === 45 && $user !== false ) {
            $user->activate_code = '';
            $user->active        = 'Y';

            if ( $user->save() ) {
               $this->setUserSessionIdentity($user->id, $user->name . ' ' . $user->sourname, $user->user_photo, false);
               $this->response->redirect('catalog');
               return;
            }
         } else {
            $this->flash->error($this->t->_('#proc_error'));
         }
      }
   }





   public function restorePasswordAction()
   {

      $this->view->title = $this->t->_('#rest_pass');
      $code              = $this->dispatcher->getParam('code');
      $user              = Users::findFirst([ 'activate_code = :code:',
         'bind' => [ 'code' => $code ]
      ]);

      if ( $this->request->isGet() ) {
         $this->view->showForm = true;

         if ( strlen($code) === 40 && $user !== false ) {
            $this->flash->success($this->t->_('#ent_new_pas'));

         } else {
            $this->flash->error($this->t->_('#proc_error'));
         }
      }

      if ( $this->request->isPost() && $user != false ) {

         $this->view->showForm = false;
         $newPassword          = $this->request->getPost('new_password');
         $confirmNewPassword   = $this->request->getPost('confirm_new_password');

         if ( strlen($newPassword) < 6 ) {
            $this->flash->error($this->t->_('#pas_more6'));

         } elseif ( $newPassword != $confirmNewPassword ) {
            $this->flash->error($this->t->_('#pas_n_match'));

         } else {

            $user->password      = Users::saltPassword($newPassword);
            $user->activate_code = '';

            if ( $user->save() ) {

               $this->flash->success($this->t->_('#success_log'));
               $form             = new \LoginForm;
               $this->view->form = $form;
               $this->view->pick('user/login');

            } else {
               $this->flash->error($this->t->_('#proc_error'));
            }
         }
      }
   }





   public function forgotPasswordAction()
   {

      $this->view->title = $this->t->_('#forgot_pass');

      if ( $this->request->isPost() ) {

         $email = $this->request->getPost('rest_email', [ 'trim',
            'lower',
            'email'
         ]);
         $user  = Users::findFirst([ "email = :email:",
            'bind' => [ 'email' => $email ]
         ]);

         if ( $user !== false ) {

            $activateCode = Helper::getRandomString(40);
            $restoreLink  = SITE_URL . '/user/restorePassword/code/' . $activateCode;

            $user->activate_code = $activateCode;

            if ( !$user->save() ) {
               $this->flash->error($this->t->_('#proc_error'));

            } else {

               $userFullName = $user->name . ' ' . $user->sourname;

               $message = "Hello, $userFullName!\nIf you forgot your password please follow the link $restoreLink
                                \n\nIf you not do this request, ignore this message";

               $mailResult = mail($email, 'Restoring password on BaliProRent', $message);

               if ( $mailResult ) {
                  $this->flash->success($this->t->_('#we_sent_instr'));

               } else {
                  $this->flash->error($this->t->_('#proc_error'));
               }

               $this->view->pick('user/forgotPasswordMessage');
            }

         } else {
            $this->flash->error($this->t->_('#invalid_email'));
         }
      }
   }





   public function saveProfileAction()
   {
      $form     = new \ProfileForm();
      $authInfo = $this->session->get('authIdentity');

      if ( $this->request->isPost() && $authInfo ) {

         if ( $form->isValid($this->request->getPost()) ) {

            $isSocAuthorized = $authInfo['socAuthorized'];

            //fetch all data from post
            $name          = $this->request->getPost('u_name', [ 'string', 'striptags' ]);
            $sourname      = $this->request->getPost('u_sourname', [ 'string', 'striptags' ]);
            $email         = $this->request->getPost('u_email', [ 'lower', 'email', 'trim' ]);
            $birthYear     = $this->request->getPost('u_birthYear');
            $birthMonth    = $this->request->getPost('u_birthMonth');
            $birthDay      = $this->request->getPost('u_birthDay');
            $phone         = $this->request->getPost('u_phone');
            $langs         = $this->request->getPost('u_langs');
            $address       = $this->request->getPost('u_address');
            $old_password  = $this->request->getPost('u_old_password');
            $new_password  = $this->request->getPost('u_new_password');
            $fullBirthDate = implode('-', [ $birthYear, $birthMonth, $birthDay ]);

            //update user fields
            $userID = $authInfo['userID'];

            $user               = Users::findFirst($userID);
            $user->name         = $name;
            $user->sourname     = $sourname;
            $user->email        = $email;
            $user->birth_date   = $fullBirthDate;
            $user->phone        = $phone;
            $user->languages    = $langs;
            $user->living_place = $address;

            //photo
            if ( $this->request->hasFiles() && !$isSocAuthorized ) {
               $file = $this->request->getUploadedFiles();
               $file = $file{0};
               if ( $file->getName() ) {
                  unlink(APP_PATH . '/uploads/images/users/' . $user->user_photo);
                  $fileName         = $userID . '-' . $file->getName();
                  $user->user_photo = $fileName;
                  $file->moveTo(APP_PATH . '/uploads/images/users/' . $fileName);
               }
            }

            //password changing
            if ( $old_password && Users::saltPassword($old_password) == $user->password ) {

               if ( strlen($new_password) >= 6 ) {
                  $user->password = Users::saltPassword($new_password);
               } else {
                  $this->flash->error($this->t->_('#new6pass'));
               }
            }

            //saving user
            if ( !$user->save() ) {
               foreach ( $user->getMessages() as $message ) {
                  $this->flash->success($message);
               }
            } else {

               $this->setUserSessionIdentity($user->id, $user->name . ' ' . $user->sourname, $user->user_photo, $isSocAuthorized);
               $this->flash->success('Saved');
            }

         } else {

            foreach ( $form->getMessages() as $message ) {
               $this->flash->success($message);

            }
         }

         $this->dispatcher->forward([
            'controller' => 'user',
            'action'     => 'profile'
         ]);

      } else {
         return $this->response->redirect($this->request->getServer('HTTP_REFERER'));
      }
   }





   public function profileAction()
   {
      $this->view->title = $this->t->_('#my_profile');
      $authInfo          = $this->session->get('authIdentity');

      // get form
      if ( $authInfo ) {

         $userID = $authInfo['userID'];

         $currentUser          = \Users::findFirst($userID);
         $this->view->userInfo = $currentUser;

         // storage format Y-M-N
         $birthDates = explode('-', $currentUser->birth_date);

         $this->view->birthDay   = $birthDates[2];
         $this->view->birthMonth = $birthDates[1];
         $this->view->birthYear  = $birthDates[0];

         $form             = new \ProfileForm();
         $this->view->form = $form;

         //for not authorized users
      } else {
         return $this->response->redirect($this->request->getServer('HTTP_REFERER'));
      }
   }





   public function ordersAction()
   {
      $this->view->title = $this->t->_('#orders');
      $authInfo          = $this->session->get('authIdentity');

      if ( $this->session->get('authIdentity') ) {

         $userID       = $authInfo['userID'];
         $user         = Users::findFirst($userID);
         $languageCode = Helper::getLangID($this->session->get('lang'));


         //fetch orders
         $orderVillas = Orders::find([
            'conditions' => 'user_id = ?0',
            'bind'       => [ $userID ],
            'columns'    => 'villa_id'
         ]);

         $orderVillaIds = [ ];
         foreach ( $orderVillas as $villa ) {
            $orderVillaIds[] = $villa->id;
         }

         $queryParams = [
            'models'     => [ 'Multiple\Shared\Models\Rooms' ],
            'columns'    => [
               'Multiple\Shared\Models\Rooms.id',
               'Multiple\Shared\Models\Rooms.room_price',
               'Multiple\Shared\Models\Rooms.main_img',
               'Multiple\Shared\Models\RoomLang.room_short_title',
               'Multiple\Shared\Models\RoomLang.room_name'
            ],
            'conditions' => "Multiple\Shared\Models\RoomLang.lang = " . $languageCode,
         ];

         $builder = new Builder($queryParams);
         $builder->inWhere('Multiple\Shared\Models\Rooms.id', $orderVillaIds);

         $builder->join(
            'Multiple\Shared\Models\RoomLang',
            'Multiple\Shared\Models\RoomLang.room_id = Multiple\Shared\Models\Rooms.id'
         );

         $this->view->orderVillas = $builder->getQuery()->execute();






         //get user favourite villas
         $favourites = unserialize($user->favourite_villas);

         if ( is_array($favourites) ) {

            //find favourite villas
            $builder = new Builder($queryParams);
            $builder->inWhere('Multiple\Shared\Models\Rooms.id', $favourites);
            $builder->join(
               'Multiple\Shared\Models\RoomLang',
               'Multiple\Shared\Models\RoomLang.room_id = Multiple\Shared\Models\Rooms.id'
            );

            $this->view->favouriteVillas = $builder->getQuery()->execute();

         } else {

            //there is no favourite villas
            $this->view->favouriteVillas = [ ];
         }
      }
   }





   protected function setUserSessionIdentity( $id, $fullname, $photo, $isSocAuthorized = false )
   {
      $this->session->set('authIdentity', [
         'userID'        => $id,
         'userFullName'  => $fullname,
         'userPhoto'     => $photo,
         'socAuthorized' => $isSocAuthorized,
         'isAuthorized'  => true,
      ]);
   }
}
