<?php


class ProjectsManager
{
    /**
     * @param $option
     * @return array
     */
    public static function projectByTechnic ($option) : array
    {
        $projects = [];
        $query = DB::getConn()->query("SELECT * FROM mkf_article WHERE id_art IN 
            (SELECT use_tech FROM mkf_use_tech WHERE use_by = '$option')");
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

    /**
     * @param $option
     * @return Article
     */
    public static function oneProject ($option) : Article
    {
        $project = new Article();
        $query = DB::getConn()->query("SELECT * FROM mkf_article WHERE id_art = '$option'");
        if($query){
            $item = $query->fetch();
            $project->setId($item['id_art'])
                ->setTitle($item['title'])
                ->setDescription($item['description'])
            ;
        }
        return $project;
    }

    /**
     * @return array
     */
    public static function AllArticle () : array
    {
        $articles = [];
        $query = DB::getConn()->query("SELECT * FROM mkf_article");
        if($query){
            foreach ($query->fetchAll() as $item){
                $articles[] = (new Article())
                    ->setId($item['id_art'])
                    ->setTitle($item['title'])
                    ->setDescription($item['description'])
                    ->setType(TypeManager::getTypeById($item['type_fk']))
                    ;
            }
        }
        return $articles;
    }
}
