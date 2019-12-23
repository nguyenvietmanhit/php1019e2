
<?php
$error = '';
$result = '';
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $avatarArr = $_FILES['avatar'];
  if ($avatarArr['error'] == 0) {
    //validate anh
    $fileName = $avatarArr['name'];
    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
    $sizeMb = round($avatarArr['size'] / 1024 / 1024, 4);
    if (!in_array($extension, ['png', 'jpg', 'jpeg', 'gif'])) {
      $error = 'Cần upload dạng ảnh';
    } else if ($sizeMb >= 2) {
      $error = 'Phải upload file dung lượng dưới 2 Mb';
    } else {
      //upload file lên server
      $dirUploads = __DIR__ . '/uploads';
      if (!file_exists($dirUploads)) {
        mkdir($dirUploads);
      }
      $result .= "Thông tin hiển thị <br />";
      $result .= "Name: $name <br />";
      if (move_uploaded_file($avatarArr['tmp_name'], $dirUploads . '/' . $fileName)) {
        $result .= "Ảnh đại diện: <img src='uploads/$fileName'  /> <br />";
        $result .= "Tên file upload: $fileName <br />";
        $result .= "Định dang file upload: $extension <br />";
        $result .= "Đường dẫn lưu file: " . $dirUploads . '/' . $fileName . "<br />";
        $result .= "Kích thước file: $sizeMb Mb";
      }
    }
  } else {
    $error = "Có lỗi xảy ra, không thể upload ảnh";
  }
}
?>

<form method="post" action="" enctype="multipart/form-data">
    Name <input type="text" name="name" value="<?php echo isset($name) ? $name : null?>"/>
    <br/>
    <br/>
    Avatar <input type="file" name="avatar"/>
    <br/>
    <br/>
    <input type="submit" name="submit" value="Save"/>
    <div style="color: red">
      <?php echo $error; ?>
    </div>
    <div style="color: green">
      <?php echo $result; ?>
    </div>
</form>

