<?php


class CategoryLinkManager
{
    public static function catLinkById (int $id){
        $catLink = new Category_link();
        $query = DB::getConn()->query("SELECT * FROM mkf_category_link WHERE id_cat_link = $id");
        if($query){
            $item = $query->fetch();
            $catLink
                ->setIdCatLink($item['id_cat_link'])
                ->setCategoryLink($item['category_link'])
            ;
        }
        return $catLink;
    }
}