<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết Tin Tức - TLU News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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

    <!-- Chi tiết tin tức -->
    <div class="container mt-5">
        <h1 class="text-center"><?= $news['title'] ?></h1> <!-- Tiêu đề tin tức -->
        <p class="text-center text-muted">
            Ngày đăng: <?= date('d/m/Y H:i', strtotime($news['created_at'])) ?> <!-- Thời gian đăng -->
        </p>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <img src="uploads/<?= $news['image'] ?>" class="img-fluid" alt="Hình ảnh tin tức"> <!-- Hình ảnh -->
                <p class="mt-3"><?= nl2br($news['content']) ?></p> <!-- Nội dung tin tức -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>                            
</html>
