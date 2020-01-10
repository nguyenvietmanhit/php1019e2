<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['error'] = 'Bạn cần đăng nhập để có thể truy cập trang này';
    header("Location: index.php");
    exit();
}
?>

<meta charset="utf-8"/>

<h2>
    <?php
    echo isset($_SESSION['success']) ? $_SESSION['success'] : "";
    unset($_SESSION['success']);
    ?>
</h2>
<h2>Chào mừng bạn, <?php echo $_SESSION['username'];?></h2>
<h2>Thời gian hiện tại đang login: <?php $date = getdate(); echo $date['hours'] . ':' . $date['minutes'] . ':' .$date['seconds'];?></h2>
<h2><a href="logout.php" style="color: #4e95ea; text-decoration: none;">Logout</a></h2>


