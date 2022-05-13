<?php


class manager
{
    public static function getAllName ($table) : array
    {
        $result = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . $table);
        if ($query){
            foreach ($query->fetchAll() as $item) {
                $result[] = $item['name'];
            }
        }
        return $result;
    }

}