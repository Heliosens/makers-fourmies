<?php


class ArticleManager
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
                $articles[] = self::setArticle($item);
            }
        }
        return $articles;
    }

    /**
     * @param int $id
     * @return Article|null
     */
    public static function oneArticle (int $id) : ?Article
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
    public static function allArticles () : array
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
    public static function artByState (int $state) : array
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

        if($result && $article->getCategory()){
            foreach ($article->getCategory() as $value){
                $stm = DB::getConn()->prepare("
                    INSERT INTO " . Config::PRE . "art_cat (cat_fk, art_fk)
                    VALUES (:cat_fk, :art_fk)
                ");
                $stm->bindValue(':cat_fk', $value);
                $stm->bindValue('art_fk', $article->getId());

                $result = $stm->execute();
            }
        }
        else {
            $_SESSION['error'] = "Erreur de catégorie";
            header('Location: index.php?c=articles&p=art_form');
        }

        if($result && $article->getTechnic()){
            foreach ($article->getTechnic() as $value){
                $stm = DB::getConn()->prepare("
                    INSERT INTO " . Config::PRE . "art_tech (tech_fk, art_fk)
                    VALUES (:tech_fk, :art_fk)
                ");
                $stm->bindValue(':tech_fk', $value);
                $stm->bindValue('art_fk', $article->getId());

                $stm->execute();
            }
        }

        // create steps
        if($result){
            foreach ($article->getStep() as $step){
                $stm = DB::getConn()->prepare("
                    INSERT INTO " . Config::PRE . "step (img_name, title, description, tool, matter, art_fk)
                    VALUES (:img_name, :title, :description, :tool, :matter, :art_fk)
                ");
                // create step
                $stm->bindValue(':img_name', $step->getImgName());
                $stm->bindValue(':title', $step->getTitle());
                $stm->bindValue(':description', $step->getDescription());
                $stm->bindValue(':tool', $step->getTool());
                $stm->bindValue(':matter', $step->getMatter());
                $stm->bindValue(':art_fk', $article->getId());

                $result = $stm->execute();
                $step->setIdStep(DB::getConn()->lastInsertId());
            }
        }
        else{
            $_SESSION['error'] = "Erreur à l'enregistrement des étapes";
            header('Location: index.php?c=articles&p=art_form');
        }
        return $result;
    }

    /**
     * @param $item
     * @return Article
     */
    private static function setArticle ($item)
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
}
