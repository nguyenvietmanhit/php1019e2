<?php
session_start();
require_once 'database.php';
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
//    die;
if (!isset($_SESSION['accountID'])) {
    $_SESSION['error'] = 'Bạn chưa đăng nhập';
    header("Location: login.php");
    exit();
}
?>
<h3 style="color: green">
    <?php
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
    }

    ?>
</h3>
<h2>Trang profile</h2>
