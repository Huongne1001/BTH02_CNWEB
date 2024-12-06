<?php
require_once 'Database.php';

class News {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=news', 'root', '');
    }

    public function getAllNews() {
        $stmt = $this->db->query('SELECT * FROM news');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNewsById($id) {
        $stmt = $this->db->prepare('SELECT * FROM news WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createNews($title, $content, $categoryId, $imagePath) {
        $stmt = $this->db->prepare('INSERT INTO news (title, content, image, category_id) VALUES (?, ?, ?, ?)');
        $stmt->execute([$title, $content, $imagePath, $categoryId]);
    }

    public function updateNews($id, $title, $content, $categoryId, $imagePath) {
        $stmt = $this->db->prepare('UPDATE news SET title = ?, content = ?, category_id = ?, image = ? WHERE id = ?');
        $stmt->execute([$title, $content, $categoryId, $imagePath, $id]);
    }

    public function deleteNews($id) {
        $stmt = $this->db->prepare('DELETE FROM news WHERE id = ?');
        $stmt->execute([$id]);
    }

    public static function getAll() {
        $db = new Database();
        $conn = $db->connect(); // Kết nối CSDL
        $stmt = $conn->query("SELECT * FROM news ORDER BY created_at DESC"); // Lấy danh sách tin
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về mảng kết quả
    }

    // Thêm phương thức getById để lấy chi tiết tin tức theo ID
    public static function getById($id) {
        $db = new Database();
        $conn = $db->connect(); // Kết nối CSDL
        $stmt = $conn->prepare("SELECT * FROM news WHERE id = :id"); // Truy vấn lấy tin tức theo id
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Bảo vệ truy vấn khỏi SQL Injection
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về tin tức
    }

    // Thêm phương thức tìm kiếm tin tức theo từ khóa
    public static function search($keyword) {
        $db = new Database();
        $conn = $db->connect(); // Kết nối CSDL
        $stmt = $conn->prepare("SELECT * FROM news WHERE title LIKE ? OR content LIKE ? ORDER BY created_at DESC");
        $stmt->execute(['%' . $keyword . '%', '%' . $keyword . '%']); // Tìm kiếm theo tiêu đề và nội dung
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về kết quả tìm kiếm
    }

}
?>
