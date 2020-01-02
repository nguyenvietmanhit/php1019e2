<?php
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'ajax_example';
const DB_PORT = 3306;
//B1: Khởi tạo kết nối
$connection = mysqli_connect(DB_HOST, DB_USERNAME,
    DB_PASSWORD, DB_NAME, DB_PORT);

if (!$connection) {
    die("Không thể kết nối. Lỗi: " . mysqli_connect_error());
}

mysqli_query($connection, 'SET NAMES "utf8"');
//B2 Thực hiện truy vấn theo yêu cầu đề bài
//Lấy ra tất cả dữ liệu liên quan đến sách trong CSDL
$querySelect = "SELECT * FROM books";
$results = mysqli_query($connection, $querySelect);
//echo "<pre>";
//print_r($results);
$books = [];
if (mysqli_num_rows($results) > 0) {
    $books = mysqli_fetch_all($results, MYSQLI_ASSOC);
}

//B3: đóng kết nối
mysqli_close($connection);
?>
<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Type</th>
        <th>Published Date</th>
        <th>Create At</th>
    </tr>
    <?php if (empty($books)): ?>
        <tr>
            <td colspan="6">Không có bản ghi nào</td>
        </tr>
    <?php else: ?>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?php echo $book['id']; ?></td>
                <td><?php echo $book['name']; ?></td>
                <td><?php echo $book['description']; ?></td>
                <td>
                    <?php
                    $typeName = '';
                    switch ($book['type']) {
                        case 0: $typeName = 'Văn học';break;
                        case 1: $typeName = 'Toán';break;
                    }
                    echo $typeName;
                    ?>
                </td>
                <td><?php echo date('d-m-Y', strtotime($book['published_date'])); ?></td>
                <td><?php echo $book['created_at']; ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
