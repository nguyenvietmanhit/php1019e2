<?php
session_start();
if (!isset($_SESSION['username4'])) {
    $_SESSION['error'] = 'bạn cần phải đăng nhập trc';
    header("location: bai_tap_ve_nha_day_17_3.php");
    exit();
}
date_default_timezone_set('Asia/Ho_Chi_Minh');
$created_at = date("d-m-Y H:i:s");
?>
<?php
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
}?>

<h3 style="font-weight: unset">
    <?php
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?><br>
    Chào mừng bạn, <span style="font-weight: bold"><?php echo $_SESSION['username4']; ?></span><br>
    Thời gian hiện tại đang login là:<span style="font-weight: bold;"><?php echo $created_at ?></span><br>
    <span style="color: #5B9BD5"><a style="text-decoration: none" href="logout_3.php"><span style="font-weight: bold">Logout</span></a></span>
</h3>
