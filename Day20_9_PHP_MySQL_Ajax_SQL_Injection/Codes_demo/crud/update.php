<!--Hiển thị 1 form cho phép thêm sinh viên mới-->
<?php
if (!isset($_GET['id'])) {
    $_SESSION['error'] = 'Tham số id không tồn tại';
    //chuyển hướng về trang liệt kê
    header("Location: index.php");
    exit();
} //validate trường hợp id không phải số
else if (!is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'ID phải là số';
    //chuyển hướng về trang liệt kê
    header("Location: index.php");
    exit();
}
$id = $_GET['id'];

//truy vấn cơ sở dữ liệu
require_once 'config.php';
//lấy ra đối tượng sinh viên theo id vừa bắt được từ trình duyệt
//tạo câu truy vấn
$sql_select = "SELECT * FROM students WHERE id = $id";
$results = mysqli_query($connection, $sql_select);
$student = [];
if (mysqli_num_rows($results) > 0) {
    $students = mysqli_fetch_all($results, MYSQLI_ASSOC);
//    echo "<pre>";
//    print_r($students);
//    echo "</pre>";
    //do truy vấn với điều kiện theo id rồi nên bao giờ cũng
    //trả về 1 phần tử duy nhất
    $student = $students[0];
}

//nhúng file config để cho phép kết nối tới CSDL
require_once 'config.php';
//xử lý form và lưu dữ liệu
$error = '';
$result = '';
if (isset($_POST['submit'])) {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    $name = $_POST['name'];
    $age = $_POST['age'];
    //validate form
    //nếu như để trống name hoặc age thì báo lỗi
    if (empty($name) || empty($age)) {
        $error = "Không được để trống";
    } else if ($age <= 0) {
        $error = "Tuổi phải nhập số dương";
    } else {
        //thực hiện update dữ liệu vào bảng students
        //tạo câu truy vấn insert
        $sql_update = "UPDATE students SET
 `name` = '$name', `age` = $age WHERE id = $id";
        //thực thi truy vấn
        $is_update = mysqli_query($connection, $sql_update);
        //khi thực hiện xong câu truy vấn thì nên đóng kết nối lại
        mysqli_close($connection);
        if ($is_update) {
            $_SESSION['success'] = "Update bản ghi $id thành công";
        } else {
            $_SESSION['error'] = "Update bản ghi $id thất bại";
        }
//        chuyển hướng tới trang Liệt kê sinh viên
        header("Location: index.php");
        exit();
    }
}
//về logic sẽ xây dựng chức năng Thêm mới trước -> Liệt kê ->
//Chi tiêt/ Cập nhật/ Xóa
?>
<h3 style="color: red">
    <!--    hiển thị ra thông báo lỗi khi validate lỗi-->
    <?php echo $error;?>
</h3>
<meta charset="utf8"/>
<h3>Cập nhật</h3>
<form action="" method="post">
    Nhập tên:
    <input type="text" name="name"
           value="<?php echo $student['name']?>"/>
    <br/>
    Nhập tuổi
    <input type="number" name="age"
           value="<?php echo $student['age'] ?>"/>
    <br/>
    <button type="submit" name="submit">Cập nhật</button>
</form>