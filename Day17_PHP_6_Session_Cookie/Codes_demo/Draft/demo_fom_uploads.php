<?php
//debug
//echo "<pre>";
//print_r($_POST);
//print_r($_FILES);
//echo "</pre>";
$error = '';
$result = '';
if (isset($_POST['submit'])) {
    $fileArr = $_FILES['upload'];
    $fileError = $fileArr['error'];
    //trường hợp upload không thành công thì báo lỗi
    if ($fileError != 0) {
        $error = "Có lỗi gì đó xảy ra, không thể upload file";
    } else {
        //tạo thư mục để chứa file vừa upload
        $directoryUploads = __DIR__ . '/uploads';
        //kiểm tra xem đã tồn tại thư mục mà muốn tạo ra để
//        lưu các file upload hay chưa
        if (file_exists($directoryUploads) == FALSE) {
            mkdir($directoryUploads);
        }

        //move file vào thư mục upload mà bạn vừa tạo
        $tmpName = $fileArr['tmp_name'];
        $destination = $directoryUploads . '/' . $fileArr['name'];
        $isUploaded = move_uploaded_file($tmpName, $destination);
        if ($isUploaded == TRUE) {
            $result .= "Upload thành công: <br />";
            $result .= "Đường dẫn tuyệt đối file vừa upload: $destination <br />";
            $fileType = pathinfo($fileArr['name'], PATHINFO_EXTENSION);
            $result .= "Định dang của file: $fileType <br />";
            $sizeB = $fileArr['size'];
            $sizeKb = round($sizeB / 1024, 2);
            $sizeMb = round($sizeKb / 1024, 2);
            $result .= "Kích thước file upload: $sizeB B = $sizeKb Kb = $sizeMb Mb ";
            $fileName = $fileArr['name'];
            $result .= "<img src='uploads/$fileName' />";

        } else {
            $error = "Có lỗi xảy ra, có thể liên quan đến server";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Demo form upload</title>
</head>
<body>
<h3 style="color: red">
    <?php echo $error; ?>
</h3>
<h3 style="color: green">
    <?php echo $result; ?>
</h3>
<form action="" method="post" enctype="multipart/form-data">
    Chọn file upload
    <input type="file" name="upload"/>
    <br/>
    <input type="submit" name="submit" value="Show info"/>
</form>
</body>
</html>