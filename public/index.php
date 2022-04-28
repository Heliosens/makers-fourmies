<?php
session_start();

require __DIR__ . '/../includes.php';

$ctrl = isset($_GET['c']) ? Router::cleanParam($_GET['c']) : 'home';
$param = isset($_GET['p']) ? Router::cleanParam($_GET['p']) : null;

switch ($ctrl){
    case 'home' :
        HomeRouter::route();
        break;

}