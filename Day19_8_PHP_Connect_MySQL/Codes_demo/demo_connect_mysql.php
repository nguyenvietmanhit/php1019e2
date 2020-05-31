<?php
//địa chỉ tới DB
const DB_HOST = 'localhost'; //127.0.0.1
//username kết nối vào DB,
//đây là tài khoản mặc định mà khi cài XAMPP đã tạo sẵn
const DB_USERNAME = 'root';
//mật khẩu kết nói vào DB,
// đây là password mặc định mà khi cài XAMPP đã tạo sẵn
const DB_PASSWORD = '';
//tên DB muốn kết nối
const DB_NAME = 'db_19';
//cổng kết nối vào DB
const DB_PORT = 3306;

//Thực hiện kết nối tới CSDL Mysql sử dụng PHP
$connection = mysqli_connect(DB_HOST, DB_USERNAME,
    DB_PASSWORD, DB_NAME, DB_PORT);

//nếu kết nối không thành công thì hiển thị thông báo lỗi
if (!$connection) {
    die("Kết nối thất bại. Chi tiết lỗi: " . mysqli_connect_error());
}

echo "Kết nối tới CSDL" . DB_NAME . " thành công";

//với trương hợp lưu bị lỗi font, sử dụng hàm sau
mysqli_query($connection, "SET NAMES 'utf8'");
//Dùng PHP để thêm dữ liệu vào bảng students
//sử dụng dấu huyền để bao các trường, để tránh trường hợp tên trường
//trùng với từ khóa trong SQL - vd: name
$sql_insert = "INSERT INTO students(`name`, `age`) 
                VALUES('Manh', 29), ('ABC', 23)";

//thực thi câu truy vấn vừa tạo
//với truy vấn insert, update, delete thì hàm mysqli_query sẽ trả về
//giá trị boolean
//với truy vấn select -> hàm sẽ trả về 1 đối tượng, ko phải kiểu boolean
$is_insert = mysqli_query($connection, $sql_insert);
echo "<br />";
if ($is_insert) {
    echo "Insert thành công";
} else {
    echo "Insert thất bại";
}

//Chức năng Update
//update tên = New Name cho các bản ghi mà có id < 5
$sql_update = "UPDATE students SET `name` = 'New Name' WHERE id > 5";
$is_update = mysqli_query($connection, $sql_update);
if ($is_update) {
    echo "Update thành công";
} else {
    //trong trường hợp update thất bại, thường sẽ ko báo lỗi cụ thể là
//    gì, thì nên copy câu truy vấn chạy trực tiếp trong tab SQL của
//    PHPMyadmin để xem có bị lỗi ko
    echo "Update thất bại";
}

//Chức năng Xóa
//xóa các bản ghi mà có id > 8
$sql_delete = "DELETE FROM students WHERE id > 8";
$is_delete = mysqli_query($connection, $sql_delete);
if ($is_delete) {
    echo "Xóa các bản ghi có id > 8 thành công";
} else {
    echo "Xóa các bản ghi có id > 8 thất bại";
}
//Chức năng liệt kê
//láy ra thông tin tất cả dữ liệu trong bảng students
$sql_select = "SELECT * FROM students";
$results = mysqli_query($connection, $sql_select);
//kiểm tra xem có bản ghi nào trả về từ câu truy vấn select hay ko
if (mysqli_num_rows($results) > 0) {
    //lấy ra được dữ liệu mong muốn,
//    cần chú ý phải truyền hằng MYSQLI_ASSOS để có thể trả về 1 mảng
//    kết hợp
    $students = mysqli_fetch_all($results, MYSQLI_ASSOC);
    //lặp và hiển thị ra các thông tin
    foreach ($students as $student) {
        //hiển thị giá trị 1 mảng trong dấu nháy kép
        // sử dụng cặp ngoặc {}
        echo "Tên: {$student['name']}";
        echo "<br />";
        echo "Tuổi: {$student['age']}";
        echo "<br />";
//        $created_at = $student['created_at'];
$created_at = date('d-m-Y H:i:s', strtotime($student['created_at']));
        echo "NGày tạo: $created_at";
        echo "<br />";
    }
//    crud
}


//lấy 1 bản ghi
$sql_select_one = "SELECT * FROM students WHERE id = 1";
$result = mysqli_query($connection, $sql_select_one);
$student = mysqli_fetch_assoc($result);
echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
print_r($student);
echo "</pre>";
//die;

$sql_count = "SELECT COUNT(id) AS count_id, COUNT(name) AS count_name FROM students";
$result_count = mysqli_query($connection, $sql_count);
$count = mysqli_fetch_assoc($result_count);
echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
print_r($count);
echo "</pre>";
die;
?>