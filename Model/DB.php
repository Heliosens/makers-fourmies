<?php


class DB
{
    private static ?PDO $pdo = null;

    /**
     * @return PDO
     */
    public static function getConn() : PDO {
        if(self::$pdo !== null){
            return self::$pdo;
        }
        else {
            try {
                self::$pdo = new PDO("mysql:host=" . Config::HOST . ";dbname=" . Config::DB . ";charset=utf8",
                    Config::USER, Config::PASSWORD);
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