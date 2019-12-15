<?php
//khai báo 1 mảng có 5 phần tử
//lần lượt có kiểu dữ liệu là string, number, boolean
//null, array
$arr = [
    0 => 'abc',
    1 => 123,
    2 => TRUE,
    3 => null,
    4 => [1, 2, "abc", []]
];
echo '<pre>';
var_dump($arr);

print_r($arr);

$arrFor = [
    1, 2, 3, 4, 5, '6'
//  0  1  2  3  4   5
];
//sử dụng for để lặp mảng
echo '<br />Sử dụng for để lặp mảng <br />';
for ($key = 0; $key < count($arrFor); $key++) {
    echo $arrFor[$key];
    echo '<br />';
}
echo '<br />Sử dụng foreach để lặp mảng <br />';
//sử dụng foreach để lặp mảng

foreach ($arrFor as $key => $value) {
    echo "Phần tử ở vị trí $key có giá trị là: " . $value;
    echo '<br />';
}


//Array Type
//1 - Mảng số nguyên: key chỉ có thể ở dạng số nguyên
//có tên gọi khác là mảng tuần tự
$arrKeyNum1 = [1, 'abc', 'null', TRUE];
$arrKeyNum2 = [
    2 => 'abc',
    5 => 123,
    10 => FALSE
];
echo 'Lặp mảng số nguyên sử dụng foreach';
foreach ($arrKeyNum2 as $key => $value) {
    echo '<br />';
    echo "Phần tử có vị trí $key có giá trị là: $value";
    echo '<br />';
}


//2 - Mảng kết hợp: key có thể là string hoặc kết hợp cả
//số và string
$arrAssociation = [
    'a' => 123,
    2 => 'abc',
    'c' => false
];
echo 'Lặp mảng kết hợp sử dụng foreach';
foreach ($arrAssociation as $k => $v) {
    echo '<br />';
    echo "Phần tử có vị trí $k có giá trị là: $v";
    echo '<br />';
}

//3 - Mảng đa chiều: là mảng có thể chứa 1 hoặc nhiều mảng
//khác trong nó
$arrMultiDimension = [
    2 => [
        1, 2, 3, 4
    ],
    'a' => 'abc',
    'b' => [
        'c' => 'value c',
        'd' => 'value d',
    ]
];

foreach ($arrMultiDimension as $key => $value) {
    echo '<br />';
    echo "Phần tử có vị trí $key có giá trị là: " . var_dump($value);
    echo '<br />';
}

$arrMultiDimension2 = [
    2 => [
        1, 2, 3, 4
    ],
    'a' => 'abc',
    'b' => [
        'c' => 'value c',
        'd' => 'value d',
    ]
];
//lấy ra giá trị của phần tử có key = b
$var1 = $arrMultiDimension2['b'];
echo '<pre>';
print_r($var1);
//lấy ra giá trị 'value c'
$var2 = $arrMultiDimension2['b']['c'];
print_r($var2);
?>
<!--Cho biết đây là mảng loại nào và tính tổng và -->
<!--tích của các phần tử trong mảng sau:-->
<!--$arrs = [12, 50, 60, 90, 12, 25, 60];-->
<?php
$arr = [12, 50, 60, 90, 12, 25, 60];
$sum = 0;
$multi = 1;
?>
<table>
    <tr>
        <?php foreach ($arr as $key => $value): ?>
            <?php
            $sum += $value;
            $multi *= $value;
            ?>
        <?php endforeach; ?>
        <td>
            <p style="color: red">
                Tổng = <?= $sum;?>,
                Tích = <?php echo $multi;?>
            </p>
        </td>
    </tr>
</table>

<?php
//các thư viện thao tác với mảng
$arr = [12, 50, 60, 90, 12, 25, 60];
$sum = array_sum($arr);
echo "<p>Tổng của mảng arr = $sum</p>";

$arr2 = [
    'a' => 3,
    1 => 3,
    -1 => 0
];
$isKeyExists = array_key_exists('a', $arr2);
var_dump($isKeyExists);
echo '<pre>';
$arr3 = [1, 2, 3, 5, 1, 1];
echo 'Mảng trước khi lọc giá trị trùng:';
print_r($arr3);
$arrUnique = array_unique($arr3);
echo 'Mảng sau khi lọc giá trị trùng:';
print_r($arrUnique);
$arr3 = [1, 2, 3, 'a'];
$valuePop = array_pop($arr3);
var_dump($valuePop);
print_r($arr3);
//cách sử dụng hàm có sẵn
//1 - Viết tên hàm trước, sau đó sử dụng phím tắt Ctrl + Q
//để show ra hướng sử dụng hàm
//2- Nhìn vào hướng dẫn sử dụng hàm, sẽ biết được tham số truyền vào
//hàm và hàm return về kiểu dữ liệu nào để xử lý thích hợp
$var = 'abc';
$var = array('abc');
var_dump(is_array($var));
?>s