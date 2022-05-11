<?php


class ImageManager
{
    public static function imgByArt (int $id){
        $images = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "step WHERE art_fk = $id");
        if($query){
            foreach ($query->fetchAll() as $item){
                $images[] = (new Image())
                    ->setIdImg($item['id_img'])
                    ->setName($item['name'])
                    ->setTitle($item['title'])
                    ->setDescription($item['description'])
                    ->setIdArt($id)
                    ;
            }
        }
        return $images;
    }
}