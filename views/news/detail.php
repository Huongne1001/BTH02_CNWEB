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
                        <a class="nav-link active" href="?controller=home&action=index">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=news&action=index">Danh sách Tin Tức</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card">
            <img src="assets/uploads/<?php echo $news['image']; ?>" class="card-img-top" alt="Image">
            <div class="card-body">
                <h5 class="card-title"><?php echo $news['title']; ?></h5>
                <p class="card-text"><?php echo nl2br($news['content']); ?></p>
                <p class="text-muted">Danh mục: <?php echo $news['category_name']; ?></p>
                <p class="text-muted">Ngày tạo: <?php echo $news['created_at']; ?></p>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
