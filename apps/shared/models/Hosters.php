<?php

namespace Multiple\Shared\Models;

class Hosters extends \Phalcon\Mvc\Model
{

  public function initialize()
  {
    $this->belongsTo('id', 'HosterLang', 'hoster_id');
  }


   const UPLOAD_PATH = '/uploads/images/hosters/';


  /**
   *
   * @var integer
   */
  public $id;

  /**
   *
   * @var string
   */
  public $hoster_name;

  /**
   *
   * @var string
   */
  public $hoster_desc;

  /**
   *
   * @var string
   */
  public $hoster_photo;





  /**
   * Returns table name mapped in the model.
   *
   * @return string
   */
  public function getSource()
  {
    return 'hosters';
  }





  /**
   * Allows to query a set of records that match the specified conditions
   *
   * @param mixed $parameters
   * @return Hosters[]
   */
  public static function find( $parameters = null )
  {
    return parent::find($parameters);
  }





  /**
   * Allows to query the first record that match the specified conditions
   *
   * @param mixed $parameters
   * @return Hosters
   */
  public static function findFirst( $parameters = null )
  {
    return parent::findFirst($parameters);
  }

}
