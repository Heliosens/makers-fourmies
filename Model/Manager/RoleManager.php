<?php


class RoleManager
{
    /**
     * @return Role
     */
    public static function defaultRole (){
        $role = new Role();
        $query = DB::getConn()->query("SELECT * FROM mkf_role WHERE role = 'user'");
        if($query){
            $result = $query->fetch();
            $role->setId($result['id_role'])->setRoleName($result['role']);
        }
        return $role;
    }
}