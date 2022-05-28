<?php


class UserManager
{
    /**
     * @param $id
     * @return user|false
     */
    public static function getUserById ($id)
    {
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "user WHERE id_user = $id");
        if($query){
            $data = $query->fetch();

            $role = RoleManager::getRoleById($data['role_fk']);
            $avat = AvatarManager::getAvatById($data['avat_fk']);
            return (new User())
                ->setId($data['id_user'])
                ->setPseudo($data['pseudo'])
                ->setEmail($data['mail'])
                ->setRole($role)
                ->setAvatar($avat)
                ->setToken($data['token'])
                ->setRedoPass($data['redo_pass']);
        }
        return false;
    }

    /**
     * check if email ever exist
     * @param string $email
     * @return bool
     */
    public static function mailEverExist (string $email) : bool
    {
        $stm = DB::getConn()->prepare("SELECT count(*) as nbr FROM " . Config::PRE . "user WHERE mail = :mail");
        $stm->bindParam(':mail', $email);
        $stm->execute();
        return $stm->fetch()['nbr'] > 0;
    }


    /**
     * check if pseudo ever exist
     * @param string $pseudo
     * @return bool
     */
    public static function pseudoEverExist (string $pseudo) : bool
    {
        $stm = DB::getConn()->prepare("SELECT count(*) as nbr FROM " . Config::PRE . "user WHERE pseudo = :pseudo");
        $stm->bindParam(':pseudo', $pseudo);
        $stm->execute();
        return $stm->fetch()['nbr'] > 0;
    }

    /**
     * create new user
     * @param User $user
     * @return bool
     */
    public static function addUser(User &$user) : bool
    {
        $stm = DB::getConn()->prepare("
        INSERT INTO " . Config::PRE . "user (pseudo, mail, password, avat_fk, role_fk, token) 
        VALUES (:pseudo, :email, :password, 1, 3, :token)");

        $stm->bindValue(':pseudo', $user->getPseudo());
        $stm->bindValue(':email', $user->getEmail());
        $stm->bindValue(':password', $user->getPassword());
        $stm->bindValue(':token', $user->getToken());

        $result = $stm->execute();
        $user->setId(DB::getConn()->lastInsertId());

        return $result;
    }

    /**
     * @param $email
     * @return User
     */
    public static function getUserByMail($email) : User
    {
        $user = new User();
        $stm = DB::getConn()->prepare("SELECT * FROM " . Config::PRE . "user WHERE mail = :mail");
        $stm->bindParam(':mail', $email);

        if($stm->execute()){
            $item = $stm->fetch();
            $user->setId($item['id_user'])
                ->setPseudo($item['pseudo'])
                ->setEmail($item['mail'])
                ->setPassword($item['password'])
                ->setAvatar(AvatarManager::getAvatById($item['avat_fk']))
                ->setRole(RoleManager::getRoleById($item['role_fk']))
                ->setToken($item['token'])
                ;
        }
        return $user;
    }

    /**
     * find all users
     * @return array
     */
    public static function allUser (){
        $users = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "user");
        if($query){
            foreach ($query->fetchAll() as $item){
                $users[] = (new User())
                    ->setId($item['id_user'])
                    ->setPseudo($item['pseudo'])
                    ->setEmail($item['mail'])
                    ->setPassword('')
                    ->setToken($item['token'])
                    ->setAvatar(AvatarManager::getAvatById($item['avat_fk']))
                    ->setRole(RoleManager::getRoleById($item['role_fk']))
                ;
            }
        }
        return $users;
    }

    /**
     * @param int $id
     * @return Avatar|false
     */
    public static function getAvatar(int $id){
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "user WHERE id_user = $id");
        if($query){
            $item = $query->fetch();
            return $avat = AvatarManager::getAvatById($item['avat_fk']);
        }
        return false;
    }

    /**
     * @param int $id
     * @return false|Role
     */
    public static function getRoleByUser (int $id){
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "user WHERE id_user = $id");
        if($query){
            $item = $query->fetch();
            return $role = RoleManager::getRoleById($item['role_fk']);
        }
        return false;
    }

    /**
     * @param string $id
     * @return mixed
     */
    public static function delById (string $id){
        return DB::getConn()->query("DELETE FROM " . Config::PRE . "user WHERE id_user = '$id'");
    }

    /**
     * count nbr of admin
     * @return mixed
     */
    public static function adminNbr (){
        $query = DB::getConn()->query("
            SELECT count(*) as nbr FROM " . Config::PRE . "user WHERE role_fk = 1");
        return $query->fetch();
    }

    /**
     * delete user token
     * @param $id
     * @return bool
     */
    public static function updateToken($id){
        $stm = DB::getConn()->prepare("UPDATE " . Config::PRE . "user SET token = null WHERE id_user = $id");
        return $stm->execute();
    }

}