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
                $techniques[] = (new Technique())
                    ->setIdTech($item['id_tech'])
                    ->setTechnique($item['technic'])
                    ;
            }
        }
        return $techniques;
    }

    /**
     * @param $option
     * @return Technique
     */
    public static function techName ($option){
        $tech = new Technique();
        $query = DB::getConn()->query("SELECT * FROM mkf_technic WHERE id_tech = '$option'");
        if($query){
            $item = $query->fetch();
            $tech
                ->setIdTech($item['id_tech'])
                ->setTechnique($item['technic'])
                ;
        }
        return $tech;
    }

}
