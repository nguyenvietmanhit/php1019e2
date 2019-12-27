<?php
session_start();
//nếu chưa tồn tại session admin, thì chuyển hướng lại về trang login.php
if (!isset($_SESSION['admin'])) {
  $_SESSION['error'] = "Bạn cần đăng nhập để vào được màn hình này";
  header("Location: login.php");
  exit();
}
?>
<h1>Chào mừng <?php echo $_SESSION['admin']?></h1>
<a href="logout.php">Đăng xuất</a>
