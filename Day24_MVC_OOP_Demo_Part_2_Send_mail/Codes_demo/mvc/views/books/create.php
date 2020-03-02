<!-- views/books/create.php -->
<?php
    require_once 'views/layouts/header.php';
?>
<h1>Form thêm mới</h1>

<form action="" method="post" enctype="multipart/form-data">
<!--  nếu sử dụng phương thức get trong form, thì cần phải
  thêm 2 input ẩn là controller và action có giá trị đúng bằng
  controller và action hiện tại
  -->
<!--    <input type="hidden" name="controller" value="book" />-->
<!--    <input type="hidden" name="action" value="create" />-->
    Tên sách (*): <input type="text" name="name" value="" />
    <br />
    Số lượng sách: <input type="number" name="amount" value="" />
    <br />
    Ảnh đại diện: <input type="file" name="avatar" />
    <br />
    <input type="submit" value="Lưu" name="submit" />
    <input type="reset" value="Reset" />
</form>

<?php
require_once 'views/layouts/footer.php';
?>