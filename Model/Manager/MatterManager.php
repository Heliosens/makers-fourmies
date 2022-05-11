<?php


class MatterManager
{
    /**
     * @param int $id
     * @return array
     */
    public static function matterByArt (int $id) : array
    {
        $matter = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "matter WHERE id IN 
            (SELECT matter_fk FROM " . Config::PRE . "art_mat WHERE art_fk = $id)");
        if($query){
            foreach ($query->fetchAll() as $item){
                $matter[] = (new Matter())
                    ->setIdMat($item['id'])
                    ->setMatterName($item['name'])
                ;
            }
        }
        return $matter;
    }
}