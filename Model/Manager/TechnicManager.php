<?php


class TechnicManager
{
    /**
     * @return array
     */
    public static function allTechnique (){
        $techniques = [];
        $query = DB::getConn()->query('SELECT * FROM mkf_technic ORDER BY technic');
        if($query){
            foreach ($query->fetchAll() as $item){
                $techniques[$item['id_tech']] = [
                    'tech' => $item['technic']
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
