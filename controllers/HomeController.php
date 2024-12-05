<?php
require_once 'models/News.php';

class HomeController {
    public function index() {
        $news = News::getAll(); // Lấy tất cả tin tức từ Model
        include 'views/home/index.php'; // Truyền dữ liệu qua view
    }
}
?>
