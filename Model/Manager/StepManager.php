<?php


class StepManager
{
    /**
     * @param $step
     * @param $art_fk
     */
    public static function addStep($step, $art_fk){
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
        $stmS->bindValue(':art_fk', $art_fk);

        $stmS->execute();
        $step->setIdStep(DB::getConn()->lastInsertId());
    }


    /**
     * @param int $id
     * @return array
     */
    public static function stepByArt (int $id){
        $steps = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "step WHERE art_fk = $id");
        if($query){
            foreach ($query->fetchAll() as $item){
                $steps[] = (new Step())
                    ->setIdStep($item['id_step'])
                    ->setImgName($item['img_name'])
                    ->setTitle($item['title'])
                    ->setDescription($item['description'])
                    ->setTool($item['tool'])
                    ->setMatter($item['matter'])
                    ->setArtFk($id)
                    ;
            }
        }
        return $steps;
    }

    /**
     * @param $userId
     * @return array
     */
    public static function userUploadedImg($userId){
        $query = DB::getConn()->query("
            SELECT img_name FROM " . Config::PRE . "step 
            WHERE art_fk IN 
                (SELECT id_art FROM " . Config::PRE . "article WHERE author = $userId)
        ");
        return $query->fetchAll();
    }

    public static function artUploadedImg($artId){
        $query = DB::getConn()->query("
            SELECT img_name FROM " . Config::PRE . "step WHERE art_fk = $artId
        ");
        return $query->fetchAll();
    }

    /**
     * @param $stepId
     * @return mixed
     */
    public static function findUploadedImg($stepId){
        $query = DB::getConn()->query("SELECT img_name FROM " . Config::PRE . "step WHERE id_step = $stepId");
        return $query->fetch()['img_name'];
    }

}