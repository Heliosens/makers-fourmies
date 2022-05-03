<?php


class RoleManager
{
    /**
     * @param $option
     * @return Role
     */
    public static function roleByName ($option){
        $role = new Role();
        $query = DB::getConn()->query("SELECT * FROM mkf_role WHERE role = '$option'");
        if($query){
            $result = $query->fetch();
            $role->setId($result['id_role'])->setRoleName($result['role']);
        }
        return $role;
    }
}