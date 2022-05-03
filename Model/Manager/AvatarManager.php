<?php


class AvatarManager
{
    /**
     * return default avatar
     * @return Avatar
     */
    public static function defaultAvatar (){
        $avatar = new Avatar();
        $query = DB::getConn()->query("SELECT * FROM mkf_avatar WHERE id_avat = 1");
        if($query){
            $result = $query->fetch();
            $avatar
                ->setIdAvat($result['id_avat'])
                ->setAvatar($result['avatar']);
        }
        return $avatar;
    }
}