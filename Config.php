<?php

class Config
{
    // data base
    public const HOST = "localhost";
    public const DB = "makers-fourmies";
    public const USER = "root";
    public const PASSWORD = "";

    // data base prefix
    public const PRE = 'mkf_';

    /**
     * @param $param
     * @return string
     */
    public static function roleName($param){
        switch ($param){
            case 'admin' :
                return'Administrateur';
            case 'modo' :
                return 'Modérateur';
            case 'user' :
                return 'Utilisateur';
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
            case 2 :
                return 'En attente de validation';
            case 3 :
                return 'Publié';
            default :
                return null;
        }
    }

    /**
     * @param $param
     * @return string|null
     */
    public static function rubricsName($param){
        switch ($param){
            case 'type' :
                return 'Types';
            case 'category' :
                return 'Catégories';
            case 'technique' :
                return 'Techniques';
            case 'resource' :
                return 'Ressources';
            default :
                return null;
        }
    }
}


