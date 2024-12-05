<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Quản lý tin tức</h3>
        <a href="?controller=admin&action=addNews" class="btn btn-success">Thêm bài viết</a>
    </div>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Tiêu đề</th>
                <th>Danh mục</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($newsList as $news): ?>
                <tr>
                    <td><?php echo $news['id']; ?></td>
                    <td><?php echo $news['title']; ?></td>
                    <td><?php echo $news['category_name']; ?></td>
                    <td><?php echo $news['created_at']; ?></td>
                    <td>
                        <a href="?controller=admin&action=editNews&id=<?php echo $news['id']; ?>" class="btn btn-primary btn-sm">Sửa</a>
                        <a href="?controller=admin&action=deleteNews&id=<?php echo $news['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
