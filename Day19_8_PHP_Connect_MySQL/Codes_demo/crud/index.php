<!--Liệt kê danh sách các sinh viên đang có trong hệ thống-->
<?php
session_start();
//thực hiện kết nối tới CSDL, lấy ra tất cả bản ghi đang có trong
//bảng students
//nhúng file kết nối, có thể sử dụng biến $connection
require_once 'config.php';

//tạo câu truy vấn
$sql_select = "SELECT * FROM students";

//thực thi truy vấn
$results = mysqli_query($connection, $sql_select);

//khai báo 1 mảng rỗng tương đương với việc ko có bản ghi nào trả về
$students = [];
if (mysqli_num_rows($results) > 0) {
    $students = mysqli_fetch_all($results, MYSQLI_ASSOC);
}
echo "<pre>";
print_r($students);
echo "</pre>";

?>
<h3 style="color: red">
    <?php
    //nếu tồn tại session error, thì hiển thị, sau đó xóa luôn session
//    này, để đẩm bảo session chỉ tồn tại 1 lần duy nhất
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
</h3>
<h3 style="color: green">
    <?php
    //nếu tồn tại session success, thì hiển thị, sau đó xóa luôn session
    //    này, để đẩm bảo session chỉ tồn tại 1 lần duy nhất
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?>
</h3>
<a href="create.php">Thêm mới</a>
<h2>Danh sách sinh viên</h2>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Ngày tạo</th>
        <th>Action</th>
    </tr>
    <?php if (empty($students)):?>
    <tr>
        <td colspan="5">Không có sinh viên nào</td>
    </tr>
    <?php else: ?>
    <?php foreach($students AS $student): ?>
    <tr>
        <td>
            <?php echo $student['id']; ?>
        </td>
        <td>
            <?php echo $student['name']; ?>
        </td>
        <td>
            <?php echo $student['age']; ?>
        </td>
        <td>
            <?php
            echo date('d-m-Y H:i:s',
                strtotime($student['created_at']))
            ?>
        </td>
        <td>
            <a href="detail.php?id=<?php echo $student['id']; ?>">Chi tiết</a>
            <a href="update.php?id=<?php echo $student['id']; ?>">Cập nhật</a>
            <a href="delete.php?id=<?php echo $student['id']; ?>"
               onclick="return confirm('Are you delete?')">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
</table>