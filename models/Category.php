<?php
class Category {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tlunews', 'root', '');
    }

    public function getAllCategories() {
        $stmt = $this->db->query('SELECT * FROM categories');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>