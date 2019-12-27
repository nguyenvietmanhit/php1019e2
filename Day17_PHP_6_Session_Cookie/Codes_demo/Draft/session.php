<?php
session_start();
//thường khai báo session ở đầu mỗi file
//để tránh lỗi trong 1 số trường hợp
//SESSION
//cần khởi tạo session trước khi sử dụng

echo '<pre>';
//thêm phần tử mới cho session
$_SESSION['login'] = 'Manh';
$_SESSION['key'] = [
    0 => 1,
    'a' => 'b'
];


//lấy giá trị phần tử\
echo $_SESSION['login'];

//sửa phần tử
$_SESSION['login'] = 'Manh edit';

//xóa phần tử
unset($_SESSION['login']);


//session chứa giỏ hàng đơn giản có dạng như sau
$_SESSION['cart'] = [
    0 => [
        'name' => 'Iphone',
        'price' => 123,
        'category_id' => 1
    ],
    1 => [
        'name' => 'Samsung',
        'price' => 456,
        'category_id' => 2
    ],
    2 => [
        'name' => 'HTC',
        'price' => 789,
        'category_id' => 2
    ],
];
//lệnh session_destroy sẽ unset tất cả các session hiện tại
//sẽ được áp dụng với các nơi khác gọi nó
//thường sử dụng với trường hợp logout khỏi hệ thống
//session_destroy();
print_r($_SESSION);

header("Location: cookie.php");