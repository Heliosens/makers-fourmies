<?php


class ProjectsManager
{
    public static function projectByCategory ($option){
        $projects = [];
        $query = DB::getConn()->query("SELECT * FROM mkf_article WHERE id_art IN 
                                (SELECT art_fk FROM mkf_own_category WHERE cat_fk = '$option')
                                ");
        if($query){
            foreach ($query->fetchAll() as $item){
                $projects[] = (new Article())
                    ->setId($item['id_art'])
                    ->setTitle($item['title'])
                    ->setDescription($item['description'])
                    ;
            }
        }
        return $projects;
    }
}