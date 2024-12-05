<?php
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

require_once "controllers/" . ucfirst($controller) . "Controller.php";

$controllerName = ucfirst($controller) . "Controller";
$controllerObj = new $controllerName();
$controllerObj->$action();
?>
