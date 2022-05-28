<?php
session_start();

require __DIR__ . '/../includes.php';

$ctrl = isset($_GET['c']) ? Router::cleanParam($_GET['c']) : 'home';
$param = isset($_GET['p']) ? Router::cleanParam($_GET['p']) : 'page';
$option = isset($_GET['o']) ? Router::cleanOption($_GET['o']) : 'null';
$token = isset($_GET['t']) ? Router::cleanOption($_GET['t']) : 'null';

$route = new Router();
$route->toCtrl($ctrl, $param, $option, $token);
