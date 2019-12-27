<!--Chữa bài tập 1-->
<!--khi có input file trong form, phương thức bắt buộc phải là post-->
<!--và bắt buộc p hải có thuộc tính enctype-->
<?php
//xử lý upload form
$error = '';
$result = '';
if (isset($_POST['upload'])) {
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    if ($_FILES['avatar']['error'] == 0) {
        //validate file upload chỉ cho phép định dạng ảnh
        //lấy ra đuôi file
        $extension = pathinfo($_FILES['avatar']['name'],
            PATHINFO_EXTENSION);
        //chuyển đuôi file về chữ thường
        $extension = strtolower($extension);
        //khai báo mảng các đuôi file ảnh hợp lệ
        $arr_image_extension = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($extension, $arr_image_extension)) {
            $error = "Cân upload file có định dạng ảnh";
        }
        //validate trường hợp dung lượng upload > 1 Mb = 1024 * 1024 B
        // thì báo lỗi
        else if ($_FILES['avatar']['size'] > 1 * 1024 * 1024) {
            $error = "Cần upload file dung lượng tối đa 1Mb";
        } else {
            //xử lý upload file
            //tạo ra thư mục vật lý chứa file sẽ upload lên
            $dir_uploads = __DIR__ . '/uploads';
            //nếu chưa tồn tại thư mục thì tạo mới
            if (!file_exists($dir_uploads)) {
                mkdir($dir_uploads);
            }

            //set lại tên file để đảm bảo file ko bị trùng tên
//            dù file trên local có giống nhau đi chăng nữa
//            12143243-image.jpg
            $file_name = time() . '-' . $_FILES['avatar']['name'];

            $is_upload = move_uploaded_file($_FILES['avatar']['tmp_name'],
                $dir_uploads . '/' . $file_name);
            if ($is_upload) {
                $result .= "Avatar của bạn: ";
                $result .= "<img src='uploads/$file_name' height='50' />";
                $result .= "<br />";
                $result .= "Tên file: $file_name <br />";
                $result .= "Định dạng file: $extension";
                $result .= "Đường dẫn tuyệt đối file: "
                    . $dir_uploads . '/' . $file_name . "<br />";
//                0.00123 => 0.1;
                //dùng hàm round để làm tròn ph ần thập phân
                $file_size = round($_FILES['avatar']['size'] / 1024 / 1024, 2);
                $result .= "Dung lượng file(MB):  "
                    . $file_size;
            } else {
                $error = "Không thể upload file";
            }
        }

    } else {
        $error = "Có lỗi gì đó khi upload file";
    }
}
?>
<h3 style="color: red">
    <?php echo $error; ?>
</h3>
<h3 style="color: green">
    <?php echo $result; ?>
</h3>
<form action="" method="post" enctype="multipart/form-data">
    <b>Select a file to upload</b>
    <br/>
    <input type="file" name="avatar"/>
    <br/>
    Only jpg, jpeg, png and gif with maximum size of 1MB is allowed
    <br/>
    <input type="submit" value="Upload" name="upload"/>
</form>