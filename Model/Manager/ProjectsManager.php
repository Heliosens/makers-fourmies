<?php


class ProjectsManager extends Manager
{
    /**
     * return projects which use a technique
     * @param $id
     * @return array
     */
    public static function projectByTechnic (int $id) : array
    {
        $projects = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "article WHERE id_art IN 
            (SELECT art_fk FROM " . Config::PRE . "art_tech WHERE tech_fk = '$id')");
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
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "article WHERE id_art = $id");
        if($query){
            $item = $query->fetch();
            $project->setId($item['id_art'])
                ->setTitle($item['title'])
                ->setDescription($item['description'])
                ->setImage(StepManager::imgByArt($item['id_art']))
                ->setType(TypeManager::getTypeById($item['type_fk']))
                ->setCategory(CategoryManager::categoryByArt($item['id_art']))
                ->setTechnic(TechnicManager::techByArt($item['id_art']))
                ->setTool(ToolManager::toolByArt($item['id_art']))
                ->setMatter(MatterManager::matterByArt($item['id_art']))
                ->setResource(ResourceManager::resourceByArt($item['id_art']))
                ->setTakePart(TakePartManager::participationByArt($item['id_art']))
                ->setAuthor(UserManager::getUserById($item['author']))
            ;
        }
        return $project;
    }

    /**
     * @return array
     */
    public static function allArticle () : array
    {
        $projects = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "article");
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
     * @param $state
     * @return array
     */
    public static function artByState (int $state) : array
    {
        $projects = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "article WHERE state = $state");
        if ($query){
            foreach ($query->fetchAll() as $item){
                $projects[$item['id_art']] = $item['title'];
            }
        }
        return $projects;
    }

    /**
     * @param int $id
     * @return array
     */
    public static function artByAuthor (int $id) : array
    {
        $projects = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "article WHERE author = $id");
        if ($query){
            foreach ($query->fetchAll() as $item){
                $projects[$item['id_art']] = [
                    'title' => $item['title'],
                    'state' => $item['state']
                ];
            }
        }
        return $projects;
    }

    /**
     * @param int $id
     * @return array
     */
    public static function artByMaker (int $id) : array
    {
        $projects = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "article WHERE id_art IN
        (SELECT art_fk FROM " . Config::PRE . "take_part WHERE user_fk = $id)");
        if($query){
            foreach ($query->fetchAll() as $item){
                $projects[$item['id_art']] = [
                  'title' => $item['title']
                ];
            }
        }
        return $projects;
    }
}
