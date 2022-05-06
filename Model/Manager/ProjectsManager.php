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
                    ->setType(TypeManager::getTypeById($item['type_fk']))
                    ;
            }
        }
        return $projects;
    }

    /**
     * @param int $id
     * @return Article
     */
    public static function oneProject (int $id) : Article
    {
        $project = new Article();
        $query = DB::getConn()->query("SELECT * FROM mkf_article WHERE id_art = $id");
        if($query){
            $item = $query->fetch();
            $project->setId($item['id_art'])
                ->setTitle($item['title'])
                ->setDescription($item['description'])
                ->setType(TypeManager::getTypeById($item['type_fk']))
                ->setCategory(CategoryManager::categoryByArt($item['id_art']))
                ->setTechnic(TechnicManager::techByArt($item['id_art']))
                ->setTool(ToolManager::toolByArt($item['id_art']))
                ->setMatter(MatterManager::matterByArt($item['id_art']))
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
