<?php
$error = '';
$result = '';
if (isset($_POST['upload'])){
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    if ($_FILES['avatar']['error']==0){
        //validate file upload chi cho phép định dạng ảnh
        $extension = pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
        $extension = strtolower($extension); // chuyển hoa thành thường
        $arr_image_extension = ['jpg','jpeg','png','gif'];

        if ( !in_array($extension, $arr_image_extension)){
            $error = "Cần upload file có định dạng ảnh";
        }
        //validate vs size > 1MB
        else if ($_FILES['avatar']['size'] > 1 * 1024 * 1024 ){
            $error = "Cần upload file dung lượng tối đa là 1MB";
        }
        else{
            //xư lý upload file
            //tạo thư mục upload
            $dir_uploads = __DIR__.'/uploads';
            //check thu mục tồn tại chưa nếu chưa tạo mới
            if (file_exists($dir_uploads)==false){
                mkdir($dir_uploads);
            }
            //set lại file để đảm bảo file không bị trùng tên file dù local có giống nhau
            $file_name = time(). '-' . $_FILES['avatar']['name'];
            //chuyển file từ thư mục tạm sang thư mục đã tạo
            $is_upload = move_uploaded_file($_FILES['avatar']['tmp_name'],$dir_uploads. '/'. $file_name);
            if ($is_upload){
                $result .= "Avatar của bạn:";
                $result .= "<img src = 'uploads/$file_name' height='80px'/>";
                $result .= "<br/>";
                $result .= "Tên file: $file_name<br>";
                $result .= "Định dạng file: $extension";
                $result .=  " Đường dẫn tuyệt đối file: $dir_uploads . '/'.$file_name .<br/> ";

                $file_size = round($_FILES['avatar']['size']/1024/1024,1);
                $result .= "Kích thước file(MB): ".$file_size;
            }
            else{
                $error = "Không thể upload file";
            }
        }
    }
    else{
        $error = "có lỗi gì đó khi upload file";
    }
}
?>
<h4 style="color: #0000bf">
    <?php echo $error ?>
</h4>
<h4 style="color: #003f54">
    <?php echo $result ?>
</h4>

<form action="" method="post" enctype="multipart/form-data">
    <b>Select a file to upload</b>
    <br>
    <input type="file" name="avatar"/>
    <br>
    Only jpg,jpeg,png and gif file with maximum size of 1 MB is allowed
    <br>
    <input type="submit" name="upload" value="Upload" />
</form>
