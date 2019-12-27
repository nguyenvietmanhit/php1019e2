<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="upload" />
    <input type="submit" value="Upload file" name="submit" />
</form>
<?php
if (isset($_POST['submit'])) {
    echo '<pre>';
    print_r($_POST);
    print_r($_FILES);
    //nếu có file đc upload lên thì mới xử lý
    if (isset($_FILES['upload'])) {
       $fileArr = $_FILES['upload'];
       $extension = strtolower
       (pathinfo($_FILES['upload']['name'],PATHINFO_EXTENSION));
       if(in_array($extension, ['png', 'gif', 'jpg', 'jpeg'])) {
           //có định dạng ảnh
       }
       if ($fileArr['error'] != 0) {
           echo '<p style="color: red">Có lỗi gì đó xảy ra. Upload file thất bại</p>';
       }
       else {
           //khi upload thành công, cần lưu file vừa upload lên
//           projects của mình
//           print_r(__DIR__);
           $uploadDirectory = __DIR__ . '/uploads';
           //nếu thư mục trên không tồn tại thì mới tạo
           if (!file_exists($uploadDirectory)) {
               mkdir($uploadDirectory);
           }
           //move upload file từ thư mục tạm sang thư mục thật
//           trên projects
           $isUploaded = move_uploaded_file($fileArr['tmp_name'],
               $uploadDirectory . '/' . $fileArr['name']);
           if ($isUploaded) {
               echo 'Upload file thành công';
               echo 'Tên file: ' . $fileArr['name'] . '<br />';
               echo 'Kiểu file: ' . $fileArr['type'] . '<br />';
               echo 'Kích thước file: ' . $fileArr['size'] . 'B<br />';
           }
           else {
               echo '<p style="color:red">Quá trình upload file xảy ra lỗi gì</p>';
           }
       }
    }
}
?>