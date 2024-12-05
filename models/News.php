<?php

class News
{
    private $db;

    public function __construct()
    {
        global $database; // Sử dụng biến $database được khai báo toàn cục trong index.php
        $this->db = $database;
    }

    // Lấy danh sách tất cả tin tức
    public function getAllNews()
    {
        $query = "SELECT news.id, news.title, news.content, news.image, news.created_at, categories.name AS category_name 
                  FROM news
                  INNER JOIN categories ON news.category_id = categories.id
                  ORDER BY news.created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy chi tiết một bài tin tức theo ID
    public function getNewsById($id)
    {
        $query = "SELECT news.id, news.title, news.content, news.image, news.created_at, categories.name AS category_name 
                  FROM news
                  INNER JOIN categories ON news.category_id = categories.id
                  WHERE news.id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tìm kiếm tin tức theo từ khóa
    public function searchNews($keyword)
    {
        $query = "SELECT news.id, news.title, news.content, news.image, news.created_at, categories.name AS category_name 
                  FROM news
                  INNER JOIN categories ON news.category_id = categories.id
                  WHERE news.title LIKE :keyword OR news.content LIKE :keyword
                  ORDER BY news.created_at DESC";
        $stmt = $this->db->prepare($query);
        $keyword = '%' . $keyword . '%';
        $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>