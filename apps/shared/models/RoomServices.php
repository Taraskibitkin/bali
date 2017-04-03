<?php

namespace Multiple\Shared\Models;;


class RoomServices extends \Phalcon\Mvc\Model
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
    public $service_title;

    /**
     *
     * @var string
     */
    public $service_logo;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'RoomToServices', 'service_id', array('alias' => 'RoomToServices'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'room_services';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return RoomServices[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return RoomServices
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
