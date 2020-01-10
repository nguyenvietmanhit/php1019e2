<?php
session_start();
unset($_SESSION['username4']);
setcookie('name','admin',time() + -1);
header("location: bai_tap_ve_nha_day_17_3.php");
exit();
?>
<!--<a href="bai_tap_ve_nha_day_17_3.php">login</a>-->
