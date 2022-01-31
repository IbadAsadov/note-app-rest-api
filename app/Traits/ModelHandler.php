<?php


namespace App\Traits;


trait ModelHandler
{
    static function getLastId() : int
    {
        $ret = self::withTrashed()->max("id");

        if (!$ret){
            return 0;
        }

        return $ret;
    }

    static function getNewId() : int
    {
        $newID = self::getLastId();

        return ++$newID;
    }
}
