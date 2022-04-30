<?php


class CategoryManager
{
    /**
     * @return array
     */
    public static function getCategories (){
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
}