<?php
require_once 'models/News.php';

class NewsController {
    public function detail() {
        $id = $_GET['id']; 
        require_once "controllers/HomeController.php"; 
        $controllerObj = new HomeController(); 
        $controllerObj->detail($id);
    }
}

?>