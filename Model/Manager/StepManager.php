<?php


class StepManager
{
    /**
     * @param int $id
     * @return array
     */
    public static function stepByArt (int $id){
        $steps = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "step WHERE art_fk = $id");
        if($query){
            foreach ($query->fetchAll() as $item){
                $steps[] = (new Step())
                    ->setIdStep($item['id_step'])
                    ->setImgName($item['img_name'])
                    ->setTitle($item['title'])
                    ->setDescription($item['description'])
                    ->setTool($item['tool'])
                    ->setMatter($item['matter'])
                    ->setArtFk($id)
                    ;
            }
        }
        return $steps;
    }

}