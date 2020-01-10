<?php
session_start();
$_SESSION['success'] = "Đăng xuất thành công";
header("location: bai_tap_ve_nha_day_17_1.php");
exit();
?>