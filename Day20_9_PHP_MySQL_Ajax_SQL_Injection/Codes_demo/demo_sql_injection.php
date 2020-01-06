<?php
//demo_sql_injection.php
//Làm ví dụ thông qua 1 form search
?>
<!--<h1>Xử lý ajax tại đây</h1>-->
<!--xử lý lấy thông tin sinh viên từ CSDL-->
<?php
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'db_19';
const DB_PORT = 3306;

$connection = mysqli_connect(DB_HOST, DB_USERNAME,
    DB_PASSWORD, DB_NAME, DB_PORT);

if (!$connection) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}

echo "<h2>Kết nối thành công</h2>";

//truy vấn CSDL để lấy ra thông tin tất cả
// sinh viên trong bảng students

//kiểm tra nếu user submit form
if (isset($_GET['submit'])) {
    $name = $_GET['name'];
    //để chống sql injection, thì nên sử dụng hàm sau trước khi thao
//    tác với biến mà lấy từ form
    $name = mysqli_real_escape_string($connection, $name);
    //tạo câu truy vấn
    $sql_select = "SELECT * FROM students WHERE `name` LIKE '%$name%'";
    echo "<pre>";
    print_r($name);
    echo "<br />";
print_r($sql_select);
echo "</pre>";
    //thực thi truy vấn
    $results = mysqli_query($connection, $sql_select);
    $students = [];
    if (mysqli_num_rows($results) > 0) {
        $students = mysqli_fetch_all($results, MYSQLI_ASSOC);
    }
}


//echo "<pre>";
//print_r($students);
//echo "</pre>";
?>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Created at</th>
    </tr>
    <?php if (empty($students)): ?>
        <tr>
            <td colspan="4">Không có sinh viên nào</td>
        </tr>
    <?php else: ?>
        <?php foreach ($students AS $student): ?>
            <tr>
                <td>
                    <?php echo $student['id'] ?>
                </td>
                <td>
                    <?php echo $student['name']?>
                </td>
                <td>
                    <?php echo $student['age']?>
                </td>
                <td>
                    <?php echo $student['created_at']?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>



<form method="get" action="">
    Nhập tên cần tìm kiếm
    <input type="text" name="name" value=""/>
    <br />
    <input type="submit" name="submit" value="Tìm kiếm" />
</form>
