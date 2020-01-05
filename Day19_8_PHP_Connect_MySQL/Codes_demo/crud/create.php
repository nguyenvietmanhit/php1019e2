<!--Hiển thị 1 form cho phép thêm sinh viên mới-->
<?php
session_start();
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
        //thực hiện insert dữ liệu vào bảng students
        //tạo câu truy vấn insert
        $sql_insert = "INSERT INTO students(`name`, `age`) 
                        VALUES('$name', $age)";
        //thực thi truy vấn
        $is_insert = mysqli_query($connection, $sql_insert);
        //khi thực hiện xong câu truy vấn thì nên đóng kết nối lại
        mysqli_close($connection);
        if ($is_insert) {
            $_SESSION['success'] = "Thêm mới thành công";
        } else {
            $_SESSION['error'] = "Insert thất bại";
        }
//        chuyển hướng tới trang Liệt kê sinh viên
        header("Location: index.php");
        exit();
    }
}
?>
<h3 style="color: red">
    <!--    hiển thị ra thông báo lỗi khi validate lỗi-->
    <?php echo $error;?>
</h3>
<meta charset="utf8"/>

<form action="" method="post">
    Nhập tên:
    <input type="text" name="name" value=""/>
    <br/>
    Nhập tuổi
    <input type="number" name="age" value=""/>
    <br/>
    <button type="submit" name="submit">Thêm mới</button>
</form>