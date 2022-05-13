<?php


class TakePartManager extends Manager
{
    /**
     * @param int $id
     * @return array
     */
    public static function participationByArt (int $id) : array
    {
        $part = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "user WHERE id_user IN 
            (SELECT user_fk FROM " . Config::PRE . "take_part WHERE art_fk = $id)");
        if($query){
            foreach ($query->fetchAll() as $item){
                $part[] = $item['pseudo']
                ;
            }
        }
        return $part;
    }
}