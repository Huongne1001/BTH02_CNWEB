<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $newsDetail['title'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-3"><?= $newsDetail['title'] ?></h1>
        <p class="text-muted"><?= $newsDetail['category_name'] ?> - <?= $newsDetail['created_at'] ?></p>
        
        <?php if (!empty($newsDetail['image'])): ?>
            <img src="<?= $newsDetail['image'] ?>" class="img-fluid mb-4" alt="Hình ảnh tin tức">
        <?php endif; ?>

        <p><?= nl2br($newsDetail['content']) ?></p>

        <a href="?controller=home&action=index" class="btn btn-secondary mt-4">Quay lại</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
