<?php
session_start();

unset($_SESSION['username']);
$_SESSION['success'] = "Đăng xuất thành công";
header("Location: login_form.php");
exit();
?>
