<?php

namespace Multiple\Frontend\Forms;

use Multiple\Frontend\Libs;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Submit;

use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\Confirmation;

class ProfileForm extends Form
{
   public function initialize( $entity = null, $options = null )
   {
      //NAME
      $email = new Text('u_name');
      $email->addValidators([
         new PresenceOf([ 'message' => 'Name is required' ]),
      ]);
      $this->add($email);

      //SOURNAME
      $email = new Text('u_sourname');
      $email->addValidators([
         new PresenceOf([ 'message' => 'Sourname is required' ]),
      ]);
      $this->add($email);

      // Email
      $email = new Text('u_email');
      $email->setFilters('email');
      $email->addValidators([
         new PresenceOf([ 'message' => 'E-mail is required' ]),
         new Email([ 'message' => 'E-mail is not valid' ])
      ]);
      $this->add($email);

      // Password
//      $password = new Password('u_old_password', ['required' => false]);
//      $password->addValidators([
//         new StringLength([
//            'min' => 6,
//            'messageMinimum' => 'Значение поля Password слишком короткое'
//         ])
//      ]);
//      $this->add($password);
//
//
//      $newPassword = new Password('u_new_password', ['required' => false]);
//      $newPassword->addValidators([
//
//         new StringLength([
//            'min' => 6,
//            'messageMinimum' => 'Значение поля Password слишком короткое'
//         ])
//      ]);
//      $this->add($newPassword);



      //CSRF
      //хотелось по хорошему с проверкой на csrf, да при обновлении страницы пользователь error ловит(
      /*$csrf = new Hidden('csrf');
      $csrf->addValidator(new Identical([
          'value' => $this->security->getSessionToken(),
          'message' => 'CSRF validation failed'
      ]));
      $this->add($csrf);
      */
   }
}