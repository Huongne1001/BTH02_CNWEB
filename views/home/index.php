<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ - TLU News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <a class="nav-link active" href="?controller=home&action=index">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=news&action=index">Danh sách Tin Tức</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Danh sách tin tức -->
    <div class="container mt-5">
        <h1 class="text-center">Danh sách Tin tức</h1>
        <div class="row">
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
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
