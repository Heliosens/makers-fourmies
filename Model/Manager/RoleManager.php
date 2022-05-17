<?php


class RoleManager
{
    /**
     * @param $option
     * @return Role
     */
    public static function roleByName ($option) : Role
    {
        $role = new Role();
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "role WHERE role = '$option'");
        if($query){
            $result = $query->fetch();
            $role->setId($result['id_role'])->setRoleName($result['role']);
        }
        return $role;
    }

    /**
     * @param int $id
     * @return Role
     */
    public static function getRoleById (int $id) : Role
    {
        $role = new Role();
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "role WHERE id_role = $id");
        if($query){
            $result = $query->fetch();
            $role
                ->setId($result['id_role'])
                ->setRoleName($result['role']);
        }
        return $role;
    }



}