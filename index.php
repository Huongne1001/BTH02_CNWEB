<?php
// Connect database
$host = 'localhost';
$dbname = 'news';
$username = 'root';
$password = '';

session_start();

try {
    $database = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage());
}

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerClass = ucfirst($controller) . 'Controller';
$controllerFile = "controllers/$controllerClass.php";
if (file_exists($controllerFile)) {
    include_once $controllerFile;
    $controllerInstance = new $controllerClass(); 
    $controllerInstance->$action();
} else {
    echo "Controller not found.";
}
?>
