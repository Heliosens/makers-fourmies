<?php


class UserManager
{
    /**
     * check if email ever exist
     * @param string $email
     * @return bool
     */
    public static function mailEverExist (string $email) : bool
    {
        $result = DB::getConn()->query("SELECT count(*) as nbr FROM mkf_user WHERE mail = '$email'");
        return $result->fetch()['nbr'] > 0;
    }

    /**
     * create new user
     * @param User $user
     * @return bool
     */
    public static function addUser(User &$user) : bool
    {
        $stm = DB::getConn()->prepare("
        INSERT INTO mkf_user (pseudo, mail, password, avat_fk, role_fk) VALUES (:pseudo, :email, :password, 1, 3)");

        $stm->bindValue(':pseudo', $user->getPseudo());
        $stm->bindValue(':email', $user->getEmail());
        $stm->bindValue(':password', $user->getPassword());

        $result = $stm->execute();
        $user->setId(DB::getConn()->lastInsertId());

        return $result;
    }

    /**
     * @param $mail
     * @return User
     */
    public static function getUserByMail($mail) : User
    {
        $user = new User();
        $query = DB::getConn()->query("SELECT * FROM mkf_user WHERE mail = '$mail'");
        if($query){
            $result = $query->fetch();
            $user->setId($result['id_user'])
                ->setPseudo($result['pseudo'])
                ->setEmail($result['mail'])
                ->setPassword($result['password'])
                ->setAvatar(AvatarManager::getAvatById($result['avat_fk']))
                ->setRole(RoleManager::getRoleById($result['role_fk']))
                ;
        }
        return $user;
    }


}