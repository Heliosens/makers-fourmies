<?php


class CategoryManager extends Manager
{
    /**
     * @return array
     */
    public static function getCategories () : array
    {
        $categories = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "category ORDER BY name");
        if($query){
            foreach ($query->fetchAll() as $item) {
                $categories[] = $item['name'];
            }
        }
        return $categories;
    }

    /**
     * @param int $id_art
     * @return array
     */
    public static function categoryByArt (int $id_art) : array
    {
        $categories = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "category WHERE id IN 
            (SELECT cat_fk FROM " . Config::PRE . "art_cat WHERE art_fk = $id_art)");
        if($query){
            foreach ($query->fetchAll() as $item){
                $categories[] = (new Category())
                    ->setId($item['id'])
                    ->setName($item['name'])
                ;
            }
        }
        return $categories;
    }


    /**
     * Check if a relation exists for category + article.
     * @param int $idCategory
     * @param int $idArticle
     * @return bool
     */
    public static function categoryExists(int $idCategory, int $idArticle): bool
    {
        $stm = DB::getConn()->prepare("
            SELECT count(*) as c FROM " . Config::PRE . "art_cat WHERE cat_fk = :cat_fk AND art_fk = :art_fk
        ");

        $stm->bindValue(':cat_fk', $idCategory);
        $stm->bindValue(':art_fk', $idArticle);

        $stm->execute();
        return $stm->fetch()['c'] > 0;
    }

}