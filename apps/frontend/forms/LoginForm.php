<?php

namespace Multiple\Frontend\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Submit;

use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Identical;

class LoginForm extends Form
{
   public function initialize( $entity = null, $options = null )
   {

      // Email
      $email = new Text('log_email');
      $email->setFilters('email');
      $email->addValidators([

         new PresenceOf([ 'message' => 'E-mail is required' ]),

         new Email([ 'message' => 'E-mail is not valid' ])

      ]);
      $this->add($email);


      // Password
      $password = new Password('log_password');
      $password->setLabel(( '' ));

      $password->addValidators([

         new PresenceOf([ 'message' => 'Password is required' ]),

         new StringLength(
            [
               'min'            => 6,
               'messageMinimum' => 'Значение поля Password слишком короткое'
            ]
         )
      ]);

      $this->add($password);


      //REMEMBER ME
      $remember = new Check('remember', [
         'value' => 'yes'
      ]);
      $this->add($remember);


      //CSRF
      $csrf = new Hidden('csrf');
      $csrf->addValidator(new Identical([
         'value'   => $this->security->getSessionToken(),
         'message' => 'CSRF validation failed'
      ]));
      $this->add($csrf);

      //SUBMIT
      //        $this->add(new Submit('go', array(
      //            'class' => 'btn btn-success'
      //        )));

   }


}