<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['error'] = 'Cần phải đăng nhập mới truy cập được trang này';
    header("Location: form_login.php");
    exit();
}
?>

<meta charset="utf-8"/>

<h1>
    <?php
    echo isset($_SESSION['success']) ? $_SESSION['success'] : "";
    unset($_SESSION['success']);
    ?>
</h1>
<h1>
    Chào bạn, <?php echo $_SESSION['username'];?>
    <a href="logout.php">Logout</a>
</h1>


