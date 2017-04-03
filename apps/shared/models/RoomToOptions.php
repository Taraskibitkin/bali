<?php

namespace Multiple\Shared\Models;

class RoomToOptions extends \Phalcon\Mvc\Model
{

  /**
   *
   * @var integer
   */
  public $id;

  /**
   *
   * @var integer
   */
  public $room_id;

  /**
   *
   * @var integer
   */
  public $option_id;

  /**
   *
   * @var string
   */
  public $option_value;





  /**
   * Initialize method for model.
   */
  public function initialize()
  {
    $this->belongsTo('room_id', 'Rooms', 'id', [ 'alias' => 'Rooms' ]);
    $this->hasMany('option_id', 'RoomOptions', 'id');


//    $this->belongsTo('RoomOptions', 'RoomOptions', 'id', [ 'alias' => 'RoomOptions' ]);
  }





  /**
   * Returns table name mapped in the model.
   *
   * @return string
   */
  public function getSource()
  {
    return 'room_to_options';
  }





  /**
   * Allows to query a set of records that match the specified conditions
   *
   * @param mixed $parameters
   * @return RoomToOptions[]
   */
  public static function find( $parameters = null )
  {
    return parent::find($parameters);
  }





  /**
   * Allows to query the first record that match the specified conditions
   *
   * @param mixed $parameters
   * @return RoomToOptions
   */
  public static function findFirst( $parameters = null )
  {
    return parent::findFirst($parameters);
  }

}
