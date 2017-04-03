<?php

namespace Multiple\Shared\Models;

class Settings extends \Phalcon\Mvc\Model
{

  /**
   *
   * @var integer
   */
  public $id;

  /**
   *
   */
  public $key;

  /**
   *
   * @var integer
   */
  public $value;


  public function getSource()
  {
    return 'settings';
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


  public function afterSave()
  {
    $this->refresh();
  }

}
