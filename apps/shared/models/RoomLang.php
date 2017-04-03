<?php

namespace Multiple\Shared\Models;



class RoomLang extends \Phalcon\Mvc\Model
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
    public $lang;

    /**
     *
     * @var string
     */
    public $room_name;

    /**
     *
     * @var string
     */
    public $room_short_title;

    /**
     *
     * @var string
     */
    public $room_desc;

    public function initialize()
    {
        $this->hasMany('room_id', 'Rooms', 'id');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'room_lang';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return RoomLang[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return RoomLang
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function afterSave()
    {
        $this->refresh();
    }

}
