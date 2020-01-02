<?php
session_start();
//nhúng file config chứa thông tin kết nối csdl để tránh việc phải
//viết lại tại từng file
require_once 'config.php';
//const DB_HOST ...
//thêm mới 1 danh mục
$error = '';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    //check validate
    if (empty($name)) {
        $error = "Tên danh mục không được để trống";
    } else if (strlen($name) < 2) {
        $error = 'Tên danh mục bắt buộc phải >= 2 ký tự';
    } else {
        //xử lý insert dữ liệu vào bảng categories

        $sqlInsert = "INSERT INTO categories(`name`) VALUES ('$name')";
        $isInsert = mysqli_query($connection, $sqlInsert);
        if ($isInsert) {
            //chuyển hướng người dùng về trang index.php
            //kèm theo thông báo thành công
            $_SESSION['success'] = 'Thêm mới thành công';
            header("Location: index.php");
            exit();
        } else {
            $error = "Insert không thành công";
        }
    }
}
?>
<h3 style="color: red">
    <?php echo $error; ?>
</h3>
<form action="" method="post">
    Nhập tên danh mục
    <input type="text" name="name"
           value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>"/>
    <br/>
    <br/>
    <input type="submit" name="submit" value="Lưu"/>
    <input type="reset" name="reset" value="Reset form"/>
</form>
