<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - TLU News</title>
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
                        <a class="nav-link active" href="?controller=admin&action=dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=admin&action=index">Quản lý tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="?controller=admin&action=logout">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Chào mừng, <?php echo isset($_SESSION['admin']['username']) ? $_SESSION['admin']['username'] : ''; ?>!</h1>
        <p class="lead">Đây là bảng điều khiển quản trị của bạn.</p>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Số tin tức</div>
                    <div class="card-body">
                        <h5 class="card-title">10</h5>
                        <p class="card-text">Tổng số bài viết hiện có trong hệ thống.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Số danh mục</div>
                    <div class="card-body">
                        <h5 class="card-title">5</h5>
                        <p class="card-text">Số lượng danh mục tin tức.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Tài khoản</div>
                    <div class="card-body">
                        <h5 class="card-title">2</h5>
                        <p class="card-text">Tài khoản admin hiện có.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
