<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tin tức - TLU News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-search {
            white-space: nowrap;
            padding: 0.375rem 1rem;
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .btn-search:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        hr {
            border: 0;
            height: 5px;
            background-color: #004085;
        }

        .message {
            color: black;
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <!-- Thanh menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">TLU News</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="?controller=home&action=index">Danh sách Tin Tức</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Phần tiêu đề và thanh tìm kiếm -->
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <!-- Tiêu đề -->
            <h1>Danh sách Tin tức</h1>
            <!-- Thanh tìm kiếm -->
            <form action="index.php" method="get" class="d-flex">
                <input type="hidden" name="controller" value="home">
                <input type="hidden" name="action" value="search">
                <input type="text" name="keyword" class="form-control me-2" placeholder="Tìm kiếm tin tức...">
                <button type="submit" class="btn btn-search">Tìm kiếm</button>
            </form>
        </div>
        <hr>

        <!-- Thông báo nếu không có kết quả tìm kiếm -->
        <?php if (isset($message)): ?>
            <div class="message mt-3"><?= $message ?></div>
        <?php endif; ?>

        <!-- Danh sách tin tức -->
        <div class="row">
            <?php if (!empty($news)): ?>
                <?php foreach ($news as $item): ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="uploads/<?= $item['image'] ?>" class="card-img-top" alt="Hình ảnh">
                            <div class="card-body">
                                <h5 class="card-title"><?= $item['title'] ?></h5>
                                <p class="card-text text-muted">
                                    <small>
                                        Ngày đăng: <?= date('d/m/Y H:i', strtotime($item['created_at'])) ?>
                                    </small>
                                </p>
                                <a href="index.php?controller=news&action=detail&id=<?= $item['id'] ?>" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
