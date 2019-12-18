<?php

$arr_1 = array(1, "abc", true, null, array());

//sẽ sử dụng [] để khai báo mảng
$arr_2 = [123, "def", false, null, []];

//với các kiểu dữ liệu nguyên thủy là string, integet/float
//, boolean thì sử dụng echo để hiển thị như bình thường
$string = "Hello 123";
echo $string;

echo $arr_2;
//với kiểu dữ liệu có cấu trúc như mảng hoặc đối tượng,
// thì cần sử dụng
//cách thức khác để hiển thị ra cấu trúc của biến đó
var_dump($arr_2);
echo "<br />";

//đấy là cách hay dùng để debug mảng
echo "<pre>";
print_r($arr_2);
echo "</pre>";

//lấy ra giá trị của phần tử có vị trí = 1 từ mảng $arr_2
$value = $arr_2[1];
echo $value; //def

// Vòng lặp foreach
//sử dụng vòng lặp for để hiển thị ra các giá trị của 1 mảng
$arr_for = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
//echo $arr_for[0]; //$arr_for[1] $arr_for[2] ...
$count_arr_for = count($arr_for); // 10
for ($key = 0; $key < $count_arr_for; $key++) {
    echo $arr_for[$key];
}

//sử dụng vòng lặp foreach để lặp mảng
//khi thao tác với mảng, luôn sử dụng foreach để lặp mảng
foreach ($arr_for AS $key => $value) {
    echo "Vị trí $key đang có giá trị là: " . $value;
    echo " <br />";
}

$name_arr = ['Name 1', 'Name 2', 'Name 3'];
foreach ($name_arr AS $name) {
    echo "$name <br />";
}

//Phân loại mảng trong PHP
//1 - Mảng tuần tự - Mảng số nguyên
//Mảng có key ở dạng số
$arr = [1, 2, 'abc', '456'];
$arr_1 = [
    0 => 123,
    1 => 2,
    3 => "abcdef",
    4 => false
];
echo "<pre>";
print_r($arr_1);
echo "</pre>";

//2 - MẢng kết hợp
//key có thể ở dạng string
$arr_3 = [
    'name' => 'Mạnh',
    'age' => 19,
    2 => 'abc',
    'is_male' => true
];
echo "<pre>";
print_r($arr_3);
echo "</pre>";

echo "Age = " . $arr_3['age'];
echo "Is male = " . $arr_3['is_male'];
echo "Giá trị của phần tử đang có key = 2 là: " . $arr_3[2];

foreach ($arr_3 AS $key => $value) {
    echo "Ví trí $key hiện tại đạng có giá trị là $value";
    echo "<br />";
}

//3 - Mảng đa chiều
//ví dụ về mảng 2 chiều
$arr_4 = [
    'name' => 'Mạnh',
    'age' => [
        0 => 15,
        1 => 29
    ]
];

echo "<pre>";
print_r($arr_4);
echo "</pre>";

//Manh
//muốn lấy ra giá trị = 29 từ mảng $arr_4
echo $arr_4['age'][1]; //29
echo $arr_4['age'][0]; //29

$arr_4 = [
    'name' => 'Mạnh',
    'age' => [
        0 => 15,
        1 => 29
    ]
];
//mảng hiện tại đang có 2 key là 'name', 'age'
foreach ($arr_4 AS $key => $value) {
    print_r($value);
    echo "<br />";
}
//liệt kê các key hiện có của mảng $arr_5 : student và class
$arr_5 = [
    'student' => [
        'room' => [
            'id' => 123,
            'floor' => 3
        ],
        'info' => [
            'name' => 'Mạnh',
            'address' => 'Hà Nội'
        ]
    ],
    'class' => 'php1019e2'
];
//lấy giá trị bằng 3 từ mảng trên
echo $arr_5['student']['room']['floor']; //3
//lấy giá trị của key là 'address' từ mảng trên
echo $arr_5['student']['info']['address']; //Hà nội
//sử dụng hàm print_r với mảng có key là room
print_r($arr_5['student']['room']);


//Chữa thực hành 1
$arrs = [12, 50, 60, 90, 12, 25, 60];
//$number1 = $arrs[0];
//$number2 = $arrs[1];
//$number3 = $arrs[2];
$sum = 0;
$multiple = 1;
foreach ($arrs AS $value) {
    $sum += $value;
    $multiple *= $value;
}
echo "Tổng = $sum";
echo "Tích = $multiple";

//Chữa thực hành 2
$arrs = ['đỏ', 'xanh', 'cam', 'trắng'];

$value1 = $arrs[0]; //đỏ
$value2 = $arrs[1]; //xanh
$value3 = $arrs[2]; //cam
$value4 = $arrs[3]; //trắng

$string = "Màu <span class='red'>$value1</span> là màu yêu thích của Anh,
 <span class='red'>$value4</span> là màu yêu thích của Sơn,
  <span class='red'>$value3</span> là màu yêu thích của Thắng,
  còn màu yêu thích của tôi là màu <span class='red'>$value2</span>";
echo $string;
?>
<style type="text/css">
    .red {
        color: red;
    }
</style>

<?php
//chữa thực hành 3
$arrs = ['PHP', 'HTML', 'CSS', 'JS'];
?>

<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>Tên khóa học</th>
    </tr>
    <?php foreach($arrs AS $value): ?>
    <tr>
        <td>
            <?php echo $value; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
//Thực hành 1 số hàm có sẵn thao tác với mảng
$arr = [1, 2, 3, 4];
//hàm tính tổng
echo array_sum($arr); //10

//kiểm tra key có tồn tại trong mảng hay ko
$arr = [
    'name' => 'Manh',
    'age' => 29
];
var_dump(array_key_exists('name', $arr));
var_dump(array_key_exists('namedsadasdsa', $arr));

//kiểm tra value có tồn tại trong mảng hay ko
$arr = ['a', 'b', 1];
var_dump(array_search('a', $arr)); //true
var_dump(array_search('adsadsa', $arr)); //false

//hàm loại bỏ phần tử trùng lặp trong mảng
$arr = [1, 5, 3, 5, 3, 2];
$arr = array_unique($arr);
echo "<pre>";
print_r($arr); //1 5 3 2
echo "</pre>";

//tính số phần tử
echo count($arr); //4

//lấy ra phần tử cuối cùng của mảng
echo end($arr); //2

//kiểm tra 1 biến có phải là kiểu dữ liệu mảng hay ko
is_array($arr);

//lấy ra phần tử đầu tiên của mảng
echo reset($arr);
?>