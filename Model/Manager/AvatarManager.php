<?php


class AvatarManager
{
    public static function defaultAvatar (){
        $avatar = new Avatar();
        $query = DB::getConn()->query("SELECT * FROM mkf_avatar WHERE avatar = 'user-gear.png'");
        if($query){
            $result = $query->fetch();
            $avatar->setIdAvat($result['id_avat'])->setAvatar($result['avatar']);
        }
        return $avatar;
    }
}