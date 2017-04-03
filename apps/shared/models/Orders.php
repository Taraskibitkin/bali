<?php

namespace Multiple\Shared\Models;

use Phalcon\Mvc\Model\Validator\Email as Email;
use Phalcon\Mvc\Model\Validator\Uniqueness;
use Phalcon\Mvc\Model\Validator\StringLength as StringLengthValidator;

class Orders extends \Phalcon\Mvc\Model
{

   public $id;

   public $user_id;

   public $villa_id;

   public $is_payed;

   public $ordered_from;

   public $ordered_to;





   public function getSource()
   {
      return 'orders';
   }


   public function initialize()
   {
      $this->belongsTo('user_id', 'User', 'id');
      $this->belongsTo('villa_id','Room', 'id');
   }





   public static function find( $parameters = null )
   {
      return parent::find($parameters);
   }





   public static function findFirst( $parameters = null )
   {
      return parent::findFirst($parameters);
   }





   public function afterSave()
   {
      $this->refresh();
   }
}
