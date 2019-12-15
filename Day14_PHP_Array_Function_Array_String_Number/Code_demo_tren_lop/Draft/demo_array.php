<?php
//KHÁI NIỆM
//khai báo khi ko dùng mảng
$staff1 = "Nhân viên 1";
$staff2 = "Nhân viên 2";
$staff3 = "Nhân viên 3";
$staff4 = "Nhân viên 4";
$staff5 = "Nhân viên 5";
//khai báo dùng mảng
$arrStaff1 = array('Nhân viên 1', 'Nhân viên 2', 'Nhân viên 3', 'Nhân viên 4', 'Nhân viên 5');
$arrStaff2 = ['Nhân viên 1', 'Nhân viên 2', 'Nhân viên 3', 'Nhân viên 4', 'Nhân viên 5'];
$arr3 = [
    'string1',
    1234,
    true,
    null,
    [1, 2, 3, 4],
    new ArrayObject()
];

var_dump($arr3);
echo "<pre>";
print_r($arr3);
echo "</pre>";

// VÒNG LẶP FOREACH
//demo vòng lặp for để hiển thị các giá trị của mang
$arrDemo = [123, 'string123', -123, TRUE];
//với giá trị 123 thì key = 0, value = 123
for ($i = 0; $i < count($arrDemo); $i++) {
    echo "Phần tử có key = $i có giá trị là: " . $arrDemo[$i];
    echo "<br />";
}

//sử dụng vòng lặp foreach, cú pháp đầy đủ cả key và value
echo "<h1>Sử dụng foreach để lặp mảng</h1>";
foreach ($arrDemo as $key => $value) {
    echo "Phần tử có key = $key có giá trị là $value";
    echo "<br />";
}

//vòng lặp foreach mà bỏ đi key
foreach ($arrDemo as $value) {
    echo "$value <br />";
}

echo "<h1>Phân loại mảng</h1>";
echo "<h2>1 - Mảng tuần tự - Mảng số nguyên</h2>";
//key của mảng tuần tự bắt buộc phải là số
$arrType1 = [1, 3, 5];
$arrType3 = [false, true];
$arrType2 = [
    0 => 'abc',
    1 => 'def',
    4 => 123
];

$data2 = $arrType2[1]; //'def'
$data4 = $arrType2[4]; //123


echo "<pre>";
print_r($arrType2);
echo "</pre>";
foreach ($arrType2 as $k => $v) {
    echo "Phần tử có key là $k có giá trị là $v";
    echo "<br />";
}

echo "<h2>2 - Mảng kết hợp</h2>";
//key ngoài dạng số như mảng tuần tự, thì còn xuất hiện ở dạng chuỗi
$arrMerge1 = [
    'name' => 'Mạnh',
    'age' => 123,
    4 => false
];
//$arrMerge1['age'] //123
foreach ($arrMerge1 as $key => $value) {
    echo "Giá trị của phần tử có key $key là: $value";
    echo "<br />";
}

echo "<h2>3 - Mảng đa chiều</h2>";
//mảng của mảng
$arrMultidimension = [
    'name' => [
        'member1' => 'Mạnh',
        'member2' => 'abc',
        'member3' => [
            'firstName' => "Nguyễn"
        ]
    ],
    'age' => 123,
    4 => 'def'
];

$arrMultidimension['name']['member3']['firstName']; //Nguyễn

foreach ($arrMultidimension as $key => $value) {
    echo "Giá trị của phần tử ở vị trí $key là: ";
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    echo "<br />";
}


//CHỮA THỰC HÀNH 1
$sum = 0;
$multiple = 1;
$arrs = [12, 50, 60, 90, 12, 25, 60];
foreach ($arrs as $key => $value) {
    $sum += $value;
    $multiple *= $value;
}

echo "Tổng của các phần tử trong vòng lặp = " . $sum;
echo "<br />";
echo "Tích của các phần tử trong vòng lặp = " . $multiple;

