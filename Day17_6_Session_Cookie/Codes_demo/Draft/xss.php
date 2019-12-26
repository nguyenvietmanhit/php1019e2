<form method="get" action="">
    <input type="text" name="name">
    <input type="submit" value="Show" name="submit" />
</form>
<?php
if (isset($_GET['submit'])) {
    $name = htmlspecialchars($_GET['name']);
    echo "Tên của bạn là: " . $name;
    //cách phòng chống
}
?>