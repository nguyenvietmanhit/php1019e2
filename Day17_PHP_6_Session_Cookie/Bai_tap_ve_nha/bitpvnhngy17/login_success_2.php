<?php
session_start();
if (!isset($_SESSION['username1'])) {
    $_SESSION['error'] = "cần đăng nhập trước";
    header("location: bai_tap_ve_nha_day_17_2.php");
    exit();
}

?>
<h3>
    <?php
    echo isset($_SESSION['success']) ? $_SESSION['success'] : '';
    unset($_SESSION['success']);
    ?>
</h3>
<h3>
    Chào mừng bạn <?php echo $_SESSION['username1']?>
    <a href="logout_2.php">Đăng xuất</a>
</h3>