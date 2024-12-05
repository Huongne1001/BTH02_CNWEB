<?php
require_once 'Database.php';

class News {
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

}
?>

