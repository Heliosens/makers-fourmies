<?php


class CategoryManager
{
    /**
     * @return array
     */
    public static function getCategories () : array
    {
        $categories = [];
        $query = DB::getConn()->query("SELECT * FROM mkf_category ORDER BY category_name");
        if($query){
            foreach ($query->fetchAll() as $item) {
                $categories[] = (new Category())
                    ->setIdCat($item['id_category'])
                    ->setCategoryName($item['category_name'])
                    ;
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
        $query = DB::getConn()->query("SELECT * FROM mkf_category WHERE id_category IN 
            (SELECT cat_fk FROM mkf_own_category WHERE art_fk = $id_art)");
        if($query){
            foreach ($query->fetchAll() as $item){
                $categories[] = (new Category())
                    ->setIdCat($item['id_category'])
                    ->setCategoryName($item['category_name'])
                ;
            }
        }
        return $categories;
    }

}