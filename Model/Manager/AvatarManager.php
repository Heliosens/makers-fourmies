<?php


class AvatarManager
{
    /**
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
}