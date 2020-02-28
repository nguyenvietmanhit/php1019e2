<?php
//echo 'View create của bookcontroller';
require_once 'views/layouts/header.php';
?>
<form action="" method="get">
    Tên sách:
    <input type="text" name="name" />
    <br />
    Số lượng sách:
    <input type="number" name="amount" />
    <br />
    <input type="submit" name="submit" value="Lưu" />
</form>
<?php
require_once 'views/layouts/footer.php';
?>