<?php
session_start();

unset($_SESSION['username']);
setcookie('remember', '', time()-1);
setcookie('username','', time()-1);
setcookie('password','', time()-1);
$_SESSION['success'] = "Bạn đã đăng xuất khỏi hệ thống";
header("Location: index.php");
exit();
?>
