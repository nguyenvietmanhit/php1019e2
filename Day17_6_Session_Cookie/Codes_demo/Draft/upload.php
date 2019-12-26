<!--UPLOAD FILE-->

<!--<form method="post" action="upload_hander.php">-->
<form method="post" action="" enctype="multipart/form-data">
<!--  <input type="file" name="upload[]" multiple/>-->
  <input type="file" name="upload" multiple/>
  <input type="submit" name="submit" value="Submit" />
</form>
<?php
  if (isset($_POST['submit'])) {
    if (isset($_FILES['upload'])) {
      $files = $_FILES['upload'];
      echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
      print_r($files);
      echo "</pre>";

//      die;
      //file ko bị lỗi
      if ($files['error'] == 0) {

        //tạo thư muc chứa file upload nếu chưa tồn tại
        $directoryUpload = __DIR__ . '/Uploads';
          if (!file_exists($directoryUpload)) {
            mkdir($directoryUpload);
          }

          move_uploaded_file($files['tmp_name'], $directoryUpload . '/' . $files['name']);
          echo 'Upload thành công';
      }
      else {
        echo 'Cố lỗi xáy ra, quá trình upload file không thành công';
      }
    }

  }
?>

<!--XSS-->
<!--<script>alert(document.cookie)</script>-->
<!--<script>alert('Manh123')</script>-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
<?php
if (isset($_GET['submit'])){
  $name = $_GET['name'];
  //cach fix
//  $name = htmlspecialchars($_GET['name']);
  echo "Tên của bạn là $name";
}
?>
<form action="" method="GET">
    <label>Nhập tên của bạn</label>
    <input type="text" name="name" value="" />
    <input type="submit" value="Submit" name="submit"/>
</form>
</body>
</html>

<!-- CSRF -->
<!--http://qintech.co.nf/bai-viet/php-bao-mat-form-tren-website-voi-token.html-->
