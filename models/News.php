<?php
require_once 'Database.php';

class News {
    public static function getAll() {
        $db = new Database();
        $conn = $db->connect(); // Kết nối CSDL
        $stmt = $conn->query("SELECT * FROM news ORDER BY created_at DESC"); // Lấy danh sách tin
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về mảng kết quả
    }
}
?>

