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


if ($action == 'detail' && isset($_GET['id'])) {
    $id = $_GET['id']; // Lấy ID từ URL
    require_once "controllers/HomeController.php"; // Đảm bảo gọi HomeController
    $controllerObj = new HomeController(); // Tạo đối tượng của HomeController
    $controllerObj->detail($id); // Gọi phương thức detail và truyền id
}

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

