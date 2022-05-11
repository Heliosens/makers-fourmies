<?php


class AvatarManager
{
    /**
     * get default avatar
     * return default avatar
     * @return Avatar
     */
    public static function defaultAvatar (){
        $avatar = new Avatar();
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "avatar WHERE id_avat = 1");
        if($query){
            $result = $query->fetch();
            $avatar->setIdAvat($result['id_avat'])->setAvatar($result['avatar']);
        }
        return $avatar;
    }

    /**
     * get avatar by id
     * @param int $id
     * @return Avatar
     */
    public static function getAvatById (int $id){
        $avatar = new Avatar();
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "avatar WHERE id_avat = $id");
        if($query){
            $result = $query->fetch();
            $avatar->setIdAvat($result['id_avat'])->setAvatar($result['avatar']);
        }
        return $avatar;
    }

    /**
     * get all Avatar
     */
    public static function getAllAvatar(){
        $avatars = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "avatar");
        if ($query){
            foreach ($query->fetchAll() as $item){
                $avatars[] = (new Avatar())->setIdAvat($item['id_avat'])->setAvatar($item['avatar']);
            }
        }
        return $avatars;
    }

    /**
     * update current user avatar
     * @param $id
     * @return bool
     */
    public static function updateUserAvat($id){
        $stm = DB::getConn()->prepare("UPDATE " . Config::PRE . "user SET avat_fk = :id WHERE id_user = "
            . $_SESSION['user']['id']);
        $stm->bindValue(':id', $id);
        return $stm->execute();
    }
}