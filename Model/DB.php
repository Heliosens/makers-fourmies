<?php


class DB
{
    private static ?PDO $pdo = null;
    private static string $server = Config::HOST;
    private static string $db = Config::DB;
    private static string $user = Config::USER;
    private static string $pwd = Config::PASSWORD;

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