<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Tin Tức - TLU News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">TLU News</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=admin&action=dashboard">Về Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="?controller=admin&action=logout">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <!-- Tiêu đề và nút thêm bài viết -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="text-primary">Quản lý tin tức</h3>
            <a href="?controller=admin&action=addNews" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Thêm bài viết
            </a>
        </div>

        <!-- Bảng hiển thị danh sách tin tức -->
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Danh mục</th>
                    <th>Ngày tạo</th>
                    <th class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($newsList)): ?>
                    <?php foreach ($newsList as $news): ?>
                        <tr>
                            <td><?php echo $news['id']; ?></td>
                            <td><?php echo htmlspecialchars($news['title']); ?></td>
                            <td>
                                <?php
                                foreach ($categories as $category) {
                                    if ($category['id'] == $news['category_id']) {
                                        echo $category['name'];
                                    }
                                }
                                ?>
                            </td>
                            <td><?php echo htmlspecialchars($news['created_at']); ?></td>
                            <td class="text-center">
                                <a href="?controller=admin&action=editNews&id=<?php echo $news['id']; ?>"
                                    class="btn btn-primary btn-sm me-1">
                                    <i class="bi bi-pencil"></i> Sửa
                                </a>
                                <a href="?controller=admin&action=deleteNews&id=<?php echo $news['id']; ?>"
                                    class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                    <i class="bi bi-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">Không có bài viết nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Thêm Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>