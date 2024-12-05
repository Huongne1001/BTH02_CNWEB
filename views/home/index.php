<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Danh sách tin tức</h1>

        <!-- Form tìm kiếm -->
        <form class="d-flex mb-4" method="GET" action="">
            <input type="hidden" name="controller" value="home">
            <input type="hidden" name="action" value="search">
            <input class="form-control me-2" type="search" name="keyword" placeholder="Tìm kiếm tin tức..." aria-label="Search">
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </form>

        <!-- Danh sách tin tức -->
        <div class="row">
            <?php if (!empty($newsList)): ?>
                <?php foreach ($newsList as $news): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="<?= $news['image'] ?>" class="card-img-top" alt="Hình ảnh tin tức">
                            <div class="card-body">
                                <h5 class="card-title"><?= $news['title'] ?></h5>
                                <p class="card-text text-muted"><?= $news['category_name'] ?> - <?= $news['created_at'] ?></p>
                                <p class="card-text"><?= substr($news['content'], 0, 100) ?>...</p>
                                <a href="?controller=home&action=detail&id=<?= $news['id'] ?>" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-warning text-center">Không có tin tức nào để hiển thị.</div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
