<?php
require_once 'models/News.php';

class HomeController {
    public function index() {
        $news = News::getAll(); // Lấy tất cả tin tức từ Model
        include 'views/home/index.php'; // Truyền dữ liệu qua view
    }

    // Thêm phương thức detail để hiển thị chi tiết tin tức
    public function detail($id) {
        $news = News::getById($id); // Lấy chi tiết tin tức theo id
        include 'views/news/detail.php'; // Truyền dữ liệu chi tiết qua view
    }
}
?>
