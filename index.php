<?php
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

if ($action == 'detail' && isset($_GET['id'])) {
    $id = $_GET['id']; // Lấy ID từ URL
    require_once "controllers/HomeController.php"; // Đảm bảo gọi HomeController
    $controllerObj = new HomeController(); // Tạo đối tượng của HomeController
    $controllerObj->detail($id); // Gọi phương thức detail và truyền id
} else {
    require_once "controllers/" . ucfirst($controller) . "Controller.php"; // Gọi controller thông qua biến controller
    $controllerName = ucfirst($controller) . "Controller";
    $controllerObj = new $controllerName();
    $controllerObj->$action();
}
