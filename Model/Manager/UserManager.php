<?php


class UserManager
{
    /**
     * check if email ever exist
     * @param string $email
     * @return mixed
     */
    public static function mailEverExist (string $email){
        $nbr = DB::getConn()->query("SELECT count(*) FROM mkf_user WHERE mail = '$email'");
        return $nbr->fetch();
    }
}