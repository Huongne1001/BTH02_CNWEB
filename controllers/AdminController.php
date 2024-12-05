<?php
class AdminController {
    public function dashboard() {
        require_once 'models/News.php';
        $newsModel = new News();
        $newsList = $newsModel->getAllNews();
        require 'views/admin/dashboard.php';
    }

    public function addNews() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once 'models/News.php';
            $newsModel = new News();
            $title = $_POST['title'];
            $content = $_POST['content'];
            $categoryId = $_POST['category_id'];

            $newsModel->createNews($title, $content, $categoryId);
            header('Location: index.php?action=dashboard');
        } else {
            require 'views/admin/news/add.php';
        }
    }

    public function editNews() {
        require_once 'models/News.php';
        $newsModel = new News();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $categoryId = $_POST['category_id'];

            $newsModel->updateNews($id, $title, $content, $categoryId);
            header('Location: index.php?action=dashboard');
        } else {
            $id = $_GET['id'];
            $news = $newsModel->getNewsById($id);
            require 'views/admin/news/edit.php';
        }
    }

    public function deleteNews() {
        require_once 'models/News.php';
        $newsModel = new News();
        $id = $_GET['id'];
        $newsModel->deleteNews($id);
        header('Location: index.php?action=dashboard');
    }
}
?>