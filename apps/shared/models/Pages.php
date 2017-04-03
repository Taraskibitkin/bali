<?php

namespace Multiple\Shared\Models;

class Pages extends \Phalcon\Mvc\Model
{

   public $id;


   public $slug;


   public $title;

   public $meta_description;


   public $language;


   public $html_code;




   public function getSource()
   {
      return 'pages';
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
