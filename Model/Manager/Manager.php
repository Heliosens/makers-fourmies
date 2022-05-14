<?php


class Manager
{
    public static function getAllKeyName ($table) : array
    {
        $result = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . $table);
        if ($query){
            foreach ($query->fetchAll() as $item) {
                $result[$item['id']] = $item['name'];
            }
        }
        return $result;
    }

}