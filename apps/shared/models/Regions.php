<?php

namespace Multiple\Shared\Models;

class Regions extends \Phalcon\Mvc\Model
{

  public $id;


  public $translate_slug;


  public $title;


  public function getSource()
  {
    return 'regions';
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