//CHỮA THỰC HÀNH 2
$arrs = ['đỏ', 'xanh', 'cam', 'trắng'];
$data0 = $arrs[0]; //đỏ
$data1 = $arrs[1]; //xanh
$data2 = $arrs[2]; //cam
$data3 = $arrs[3]; //trắng
$resultString = "<span style='font-style: italic;'>Màu <span style='color: red'>$data0</span> là màu yêu thích của Anh, 
<span style='color: red'>$data3</span> là màu yêu thích của Sơn, 
<span style='color: red'>$data2</span> là màu yêu thích của Thắng, 
còn màu yêu thích của tôi là màu <span style='color: red'>$data1</span></span>";
echo "<br />";
echo $resultString;

//CHỮA THỰC HÀNH 3
$arrs = ['PHP', 'HTML', 'CSS', 'JS'];
?>
<table border="1" cellspacing="0" cellpadding="6">
    <tr>
        <th>Tên khóa học</th>
    </tr>
    <?php foreach($arrs as $key => $value): ?>
    <tr>
        <td>
            <?php echo $value; ?>
<!--            --><?//= $value; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
echo "<h1>Demo một số hàm có sẵn với Mảng trong PHP</h1>";
//hàm tính tổng của 1 mảng có các phần tử là số
$arrDemo1 = [1, 3, 5];
$sum = array_sum($arrDemo1);
echo "Tổng của mảng là: $sum"; //9
echo "<br />";
//count số phần tử của mảng
$count = count($arrDemo1);
echo "Count của mảng là: $count"; //3
echo "<br />";

//kiểm tra xem key có tồn tại trong mảng hay ko
$arrDemo2 = [
    'name' => "Mạnh",
    'age' => 30
];
$isExists = array_key_exists('name1', $arrDemo2);
var_dump($isExists);

//tách 1 chuỗi thành 1 mảng dựa vào ký tự phân tách của chuỗi
$string = "Tôi là Mạnh, tôi 30 tuổi, sống tại Hà Nội";
$arrExplode = explode(',', $string);
echo "<pre>";
print_r($arrExplode);
echo "</pre>";

//lấy giá trị cuối cùng của 1 mảng
$arr = [1, 2, 3, 4];
//$arr[3]
$valueLast = end($arr);
echo "<br />";
echo "$valueLast";

//kiểm tra biến có phải kiểu dữ liệu là mảng hay ko
$arr = [1];
$isArray = is_array($arr);
var_dump($isArray);

//hàm xóa phần tử khỏi mảng
$arrUnset = [1, 2, 3];
unset($arrUnset[1]);
echo "<pre>";
print_r($arrUnset);
echo "</pre>";

echo "<h1>Hàm thao tác với chuỗi có sẵn</h1>";
//lấy ra độ dài của chuỗi
$string = "abcdef";
echo "<br />";
echo strlen($string); //6

//chuyển thành chữ hoa
echo "<br />";
echo strtoupper($string); //ABCDEF

//viết hoa các từ đầu tiên
$string = "tôi là mạnh";
echo "<br />";
echo ucwords($string); //Tôi Là Mạnh

echo "<h1>Hàm thao tác với số có sẵn</h1>";
//format lại số của bạn
$number = 1300000;
echo "<br />";
echo number_format($number);
echo "<br />";
echo number_format($number, 0, '.', '.');

echo "<h1>Hàm thao tác với Time - thời gian có sẵn</h1>";

//lấy thời gian hiện tại dưới giá trị unix timestamp
echo "<br />";
echo time();
//set múi giờ chuẩn của việt nam
date_default_timezone_set("Asia/Ho_Chi_Minh");
//hàm định dạng lại ngày tháng chuẩn mà user hiểu được
echo "<br />";
echo "Ngày giờ hiện tại là: " . date('d-m-Y H:i:s', time());
?>
