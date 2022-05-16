<?php


class ResourceManager extends Manager
{

    /**
     * @return array
     */
    public static function allCatLink (){
        $cat = [];
        $queryCat = DB::getConn()->query("SELECT * FROM " . Config::PRE . "category_link");
        if($queryCat){
            foreach ($queryCat->fetchAll() as $item){
                $queryLink = DB::getConn()->query("SELECT * FROM " . Config::PRE . "resource WHERE cat_link_fk = " . $item['id_cat_link']);
                foreach ($queryLink as $link){
                    $cat[$item['id_cat_link']][] =
                            [
                                'title' => $link['title'],
                                'description' => $link['description'],
                                'url' => $link['url']
                            ];
                }
            }
        }
        return $cat;
    }

    /**
     * @return array
     */
    public static function getKeyNameCatLink(){
        $names = [];
        $query = DB::getConn()->query("SELECT * FROM mkf_category_link");
        if($query){
            foreach ($query->fetchAll() as $item){
                $names[$item['id_cat_link']] = $item['category_link'];
            }
        }
        return $names;
    }
}