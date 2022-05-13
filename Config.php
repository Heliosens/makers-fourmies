<?php

class Config
{
    // data base prefix
    public const PRE = 'mkf_';

    // data base
    public const HOST = "localhost";
    public const DB = "makers-fourmies";
    public const USER = "root";
    public const PASSWORD = "";

    /**
     * @param $param
     * @return string
     */
    public static function roleName($param){
        switch ($param){
            case 'admin' :
                return'Administrateur';
                break;
            case 'modo' :
                return 'Modérateur';
                break;
            case 'user' :
                return 'Utilisateur';
                break;
            default :
                return 'Unknown';
        }
    }

    /**
     * @param $param
     * @return string|null
     */
    public static function stateName($param){
        switch ($param){
            case 1 :
                return 'Privé';
                break;
            case 2 :
                return 'En attente de validation';
                break;
            case 3 :
                return 'Publié';
                break;
            default :
                return null;
        }
    }
}


