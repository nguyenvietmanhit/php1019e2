<?php
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'php39';
const DB_PORT = 3306;

//B1 - KHởi tạo kết nối từ PHP đến Mysql sử dụng extension MySQLi
$connection = mysqli_connect
(DB_HOST, DB_USERNAME, DB_PASSWORD,
    DB_NAME, DB_PORT);

//echo '<pre>';
//print_r($connection);
if (!$connection) {
    die("Không thể kết nối CSDL 
    " . DB_NAME . ". Lỗi: " . mysqli_connect_error());
}

echo "Đã kết nối thành công tới CSDL " . DB_NAME;

//B2 - Thực hiện truy vấn dữ liệu
//- Thêm dữ liệu vào bảng users
$queryInsert = "
INSERT INTO 
users (username, description, age, birthday)
values('nvmanh', 'This is nvmanh', 12, '1990-01-05 12:00:00')
";
$isInsert = mysqli_query($connection, $queryInsert);
if ($isInsert) {
    echo "<br />";
    echo "Insert dữ liệu thành công";
    echo "<br />";
}
else {
    echo "<br />";
    echo "Insert dữ liệu thất bại";
    echo "<br />";
}

//- Sửa dữ liệu, luôn phải sử dụng điều kiện where
//với trường hợp update dể tránh update toàn bộ dữ liệu trong bảng
$queryUpdate = "
UPDATE users SET username = 'new_username' WHERE id = 1
";
$isUpdate = mysqli_query($connection, $queryUpdate);
if ($isUpdate) {
    echo "<p>Update user có id = 1 thành công!</p>";
}
else {
    echo "<p>Update user có id = 1 thất bại!</p>";
}

//- Xóa dữ liệu, luôn cần điều kiện WHERE để tránh xóa toàn bộ
//dữ liệu trong bảng
$queryDelete = "DELETE FROM users WHERE id = 1";
$isDelete = mysqli_query($connection, $queryDelete);
if ($isDelete) {
    echo "<p>Xóa user có id = 1 thành công!</p>";
}
else {
    echo "<p>Xóa user có id = 1 thất bại!</p>";
}

// lấy dữ liệu, với trường hợp này sẽ trả về 1 mảng,
//ko phải là true/false như 3 trường hợp insert, delete, update
$querySelect = "SELECT * FROM users LIMIT 5";
$results = mysqli_query($connection, $querySelect);
//echo "<pre>";
//print_r($results);
//nếu có bản ghỉ trả về thì mới thực hiện thao tác
if (mysqli_num_rows($results) > 0) {
    $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
//    echo "<pre>";
//print_r($users);
    foreach ($users as $user) {
        echo "ID: {$user['id']} <br />";
        echo "Username: {$user['username']} <br />";
        echo "Description: {$user['description']} <br />";
        echo "Age: {$user['age']} <br />";
        echo "Birthday: {$user['birthday']} <br />";
        echo "Created_at: {$user['created_at']} <br />";
        echo "<hr />";
    }
}