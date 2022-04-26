<?php


class DB
{
    private static ?PDO $pdo = null;
    private static $server = 'localhost';
    private static $db = 'makersfourmies';
    private static $user = 'root';
    private static $pwd = '';

    /**
     * @return PDO
     */
    public static function getConn() : PDO {
        if(self::$pdo !== null){
            return self::$pdo;
        }
        else {
            try {
                self::$pdo = new PDO("mysql:host=" . self::$server . ";dbname=" . self::$db . ";charset=utf8",
                    self::$user, self::$pwd);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // get result as associative array
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            }
            catch (PDOException $error){
                echo "Error : " . $error->getMessage();
            }
        }
        return self::$pdo;
    }
}