<?php
session_start();
//trang logout sẽ xóa hết toàn bộ session liên quan
//đến user đang đăng nhập
//và chuyển hướng user về form login
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
unset($_SESSION['username']);
//session_destroy();
$_SESSION['success'] = "Đăng xuất thành công";
//chuyển hướng về form login
header("Location: form_login.php");
exit();