<?php


class ResourceManager
{
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