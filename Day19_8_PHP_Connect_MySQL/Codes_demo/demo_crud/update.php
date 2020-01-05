<?php
session_start();
//cập nhật 1 danh mục đã có
require_once 'config.php';
//lấy ra thông tin danh mục dựa vào id truyền từ trình duyệt
if (isset($_GET['id'])) {
    $id = $_GET['id'];
//    check validate
    if (!is_numeric($id)) {
        $_SESSION['error'] = "Cần phải truyền id là số";
        header("Location: index.php");
        exit();
    }

    //truy vấn lấy ra thông tin của danh mục từ id bắt được
    $querySelect = "SELECT * FROM categories WHERE id = $id";
    $results = mysqli_query($connection, $querySelect);
    $category = [];
    if (mysqli_num_rows($results) > 0) {
        $categoryArr = mysqli_fetch_all($results, MYSQLI_ASSOC);
        $category = $categoryArr[0];
    }
}

//lặp lại thao tác xử lý lưu lại dữ liệu khi submit form
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    //tạo truy vấn update
    $queryUpdate = "UPDATE categories
    set `name` = '$name' WHERE id = {$category['id']}";
    $isUpdate = mysqli_query($connection, $queryUpdate);
    if ($isUpdate) {
        $_SESSION['success'] = 'Update thành công';
        header("Location: index.php");
        exit();
    }
    else {
        //
    }
}
?>
<form action="" method="post">
    <h5>
        Cập nhật danh mục với id = <?php echo $category['id']?>
    </h5>
    Name :
    <input type="text" name="name"
           value="<?php echo $category['name']?>" />
    <br />
    <br />
    <input type="submit" name="submit" value="Cập nhật" />
</form>
