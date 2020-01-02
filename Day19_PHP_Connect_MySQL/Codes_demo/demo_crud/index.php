<?php
session_start();
//liệt kê các danh mục đang có trên hệ thống
require_once 'config.php';
//thực hiện truy vấn lấy ra dữ liệu từ bảng categories
$sqlSelect = "SELECT * FROM categories";
$results = mysqli_query($connection, $sqlSelect);
$categories = [];
//check nếu có dữ liệu trả về
if (mysqli_num_rows($results) > 0) {
    $categories = mysqli_fetch_all($results, MYSQLI_ASSOC);
}
?>
<h3 style="color: green">
    <?php
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?>
</h3>
<a href="create.php">Thêm mới danh mục</a>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <?php if (empty($categories)): ?>
        <tr>
            <td colspan="2">Không có bản ghi nào</td>
        </tr>
    <?php else: ?>
        <?php foreach ($categories AS $category): ?>
            <tr>
                <td>
                    <?php echo $category['id']; ?>
                </td>
                <td>
                    <?php echo $category['name']; ?>
                </td>
                <td>
                    <a href="update.php?id=<?php echo $category['id'] ?>">
                        Sửa
                    </a>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"
                       href="delete.php?id=<?php echo $category['id'] ?>">
                        Xóa
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

    <?php endif; ?>
</table>
