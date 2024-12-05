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

    public function dashboard()
    {
        if (empty($_SESSION['admin'])) {
            header('Location: index.php?controller=admin&action=login');
            exit();
        }
        require_once __DIR__ . '/../views/admin/dashboard.php';
    }

    public function logout()
    {
        unset($_SESSION['admin']);
        header('Location: index.php?controller=admin&action=login');
    }
}
