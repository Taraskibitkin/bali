<?php


namespace Multiple\Shared\Models;


class RoomToServices extends \Phalcon\Mvc\Model
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
    public $service_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('service_id', 'RoomServices', 'id', array('alias' => 'RoomServices'));
        $this->belongsTo('room_id', 'Rooms', 'id', array('alias' => 'Rooms'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'room_to_services';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return RoomToServices[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return RoomToServices
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
