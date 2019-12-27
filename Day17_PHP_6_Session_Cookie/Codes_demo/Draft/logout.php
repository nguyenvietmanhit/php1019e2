<?php
session_start();
//khi logout thì xóa hết session và cookie đã lưu liên quan đến username và password
unset($_SESSION['admin']);

setcookie('username', null, time() - 100);
setcookie('password', null, time() - 100);
header("Location: login.php");