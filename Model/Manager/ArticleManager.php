<?php


class ArticleManager
{
    /**
     * return projects which use a technique
     * @param $id
     * @return array
     */
    public static function artByTechnic(int $id) : array
    {
        $articles = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "article WHERE state = 3 AND id_art IN 
            (SELECT art_fk FROM " . Config::PRE . "art_tech WHERE tech_fk = '$id')");
        if($query){
            foreach ($query->fetchAll() as $item){
                $articles[] = self::setArticle($item);
            }
        }
        return $articles;
    }

    /**
     * @param int $id
     * @return Article|null
     */
    public static function oneArticle(int $id) : ?Article
    {
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "article WHERE id_art = $id");
        if($query){
            return self::setArticle($query->fetch());
        }
        return null;
    }


    /**
     * @return array
     */
    public static function allArticles() : array
    {
        $articles = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "article");
        if($query){
            foreach ($query->fetchAll() as $item){
                $articles[] = self::setArticle($item);
            }
        }
        return $articles;
    }

    /**
     * data for user
     * @return array
     */
    public static function forUserArticles() : array
    {
        $articles = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "article
         WHERE state = 3");
        if($query){
            foreach ($query->fetchAll() as $item){
                $articles[] = self::setArticle($item);
            }
        }
        return $articles;
    }

    /**
     * data for modo
     * @return array
     */
    public static function forModoArticles() : array
    {
        $articles = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "article
         WHERE NOT state = 1");
        if($query){
            foreach ($query->fetchAll() as $item){
                $articles[] = self::setArticle($item);
            }
        }
        return $articles;
    }

    /**
     * data for modo
     * @return array
     */
    public static function forAdminArticles() : array
    {
        $articles = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "article");
        if($query){
            foreach ($query->fetchAll() as $item){
                $articles[] = self::setArticle($item);
            }
        }
        return $articles;
    }

    /**
     * @param $state
     * @return array
     */
    public static function artByState(int $state) : array
    {
        $articles = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "article WHERE state = $state");
        if ($query){
            foreach ($query->fetchAll() as $item){
                $articles[$item['id_art']] = [
                    'title' => $item['title'],
                    'author' => UserManager::getUserById($item['author'])->getPseudo()
                ];
            }
        }
        return $articles;
    }

    /**
     * @param int $id
     * @return array
     */
    public static function artByAuthor(int $id) : array
    {
        $articles = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "article WHERE author = $id 
        ORDER BY state DESC");
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
    public static function addArticle(Article &$article){
        $stm = DB::getConn()->prepare("
            INSERT INTO " . Config::PRE . "article (title, description, type_fk, state, author)
            VALUES (:title, :description, :type_fk, :state, :author)
        ");

        // create article
        $stm->bindValue(':title', $article->getTitle());
        $stm->bindValue(':description', $article->getDescription());
        $stm->bindValue(':type_fk', $article->getType()->getIdType());
        $stm->bindValue(':state', $article->getState()->getId());
        $stm->bindValue(':author', $article->getAuthor()->getId());

        $result = $stm->execute();
        $article->setId(DB::getConn()->lastInsertId());

        if($article->getCategory()){
            foreach ($article->getCategory() as $value){
                $stmC = DB::getConn()->prepare("
                    INSERT INTO " . Config::PRE . "art_cat (cat_fk, art_fk)
                    VALUES (:cat_fk, :art_fk)
                ");
                $stmC->bindValue(':cat_fk', $value);
                $stmC->bindValue('art_fk', $article->getId());
                $stmC->execute();
            }
        }

        if($article->getTechnic()){
            foreach ($article->getTechnic() as $value){
                $stmT = DB::getConn()->prepare("
                    INSERT INTO " . Config::PRE . "art_tech (tech_fk, art_fk)
                    VALUES (:tech_fk, :art_fk)
                ");
                $stmT->bindValue(':tech_fk', $value);
                $stmT->bindValue('art_fk', $article->getId());

                $stmT->execute();
            }
        }

        //  create steps
        foreach ($article->getStep() as $step){
            $stmS = DB::getConn()->prepare("
                INSERT INTO " . Config::PRE . "step (img_name, title, description, tool, matter, art_fk)
                VALUES (:img_name, :title, :description, :tool, :matter, :art_fk)
            ");
            // create step
            $stmS->bindValue(':img_name', $step->getImgName());
            $stmS->bindValue(':title', $step->getTitle());
            $stmS->bindValue(':description', $step->getDescription());
            $stmS->bindValue(':tool', $step->getTool());
            $stmS->bindValue(':matter', $step->getMatter());
            $stmS->bindValue(':art_fk', $article->getId());

            $stmS->execute();
            $step->setIdStep(DB::getConn()->lastInsertId());
        }

        return $result;
    }

    /**
     * @param $item
     * @return Article
     */
    private static function setArticle($item)
    {
        $article = new Article();
        $article->setId($item['id_art'])
            ->setTitle($item['title'])
            ->setDescription($item['description'])
            ->setType(TypeManager::getTypeById($item['type_fk']))
            ->setState(StateManager::stateById($item['state']))
            ->setStep(StepManager::stepByArt($item['id_art']))
            ->setAuthor(UserManager::getUserById($item['author']))
            ->setCategory(CategoryManager::categoryByArt($item['id_art']))
            ->setTechnic(TechnicManager::techByArt($item['id_art']))
        ;
        return $article;
    }

    /**
     * get article author
     * @param $id
     * @return mixed
     */
    public static function getAuthorId($id){
        $stm = DB::getConn()->prepare("SELECT author FROM " . Config::PRE . "article WHERE id_art = :id");
        $stm->bindParam(':id', $id);
        $stm->execute();
        return $stm->fetch();
    }

    /**
     * @param $id
     */
    public static function delArticleById($id){
        $stm = DB::getConn()->prepare("DELETE FROM " . Config::PRE . "article WHERE id_art = :id");
        $stm->bindParam(':id', $id);
        $stm->execute();
    }

}
