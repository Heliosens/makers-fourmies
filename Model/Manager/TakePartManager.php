<?php


class TakePartManager
{
    /**
     * @param int $id
     * @return array
     */
    public static function techByArt (int $id) : array
    {
        $technics = [];
        $query = DB::getConn()->query("SELECT * FROM mkf_technic WHERE id_tech IN 
            (SELECT use_by FROM mkf_use_tech WHERE use_tech = $id)");
        if($query){
            foreach ($query->fetchAll() as $item){
                $technics[] = (new Technique())
                    ->setIdTech($item['id_tech'])
                    ->setTechnique($item['technic'])
                ;
            }
        }
        return $technics;
    }
}