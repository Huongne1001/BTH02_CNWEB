<?php

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

    public function createNews($title, $content, $categoryId) {
        $stmt = $this->db->prepare('INSERT INTO news (title, content, category_id) VALUES (?, ?, ?)');
        $stmt->execute([$title, $content, $categoryId]);
    }

    public function updateNews($id, $title, $content, $categoryId) {
        $stmt = $this->db->prepare('UPDATE news SET title = ?, content = ?, category_id = ? WHERE id = ?');
        $stmt->execute([$title, $content, $categoryId, $id]);
    }

    public function deleteNews($id) {
        $stmt = $this->db->prepare('DELETE FROM news WHERE id = ?');
        $stmt->execute([$id]);
    }
}