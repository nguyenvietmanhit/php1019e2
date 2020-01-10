<?php
session_start();

if (!isset($_SESSION['username'])){
    $_SESSION['error'] = 'cần phải đăng nhập thì mới vào đc trang';
    header("location: bai_tap_ve_nha_day_17_1.php");
    exit();
}
?>
<h1>
<?php
echo isset($_SESSION['success']) ? $_SESSION['success'] : '';
unset($_SESSION['success']);
?>
</h1>
<h1>
    Chào mừng bạn<?php echo $_SESSION['username']?>
    <a href="logout.php">Đăng xuất.</a>
</h1>
