<?php
session_start();
//File create.php
//Xứ lý và hiển thị form thêm mới
//nhúng file kết nối CSDL database.php để sử dụng $connection
require_once 'database.php';
$error = '';
$result = '';
//xử lý submit form
if (isset($_POST['submit'])) {
    echo "<pre>";
    print_r($_POST);
    print_r($_FILES);
    echo "</pre>";
    $title = $_POST['title'];

    //validate title ko đc để trống và file upload lên phải là ảnh
    if (empty($title)) {
        $error = 'Title ko đc để trống';
    } else if ($_FILES['avatar']['error'] == 0) {
        //điều kiện trên đã đảm bảo có file upload lên
        //xử lý validate phải là ảnh
        $extension = pathinfo($_FILES['avatar']['name'],
            PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        //khai báo các đuôi ảnh cho phép
        $extension_allows = ['png', 'jpg', 'jpeg', 'gif'];
        if (in_array($extension, $extension_allows) == FALSE) {
            $error = 'Phải upload file dạng ảnh';
        }
    }

    //xử lý lưu dữ liệu khi ko có lỗi validate tương đương
    // biến $error đang rỗng
    if (empty($error)) {
        $filename = '';
        //xử lý upload nếu có ảnh upload lên
        if ($_FILES['avatar']['error'] == 0) {
            $dir_uploads = __DIR__ . '/uploads';
            //nếu chưa tồn tại thư mục upload thì tạo mới
            if (file_exists($dir_uploads) == FALSE) {
                mkdir($dir_uploads);
            }
            //tạo tên file mang tính duy nhất
            //để tránh trường hợp upload file cùng tên
            $filename = time() . '-' . $_FILES['avatar']['name'];
            move_uploaded_file($_FILES['avatar']['tmp_name'],
                $dir_uploads . '/' . $filename);
        }

        //xử lý lưu dữ liệu vào CSDL
        //cbi câu truy vấn
        $obj_insert = $connection
            ->prepare("INSERT INTO books(`title`, `avatar`)
            VALUES (:title, :avatar)");

        //gán giá trị cho các tham số dạng placeholder nếu có trong
//        câu truy vấn
        $arr_insert = [
            ":title" => $title,
            ":avatar" => $filename
        ];

        //thực thi câu truy vấn sau khi gán giá trị cho placeholder
        $is_insert = $obj_insert->execute($arr_insert);
        if ($is_insert) {
            $_SESSION['success'] = 'Insert thành công';
        } else {
            $_SESSION['error'] = 'Insert thất bại';
        }

        //chuyển hướng về trang liệt kê sách
        header('Location: index.php');
        exit();
    }
}
?>
<h3 style="color: red">
    <?php echo $error; ?>
</h3>
<form action="" method="post" enctype="multipart/form-data">
    <div>
        Title:
        <input type="text" value="" name="title" />
    </div>
    <div>
        Avatar:
        <input type="file" name="avatar" />
    </div>
    <div>
        <input type="submit" value="Save" name="submit" />
        <input type="reset" value="Reset" name="reset" />
    </div>
<!--    <input type="checkbox" value="0" name="jobs[]" />Job1-->
<!--    <input type="checkbox" value="1" name="jobs[]" />Job2-->
<!--    <input type="checkbox" value="2" name="jobs[]" />Job3-->

</form>
