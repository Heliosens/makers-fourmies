<?php


class ResourceManager
{
    /**
     * @return array
     */
    public static function allCatLink (){
        $cat = [];
        $queryCat = DB::getConn()->query("SELECT * FROM mkf_category_link");
        if($queryCat){
            foreach ($queryCat->fetchAll() as $item){
                $queryLink = DB::getConn()->query("SELECT * FROM mkf_resource WHERE cat_link_fk = " . $item['id_cat_link']);
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
     * @param int $id
     * @return array
     */
    public static function resourceByArt (int $id) : array
    {
        $resource = [];
        $query = DB::getConn()->query("SELECT * FROM mkf_resource WHERE id_res IN 
            (SELECT res_fk FROM mkf_use_resource WHERE art_fk = $id)");
        if($query){
            foreach ($query->fetchAll() as $item){
                $resource[] = (new Resource())
                    ->setIdRes($item['id_res'])
                    ->setTitle($item['title'])
                    ->setDescription($item['description'])
                    ->setUrl($item['url'])
                    ->setCategory(CategoryLinkManager::catLinkById($item['cat_link_fk']))
                ;
            }
        }
        return $resource;
    }
}