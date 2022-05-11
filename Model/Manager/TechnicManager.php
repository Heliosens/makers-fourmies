<?php


class TechnicManager
{
    /**
     * @return array
     */
    public static function allTechnique (){
        $techniques = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "technical ORDER BY name");
        if($query){
            foreach ($query->fetchAll() as $item){
                $techniques[$item['id']] = [
                    'tech' => $item['name']
                ];
            }
        }
        return $techniques;
    }

    /**
     * @param int $id
     * @return array
     */
    public static function techByArt (int $id) : array
    {
        $technics = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "technical WHERE id IN 
            (SELECT tech_fk FROM " . Config::PRE . "art_tech WHERE art_fk = $id)");
        if($query){
            foreach ($query->fetchAll() as $item){
                $technics[] = (new Technique())
                    ->setIdTech($item['id'])
                    ->setTechnique($item['name'])
                ;
            }
        }
        return $technics;
    }
}
