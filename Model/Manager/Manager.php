<?php


class Manager
{
    /**
     * return rubrics name & id as key
     * @param $table
     * @return array
     */
    public static function getAllKeyName ($table) : array
    {
        $result = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . $table);
        if ($query){
            foreach ($query->fetchAll() as $item) {
                $result[$item['id']] = $item['name'];
            }
        }
        return $result;
    }

    /**
     * @param $table
     * @param $name
     * @return bool
     */
    public function addName($table, &$name){
        $stm = DB::getConn()->prepare("
            INSERT INTO " . Config::PRE . $table . " (name)
            VALUES (:name)
        ");

        $stm->bindValue(':name', $name->getName);
        $result =$stm->execute();
        $name->setId(DB::getConn()->lastInsertId());
        return $result;
    }

    /**
     * @param $table
     * @param $id
     */
    public static function deleteName ($table, $id){
        $stm = DB::getConn()->prepare("DELETE FROM " . Config::PRE . $table . " WHERE id = :id");
        $stm->bindValue(":id", $id);
        $stm->execute();
    }

    /**
     * delete current choice of category
     * @param $table
     * @param $id
     */
    public static function deleteChoice($table, $id)
    {
        $stm = DB::getConn()->prepare("
            DELETE FROM " . Config::PRE . "$table WHERE art_fk = :art_fk
        ");

        $stm->bindValue('art_fk', $id);

        $stm->execute();
    }

}