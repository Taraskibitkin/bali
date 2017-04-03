<?php

namespace Multiple\Shared\Models;

use Phalcon\Mvc\Model\Validator\Email as Email;
use Phalcon\Mvc\Model\Validator\Uniqueness;
use Phalcon\Mvc\Model\Validator\StringLength as StringLengthValidator;

class Users extends \Phalcon\Mvc\Model
{


   const UPLOAD_PATH = '/uploads/images/users/';
   /**
    *
    * @var integer
    */
   public $id;

   /**
    *
    * @var string
    */
   public $name;


   public $favourite_villas;


   public $activate_code;


   public $user_photo;
   /**
    *
    * @var string
    */
   public $sourname;

   /**
    *
    * @var string
    */
   public $email;

   /**
    *
    * @var string
    */
   public $password;

   /**
    *
    * @var string
    */
   public $mustChangePassword;

   /**
    *
    * @var string
    */
   public $active;

   /**
    *
    * @var string
    */
   public $created_at;

   /**
    *
    * @var integer
    */
   public $soc_authed;


   public $phone;


   public $living_place;


   public $languages;


   public $fb_id = '';


   public $google_id = '';





   /**
    * Validations and business logic
    *
    * @return boolean
    */
   public function validation()
   {

      $this->validate(
         new StringLengthValidator([
            "field"          => 'name',
            'max'            => 40,
            'min'            => 3,
            'messageMaximum' => 'We don\'t like really long names',
            'messageMinimum' => 'We want more than just their initials'
         ]));

      $this->validate(
         new StringLengthValidator([
            "field"          => 'sourname',
            'max'            => 40,
            'min'            => 3,
            'messageMaximum' => 'We don\'t like really long names',
            'messageMinimum' => 'We want more than just their initials'
         ])
      );

      $this->validate(
         new Email([
            'field'    => 'email',
            'required' => true,
         ])
      );

      $this->validate(
         new Uniqueness([
            'field'   => 'email',
            'message' => 'Such email has been already registered'
         ])
      );

      return $this->validationHasFailed() === false;
   }





   /**
    * Returns table name mapped in the model.
    *
    * @return string
    */
   public function getSource()
   {
      return 'users';
   }





   /**
    * Allows to query a set of records that match the specified conditions
    *
    * @param mixed $parameters
    * @return Users[]
    */
   public static function find( $parameters = null )
   {
      return parent::find($parameters);
   }





   /**
    * Allows to query the first record that match the specified conditions
    *
    * @param mixed $parameters
    * @return Users
    */
   public static function findFirst( $parameters = null )
   {
      return parent::findFirst($parameters);
   }





   public static function saltPassword( $password )
   {
      return md5('#$!@arewBIG_SALO' . $password . '&%^$#!!^##$GF#$ 228 @#@vxcv_' . md5($password . '++!@#%PEREC'));
   }





   public function afterSave()
   {
      $this->refresh();
   }
}
