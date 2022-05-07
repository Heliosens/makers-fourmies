<?php


class TakePartManager
{
    /**
     * @param int $id
     * @return array
     */
    public static function participationByArt (int $id) : array
    {
        $part = [];
        $query = DB::getConn()->query("SELECT * FROM mkf_user WHERE id_user IN 
            (SELECT user_fk FROM mkf_take_part WHERE art_fk = $id)");
        if($query){
            foreach ($query->fetchAll() as $item){
                $part[] = $item['pseudo']
                ;
            }
        }
        return $part;
    }
}