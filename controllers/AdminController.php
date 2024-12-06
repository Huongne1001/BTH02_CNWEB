<?php
class AdminController
{
    public function login()
    {
        require_once __DIR__ . '/../views/admin/login.php';
    }

    public function handleLogin()
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($username === 'admin' && $password === 'adminpassword') {
            $_SESSION['admin'] = $username;
            header('Location: index.php?controller=admin&action=dashboard');
        } else {
            $error = 'Thông tin đăng nhập không chính xác!';
            require_once __DIR__ . '/../views/admin/login.php';
        }
    }
  
    public function logout()
    {
        unset($_SESSION['admin']);
        header('Location: index.php?controller=admin&action=login');
    }

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

            // Handle image upload
            $imagePath = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/';
                $imagePath = $uploadDir . basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
            }

            $newsModel->createNews($title, $content, $categoryId, $imagePath);
            header('Location: index.php?action=dashboard');
        } else {
            require_once 'models/Category.php';
            $categoryModel = new Category();
            $categories = $categoryModel->getAllCategories();
            // echo '<pre>';
            // print_r($categories);
            // echo '</pre>';
            // die();

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

            // Handle image upload
            $imagePath = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/';
                $imagePath = $uploadDir . basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
            }

            $newsModel->updateNews($id, $title, $content, $categoryId, $imagePath);
            header('Location: index.php?action=dashboard');
        } else {
            $id = $_GET['id'];
            $news = $newsModel->getNewsById($id);
            require_once 'models/Category.php';
            $categoryModel = new Category();
            $categories = $categoryModel->getAllCategories();
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
