<?php
//BIẾN
$name; //khai báo biến
$age = 14; //khai báo biến và gán giá trị
$address = "Ha Noi";
//Quy tắc đặt tên biến
$number1 = 3;

//$1name;
//$name^; //không hợp lệ
$___name; //hợp lệ

$name;
$NAME;

$age = 29;
echo "Tuổi của bạn là: " . $age;

//Các kiểu dữ liệu của biến
//1 - Kiểu số nguyên - Integer
$age = 123.232;
$number1 = -12;
var_dump(is_int($age));

//2 - Kiểu số thực float/double
$number2 = 12.3;
var_dump(is_float($number2));

//3 Kiểu string
$string = "Hello";
$string1 = 'Hello'; //true

$age = 14;
//echo "Tuổi của tôi là: " . $age;
echo "Tuổi của tôi là: $age";
echo "<br />";
echo 'Tuổi của tôi là: $age';
echo "Hello 'Manh'";
var_dump(is_string($string));

//4 - Kiểu boolean
$is_true = true;
$is_true2 = TRUE;
$is_true3 = True;
$is_false = false; //FALSE, False ...
var_dump(is_bool($is_true));

//5 - null
$null = null; //Null, NULL
var_dump(is_null($null));

//6 - Array
$arr1 = array(123, "hello", false, null, array());
$arr2 = [123, 'hello', true, null, []]; //sử dụng từ phiên bản
//php 5.4 trở lên
var_dump(is_array($arr1));
//khi làm việc với 1 biến có kiểu dữ liệu cấu trúc như mảng
//và đối tượng, có thể sử dụng hàm print_r để xem cấu trúc
//cho dễ nhìn
//echo "MẢng hiện tại là: " . $arr1;
echo "<pre>";
print_r($arr1);
echo "</pre>";

// 7 - Object
class Student
{

}

$obj = new Student();
var_dump(is_object($obj));

// 3 - Ép kiểu dữ liệu
$number1 = 123;
$number1 = (string)$number1;
var_dump(is_string($number1));

//4 - Hằng
//có 2 cách khai báo
//nên dùng từ khóa const để khai báo hằng
const PI = 3.14;
define('AGE', 15);
//gọi hằng
echo "Hằng số PI là " . PI;
echo "Hằng số AGE là: " . AGE;
//cố tính gán giá trị khác cho hằng sẽ báo lỗi
//PI = 122343;
echo "Số dòng hiện tại của đoạn code này là: " . __LINE__;
echo "<br />";
echo "Đường dẫn tuyệt đối/vật lý đến file hiện tại là: " . __FILE__;
echo "<br />";
echo "Đường dẫn tuyệt đối/vật lý đến
 thư mục cha gần file hiện tại nhất là : " . __DIR__;

//5 - Hàm
//- Hàm có sẵn của PHP
//echo, var_dump, print_r, is_int ...
//- Hàm tự định nghĩa
function displayName()
{
    echo 'Hello, Manh';
}

//sau khi khai báo ph ải gọi hàm
displayName();

//Hàm có tham số
//    function sum($number1, $number2) {
//        $sum = $number1 + $number2;
//        echo "Tổng 2 số $number1 + $number2 = $sum";
//    }
//
//    sum(1, 2);

function sum($number1, $number2)
{
    $sum = $number1 + $number2;

    return $sum;
    //đoạn code sau từ kháo return sẽ không bao giờ
//          được thực thi
    echo "abcdsadsa";
}

$sum = sum(3, 5);
echo "Tổng là: $sum";

//hàm có tham số được khởi tạo giá trị mặc định
function displayName1($name = 'Manh')
{
    echo $name;
}

//gọi hàm
displayName1();

//truyền tham số theo kiểu tham trị và tham chiếu
//truyền thamn trị là tạo ra 1 bản sao của biến, và thao tác trên
//bản sao đó, còn biến ban đầu vẫn giữ nguyên ko hề thay đổi
echo "<br/>";
$number = 15;
echo "Giá trị của biến number trước khi gọi hàm là: $number"; //15
function changeNumber($number)
{
    $number = 0;
    echo "<br/>";
    echo "Giá trị của biến number bên trong hàm là: $number"; //0
}
changeNumber($number);
echo "<br/>";
echo "Giá trị của biến number sau khi gọi hàm là: $number "; //15 //0

$age = 5;
echo "<br />";
echo "Biến age trước khi gọi hàm là: $age"; //5
function changeAge(&$age) {
    $age = 0;
    echo "<br />";
    echo "Biến age bên trong hàm đang là: $age"; //0
}
changeAge($age);
echo "<br />";
echo "Biến age sau khi gọi hàm đang có giá trị là: $age";//5 //0
//truyền tham chiếu: làm việc trên bản gốc, nên giá trị sẽ
//bị thay đổi khi ra khỏi hàm

//6 - Hàm include, require, include_once, require_once
//nhúng file import.php vào file hiện tại
//require 'importdhsajkhdsajkdsak.php';
//require 'import.php';
include_once 'import.php';
include_once 'import.php';
include_once 'import.php';
include_once 'import.php';
//thông thường nên dùng require_once để nhúng file
//, để đảm bảo được tính duy nhất và ko thực thi code
//phía sau nếu như file ko tồn tại

echo "<h5>Nội dung sau các lệnh import file</h5>";
?>