<?php
session_start();
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";
//nếu chưa đăng nhập mà truy cập vào file này
//thì phải chuyển hướng về trang login
if (!isset($_SESSION['username'])) {
    $_SESSION['error'] = 'Cần phải đăng nhập mới truy cập được trang này';
    header("Location: form_login.php");
    exit();
}
?>
<h1>
    <?php
    //hiển thị session đăng nhập thành công
    echo isset($_SESSION['success']) ? $_SESSION['success'] : '';
    //xóa message, chỉ hiển thị 1 lần duy nhất
    unset($_SESSION['success']);
    ?>
</h1>
<h1 style="color: green">
    Chào mừng bạn, <?php echo $_SESSION['username']?>
    <a href="logout.php">Đăng xuất</a>
</h1>
