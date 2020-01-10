<?php
session_start();
if(isset($_SESSION['check'])){
    setcookie('name','admin', time() + 3600);
    setcookie('password','123456',time() + 3600);
    if(isset($_COOKIE['name'])){
        $_SESSION['username2'] = $_COOKIE['name'];
        $_SESSION['password1'] = $_COOKIE['password'];
    }
}
$_SESSION['success'] = 'đăng nhập thành công';
unset($_SESSION['username1']);
header("location: bai_tap_ve_nha_day_17_2.php");
exit();
?>