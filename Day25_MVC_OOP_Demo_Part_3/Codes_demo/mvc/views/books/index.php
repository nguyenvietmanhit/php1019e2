<?php
//File views/books/index.php
require_once 'views/layouts/header.php';
?>
<a href="index.php?controller=book&action=create">
    Thêm mới
</a>
<!--hiển thị danh sách book dưới dạng bảng-->
<table cellspacing="0" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Tên sách</th>
        <th>Số lượng sách</th>
        <th>Ảnh đại diện</th>
        <th>Ngày tạo</th>
        <th>Hành động</th>
    </tr>
    <?php if (empty($books)): ?>
        <tr>
            <td colspan="5">Không có bản ghi nào</td>
        </tr>
    <?php else: ?>
        <?php foreach($books AS $book): ?>
            <tr>
                <td>
                    <?php echo $book['id']; ?>
                </td>
                <td>
                    <?php echo $book['name']; ?>
                </td>
                <td>
                    <?php echo $book['amount']; ?>
                </td>
                <td>
                    <?php if (!empty($book['avatar'])): ?>
                <img src="assets/uploads/<?php echo $book['avatar']?>"
                height="60"
                />
                    <?php endif; ?>
                </td>
                <td>
                    <?php
                    $created_at =
                        date('d-m-Y H:i:s', strtotime($book['created_at']));
                    echo $created_at;
                    ?>
                </td>
                <td>
                    <?php
                    $url_update
                        = "index.php?controller=book&action=update&id=" . $book['id'];
                    $url_delete
                        = "index.php?controller=book&action=delete&id=" . $book['id'];
                    ?>
                    <a href="<?php echo $url_update; ?>">Sửa</a>
                    <a href="<?php echo $url_delete?>"
                       onclick="return confirm('Bạn có muốn xóa không?')">
                        Xóa
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>

<?php
require_once 'views/layouts/footer.php';
?>
