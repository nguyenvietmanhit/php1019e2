<?php
$error = '';
$result = '';
//nếu có hành động submit form
if (isset($_POST['submit'])) {
//    debug biến $_POST
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    //khi thao tác với file, phải sử dụng biến $_FILES để xử lý,
//    chứ không thể sử dụng $_POST/$_GET
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
//    1Mb = 1024Kb = 1024x1024B;
    $name = $_POST['name'];
    //check validate
    if (empty($name)) {
        $error = "Name không được để trống";
    } else {
        //xử lý form
        //xử lý upload file lên thư mục
//        move_uploaded_file()
        $avatar_arr = $_FILES['avatar'];
        //trường hợp upload file bị lỗi vì lí do nào đó
//        thì báo lỗi
        if ($avatar_arr['error'] != 0) {
            $error = 'Không thể upload file vì lỗi gì đó';
        } else {
            //check validate với trường hợp file upload phải có định
//            dạng ảnh và dung lượng upload không vượt quá 2MB 2MegaByte

            //lấy ra đuôi file sử dụng hàm pathinfo trong PHP
            $extension = pathinfo($avatar_arr['name'], PATHINFO_EXTENSION);
//            print_r($extension);
//            die;

            //cần phải chuyển đổi đơn vị từ B -> MB
            $size = $avatar_arr['size'] / 1024 / 1024; //Mb
            //tạo 1 mảng quy định trước các định dạng file ảnh
            $arr_extension = ['png', 'jpg', 'jpeg', 'gif'];
            if (in_array($extension, $arr_extension) == FALSE) {
                $error = "Cần upload file dạng ảnh";
            } else if ($size > 0.01) { //0.01Mb ~ 10Kb
                $error = "Chỉ có thể upload file dung lượng  <= 2Mb";
            } else {
                //tạo 1 thư mục để lưu file vừa upload
                //phải sử dụng đường dẫn vật lý để lưu file
                $dir_uploads = __DIR__ . "/uploads";
//            print_r($dir_uploads);
                //kiểm tra nếu chưa tồn tại thư mục uploads
//            thì sẽ tạo mới bằng code
                if (file_exists($dir_uploads) == FALSE) {
                    mkdir($dir_uploads);
                }

                //chuyển file từ thư mục tạm sang thư mục upload
                //đặt tên file dựa theo giá trị ngẫu nhiên từ hàm time()
//            để đảm bảo tên file không bao giờ bị trùng
                $file_name = time() . $avatar_arr['name'];
                $tmp_name = $avatar_arr['tmp_name'];
                $destination = $dir_uploads . '/' . $file_name;
                $is_upload = move_uploaded_file($tmp_name, $destination);
                if ($is_upload) {
                    $result = "Upload file thành công";
                } else {
                    $error = "Không thể upload file vì lí do gì đó";
                }
            }
        }
    }
}
?>
<h3 style="color: red">
    <?php echo $error; ?>
</h3>
<h3 style="color: green">
    <?php echo $result; ?>
</h3>
<!--khi form có input file, thì bắt buộc phải thêm thuộc tính enctype-->
<!--method của form khi này bắt buộc phải là post-->
<form action="" method="post" enctype="multipart/form-data">
    Name: <input type="text" name="name" value=""/>
    <br/>
    Upload avatar
    <input type="file" name="avatar"/>
    <br/>
    <input type="submit" name="submit" value="Submit"/>
</form>