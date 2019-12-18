<?php
//code php ở đây
echo "<h1>PHP - Khai báo Biến</h1>";
echo "<br >";
$name;
$age = 11;
$name1 = 'Manh';
$name2 = "ABC";
echo "Tên của bạn là: " . $name1;
//$11%@#@#@2121a;
$abc;
$ABC;

echo "<h1>PHP - Các kiểu dữ liệu của biến</h1>";
echo "<br >";
//1 - Kiểu int
$age = 1234; //~-2 tỉ -> 2 tỉ
$navigate = -345;
echo "Kiểu dữ liệu của biến age là: ";
//is_int($age);
var_dump($age);

//2 - Kiểu string
$name = "String 1";
$name1 = 'String 2';
echo "<br />";
echo "Biến name có kiểu dữ liệu: ";
//is_string($name);
var_dump($name);

//3 Float/double - kiểu số thực
$number1 = 3.5;
echo "<br />";
echo "Biến number1 có kiểu dữ liệu: ";
var_dump($number1);
//echo is_float($number1);
//echo is_double($number1);

//4 - Boolean - true/false
//với javascript thì chỉ nhận 2 giá trị duy nhất
//là true và false viết thường
//đối với PHP thì giá trị true/false là ko phân biệt hoa thường
$isTrue = true;
$isFalse = false;
echo "<br />";
echo "Biến isTrue có giá trị là: ";
//is_bool($isTrue);
var_dump($isTrue);

//5 - NULL
//có 1 giá trị duy nhất là null
$varNull = null;
echo "<br />";
echo "Biến varNull có giá trị là: ";
var_dump($varNull);
//is_null($varNull);
//$varNull = Null;

//6 - Array - Mảng
$arr = array(1, 3.5, 'string', true, null, array());
$arr1 = [1, 2.3, true, [1, 2, 3]];
//xem cấu trúc mảng
echo "<br />";
echo "Cấu trúc của mảng ar1";
var_dump($arr1);
//khi hiển thị kiểu dữ liệu dạng có cấu trúc như mảng, object
//thì nên sử dụng thẻ <pre> kết hợp với hàm print_r
echo "<pre>";
print_r($arr1);
echo "</pre>";
//is_array($arr1);

//7 - Object - Kiểu đối tượng
class Person
{

}

$person = new Person();
is_object($person);
print_r($person);


echo "<h1>Ép kiểu dữ liệu</h1>";
//các từ khóa ép kiểu cho phép trong PHP
//int, integer, bool, boolean, float,
//double, real, string, array, object
$var = 12;
echo 'Kiểu dữ liệu ban đầu của biến var là: ';
var_dump($var);
$var = (float)$var;
echo "<br />";
echo 'Kiểu dữ liệu sau khi ép sang float của biến var là: ';
var_dump($var);

//HẰNG
echo "<h1>Hằng</h1>";
//khai báo hằng trong php
//cách 1
define('MAX_SIZE', 14);
//cách 2
const PI = 3.14;

//hiển thị hằng
//cách 1
echo "Hằng MAX_SIZE đang có giá trị là: " . constant('MAX_SIZE');
//cách 2
echo "HẰNG PI đang có giá trị là: " . PI;

//cố tình gán lại giá trị khác cho hằng thì sẽ báo lỗi cú pháp
//và chết chương trình của bạn
//PI = 5;

//1 số hằng định nghĩa sẵn trong PHP
echo "<br />";
echo "Số dòng hiện tại đang gọi hằng __LINE__ là: " . __LINE__;
echo "Đường dẫn tuyệt đối đang gọi hằng __FILE__ là: " . __FILE__;

echo "<h1>Hàm</h1>";
//HÀM
//1 - Hàm có sẵn của php
//echo, var_dump, constant, print_r ...

//2 - Hàm tự định nghĩa

//hàm không có tham số, không có từ khóa return
function displayInfo() {
    echo "<h5>Text trong hàm</h5>";
}

displayInfo();

//hàm có tham số
function displayName($name) {
    //việc hiển thị giá trị biến ngay trong chuỗi thì chỉ áp
//    dụng với dấu nháy kép
    echo "<br />";
    echo "Hello, $name";
    echo "<br />";
    echo 'Hello, $name';
//    echo "Hello, " . $name;
}

displayName('Manh');
displayName('An');

//hàm có tham số được khởi tạo mặc định
function displayAge($age = 15) {
    echo "<br />";
    echo "Tuổi của bạn là: $age";

//    return null;
}

//is_int
displayAge();
//hàm có giá trị trả về, sử dụng từ khóa return
function sum($number1, $number2) {
    $sum = $number1 + $number2;
//    $sum = 1 + 2 = 3
    return $sum;
    echo 'Lệnh sau return sẽ không được thực thi';
}

$sum = sum(1, 2); //3
echo "Tổng của 2 số là $sum";

//hàm truyền tham số theo kiểu tham chiếu và tham trị

//truyền tham trị
$varValue = 1;
echo "<br />";
echo "Biến varValue ban đầu đang có giá trị là $varValue";
function changeVarValue($varValue) {
    $varValue = 3;
    echo "<br />";
    echo "Biến varValue bên trong hàm đang có giá trị là $varValue";
}
changeVarValue($varValue);
echo "<br />";
echo "Biến varValue sau khi thay đổi trong hàm có giá trị là $varValue";

//truyền tham chiếu
//sử dụng ký tự & trước tên tham số truyền vào hàm
$varRerfer = 5;
echo "<p>Biến varRefer ban đầu đang có giá trị là $varRerfer</p>";
function changeVarRerfer(&$varRerfer) {
    $varRerfer = 12;
    echo "<p>Biến varReder bên trong hàm đang có giá trị là $varRerfer</p>";
}
changeVarRerfer($varRerfer);
echo "<p>Biến varRefer sau khi gọi hàm đang có giá trị là $varRerfer</p>";

echo "<h1>Tìm hiểu các hàm import file trong PHP</h1>";
echo "<h2>include, include_once, require, require_once</h2>";

include 'import.php';
//require 'import.php';
include_once 'import.php';

//include 'abcdefdsadsadas.php';

require "dasdsadasdasdsa.đasa";

//nên sử dụng require hoặc require_once để đảm bảo
//chương trình sẽ dừng khi import 1 file không tồn tại
echo 'Text chạy sau cùng file của bạn';

?>
