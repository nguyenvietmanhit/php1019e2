<?php
$error = '';
$result = '';
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    $text = $_POST['text'];
    $message = $_POST['message'];
    $checkbox = $_POST['checkbox'];
    $radio = $_POST['radio'];
    $select = $_POST['select'];
    if (isset($_POST['submit'])){
        if (empty($_POST['text'])){
            $error = "Text không để trống";
        }
        else if (!isset($_POST['checkbox'])){
            $error = "Checkbox cần phải chọn";
        }
        else if (empty($_POST['message'])){
            $error = "Textarea không được để trống";
        }
        else if (!isset($_POST['radio'])){
            $error = "Radio button không được để trống";
        }
        else if ($_FILES['avatar']['error']==0){
            //validate file upload có đinh dạng ảnh
            $extension = pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
            $arr_image_extension = ['jpg','jpeg','png','gif'];
            if (!in_array($extension,$arr_image_extension)){
                $error = "Cần upload đúng định dạng ảnh";
            }
            // xử lý upload file . tạo thư mục upload
            else{
                $dir_uploads = __DIR__.'/uploads';
                if (!file_exists($dir_uploads)){
                    mkdir($dir_uploads);
                }
                //set lại file để đảm bảo file không bị trùng tên dù local có giống nhau
                $file_name = time().'-'.$_FILES['avatar']['name'];
                //chuyển file thừ thư mục tạm sang thư mục đã tạo
                $is_uploads = move_uploaded_file($_FILES['avatar']['tmp_name'],$dir_uploads.'/'.$file_name);
                if ($is_uploads){
                    $result .= "Text: $text<br>";
                    $result .= "Checkbox:";
                    if (isset($_POST['checkbox'])) {
                        foreach($_POST['checkbox'] as $value) {
                            //Xử lý các phần tử được chọn
                            $result .= $value."<br/>";
                        }
                    }
                    $result .= "Textarea : $message<br>";
                    $result .= "Radio: $radio<br>";
                    $result .= "Select: $select<br>";
                    $result .= "Upload file: ";
                    $result .= "<img src='uploads/$file_name', height='80px'>";
                    $result .= "<br>";
                }
                else{
                    $error = "Không để upload file";
                }
            }
        }
        else{
            $error = "Có thể lỗi gì đó không thể upload file";
        }
    }
?>

<h4 style="color: red">
    <?php echo $error ?>
</h4>
<h4 style="color: #003f54">
    <?php echo $result ?>
</h4>

<!DOCTYPE HTML>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <style type="text/css">
        form{
            margin:0px 50px;
            padding: 30px;

        }
        .form-check-label{
            padding-right: 50px;
        }

    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Text</label>
        <input type="text" name="text" value="<?php echo isset($_POST['text'])? $_POST['text']:"" ?>" placeholder="Placeholder" class="form-control">
        <br>
        <label>Checkbox</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Checkbox1" name="checkbox[]">
            <label class="form-check-label" >
                Checbox1
            </label>
            <br>
            <input class="form-check-input" type="checkbox" value="Checkbox2" name="checkbox[]">
            <label class="form-check-label" >
                Checbox2
            </label>
            <br>
            <input class="form-check-input" type="checkbox" value="Checkbox3" name="checkbox[]">
            <label class="form-check-label" >
                Checbox3
            </label>
        </div>

        <label>Textarea</label>
        <textarea cols="30" rows="4" class="form-control" name="message"></textarea>
        <br>
        <label>Radio button</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="radio" value="yep" checked>
            <label class="form-check-label">
                yep
            </label>
            <input class="form-check-input" type="radio" name="radio" value="nope" checked>
            <label class="form-check-label">
                nope
            </label>
            <input class="form-check-input" type="radio" name="radio" value="none" checked>
            <label class="form-check-label">
                none
            </label>
        </div>

        <label>Select</label>
        <select name="select" class="form-control">
            <option value="Option 1">Option 1</option>
            <option value="Option 2">Option 2</option>
            <option value="Option 3">Option 3</option>
        </select>
        <br>
        <label>Upload files</label>
        <input type="file" name="avatar" value="" class="form-control-file">
        <br>
        <input type="submit" name="submit" value="Submit" class="btn btn-secondary btn-lg btn-block">

    </form>
</body>
</html>

