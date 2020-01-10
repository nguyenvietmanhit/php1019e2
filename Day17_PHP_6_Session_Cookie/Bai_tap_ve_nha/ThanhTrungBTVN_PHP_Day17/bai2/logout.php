<?php
session_start();

unset($_SESSION['username']);
setcookie('remember', '', time()-1);
$_SESSION['success'] = "Đăng xuất thành công";
header("Location: index.php");
exit();
?>
