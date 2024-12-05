<?php
// Connect database
$host = 'localhost';
$dbname = 'news';
$username = 'root';
$password = '';



try {
    $database = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage());
}

// Get the controller and action from the URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home'; // Get tham số controller từ URL
$action = isset($_GET['action']) ? $_GET['action'] : 'index'; // Get tham số action từ URL

// Create the controller class name
$controllerClass = ucfirst($controller) . 'Controller'; // ProductController

// Instantiate the controller
$controllerFile = "controllers/$controllerClass.php"; // controllers/ProductController.php
if (file_exists($controllerFile)) {
    include_once $controllerFile;
    $controllerInstance = new $controllerClass(); // $controllerInstance = new ProductController()
    $controllerInstance->$action(); // ProductController->index()
} else {
    echo "Controller not found.";
}
?>
