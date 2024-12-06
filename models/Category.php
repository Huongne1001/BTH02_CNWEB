<?php
class Category {
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=news', 'root', '');
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function getAllCategories() {
        $stmt = $this->db->query('SELECT * FROM categories');
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Debug dữ liệu trả về
        // echo '<pre>';
        // print_r($categories);
        // echo '</pre>';
        // die();
    
        return $categories;
    }
    
}


?>

