<?php

namespace Multiple\Shared\Models;

class HosterLang extends \Phalcon\Mvc\Model
{

  public function initialize()
  {
    $this->hasMany('hoster_id', 'Hosters', 'id');
  }





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
   * @var integer
   */
  public $hoster_id;

  /**
   *
   * @var integer
   */
  public $lang;





  /**
   * Returns table name mapped in the model.
   *
   * @return string
   */
  public function getSource()
  {
    return 'hoster_lang';
  }





  /**
   * Allows to query a set of records that match the specified conditions
   *
   * @param mixed $parameters
   * @return HosterLang[]
   */
  public static function find( $parameters = null )
  {
    return parent::find($parameters);
  }





  /**
   * Allows to query the first record that match the specified conditions
   *
   * @param mixed $parameters
   * @return HosterLang
   */
  public static function findFirst( $parameters = null )
  {
    return parent::findFirst($parameters);
  }

}
