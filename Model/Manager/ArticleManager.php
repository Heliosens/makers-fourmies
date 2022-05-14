<?php


class ArticleManager extends Manager
{
    /**
     * return projects which use a technique
     * @param $id
     * @return array
     */
    public static function artByTechnic (int $id) : array
    {
        $articles = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "article WHERE id_art IN 
            (SELECT art_fk FROM " . Config::PRE . "art_tech WHERE tech_fk = '$id')");
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

    /**
     * @param int $id
     * @return Article
     */
    public static function oneArticle (int $id) : Article
    {
        $article = new Article();
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "article WHERE id_art = $id");
        if($query){
            $item = $query->fetch();
            $article->setId($item['id_art'])
                ->setTitle($item['title'])
                ->setDescription($item['description'])
                ->setStep(StepManager::imgByArt($item['id_art']))
                ->setType(TypeManager::getTypeById($item['type_fk']))
                ->setCategory(CategoryManager::categoryByArt($item['id_art']))
                ->setTechnic(TechnicManager::techByArt($item['id_art']))
                ->setAuthor(UserManager::getUserById($item['author']))
            ;
        }
        return $article;
    }

    /**
     * @return array
     */
    public static function allArticle () : array
    {
        $articles = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "article");
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

    /**
     * @param $state
     * @return array
     */
    public static function artByState (int $state) : array
    {
        $articles = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "article WHERE state = $state");
        if ($query){
            foreach ($query->fetchAll() as $item){
                $articles[$item['id_art']] = $item['title'];
            }
        }
        return $articles;
    }

    /**
     * @param int $id
     * @return array
     */
    public static function artByAuthor (int $id) : array
    {
        $articles = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "article WHERE author = $id");
        if ($query){
            foreach ($query->fetchAll() as $item){
                $articles[$item['id_art']] = [
                    'title' => $item['title'],
                    'state' => $item['state']
                ];
            }
        }
        return $articles;
    }

    /**
     * @param Article $article
     * @return bool
     */
    public static function addArticle (Article &$article){
        $stm = DB::getConn()->prepare("INSERT INTO mkf_article (title, description, type_fk, state, author)
            VALUES (:title, :description, :type_fk, :state, :author)
        ");

        $stm->bindValue(':title', $article->getTitle());
        $stm->bindValue(':description', $article->getDescription());
        $stm->bindValue(':type_fk', $article->getType()->getIdType());
        $stm->bindValue(':state', $article->getState()->getId());
        $stm->bindValue(':author', $article->getAuthor()->getId());

        $result = $stm->execute();
        $article->setId(DB::getConn()->lastInsertId());
        return $result;
    }
}
