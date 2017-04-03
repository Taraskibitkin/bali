<?php

namespace Multiple\Shared\Models;

;


class Rooms extends \Phalcon\Mvc\Model
{

   const ROOM_FREE    = 1;
   const ROOM_ORDERED = 2;
   const UPLOAD_PATH = '/uploads/images/villas/';
   /**
    *
    * @var integer
    */
   public $id;

   /**
    *
    * @var integer
    */
   public $room_price;

   /**
    *
    * @var string
    */
   public $main_img;

   /**
    *
    * @var string
    */
   public $room_gallery;

   /**
    *
    * @var string
    */
   public $room_google_map;

   /**
    *
    * @var integer
    */
   public $room_status;

   /**
    *
    * @var integer
    */
   public $hoster_id;

   /**
    *
    * @var string
    */
   public $google_map_title;

   /**
    *
    * @var string
    */
   public $ordered_from;

   /**
    *
    * @var string
    */
   public $ordered_to;





   /**
    * Initialize method for model.
    */
   public function initialize()
   {
      $this->belongsTo('id', 'RoomLang', 'room_id');

      $this->hasMany('id', 'RoomToOptions', 'room_id', [ 'alias' => 'RoomToOptions' ]);
      $this->hasMany('id', 'RoomToServices', 'room_id', [ 'alias' => 'RoomToServices' ]);
   }





   /**
    * Returns table name mapped in the model.
    *
    * @return string
    */
   public function getSource()
   {
      return 'rooms';
   }





   /**
    * Allows to query a set of records that match the specified conditions
    *
    * @param mixed $parameters
    * @return Rooms[]
    */
   public static function find( $parameters = null )
   {
      return parent::find($parameters);
   }





   /**
    * Allows to query the first record that match the specified conditions
    *
    * @param mixed $parameters
    * @return Rooms
    */
   public static function findFirst( $parameters = null )
   {
      return parent::findFirst($parameters);
   }





   public function afterSave()
   {
      $this->refresh();
   }

}
