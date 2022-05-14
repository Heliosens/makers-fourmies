<?php


class CategoryManager extends Manager
{
    /**
     * @return array
     */
    public static function getCategories () : array
    {
        $categories = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "category ORDER BY name");
        if($query){
            foreach ($query->fetchAll() as $item) {
                $categories[] = $item['name'];
            }
        }
        return $categories;
    }

    /**
     * @param int $id_art
     * @return array
     */
    public static function categoryByArt (int $id_art) : array
    {
        $categories = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "category WHERE id IN 
            (SELECT cat_fk FROM " . Config::PRE . "art_cat WHERE art_fk = $id_art)");
        if($query){
            foreach ($query->fetchAll() as $item){
                $categories[] = (new Category())
                    ->setId($item['id'])
                    ->setName($item['name'])
                ;
            }
        }
        return $categories;
    }

}