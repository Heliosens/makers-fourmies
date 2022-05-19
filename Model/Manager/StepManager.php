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

    /**
     * @param $id
     * @return array
     */
    public static function userUploadedImg($userId){
        $img = [];
        $query = DB::getConn()->query("SELECT img_name FROM " . Config::PRE . "step WHERE art_fk IN 
        (SELECT id_art FROM " . Config::PRE . "article WHERE author = $userId)");
        if($query){
            foreach ($query->fetchAll() as $item){
                $img[] = $item;
            }
        }
        return $img;
    }

    /**
     * @param $stepId
     */
    public static function findUploadedImg($stepId){
        $query = DB::getConn()->query("SELECT img_name FROM " . Config::PRE . "step WHERE id_step = $stepId");
        $query->fetch()['img_name'];
    }

}