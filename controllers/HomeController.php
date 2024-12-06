<?php

require_once 'models/News.php';

class HomeController
{
    private $newsModel;

    public function __construct()
    {
        $this->newsModel = new News();
    }

    // Trang chủ: Hiển thị danh sách tin tức
    public function index()
    {
        $newsList = $this->newsModel->getAllNews();
        require_once 'views/home/index.php';
    }

    // Xem chi tiết một bài tin tức
    public function detail()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $newsDetail = $this->newsModel->getNewsById($id);
            if ($newsDetail) {
                require_once 'views/news/detail.php';
            } else {
                echo "Tin tức không tồn tại!";
            }
        } else {
            echo "Không tìm thấy ID tin tức.";
        }
    }

    // Tìm kiếm tin tức
    public function search()
    {
        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            $searchResults = $this->newsModel->searchNews($keyword);
            require_once 'views/home/index.php';
        } else {
            echo "Vui lòng nhập từ khóa tìm kiếm.";
        }
    }
}

?>