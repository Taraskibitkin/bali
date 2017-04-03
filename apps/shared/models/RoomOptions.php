<?php


namespace Multiple\Shared\Models;;


class RoomOptions extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $option_title;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
      $this->belongsTo('id', 'RoomToOptions', 'option_id');
//
//      $this->hasMany('id', 'RoomToOptions', 'option_id', array('alias' => 'RoomToOptions'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'room_options';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return RoomOptions[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return RoomOptions
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
