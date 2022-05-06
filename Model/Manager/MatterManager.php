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
        $query = DB::getConn()->query("SELECT * FROM mkf_matter WHERE id_matter IN 
            (SELECT matter_fk FROM mkf_use_mat WHERE art_fk = $id)");
        if($query){
            foreach ($query->fetchAll() as $item){
                $matter[] = (new Matter())
                    ->setIdMat($item['id_matter'])
                    ->setMatterName($item['matter'])
                ;
            }
        }
        return $matter;
    }
}