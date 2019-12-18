<?php
//array
$arr = ['NV A', 'NV B', 'NV C', 'NV D'];
$arr_demo = [
//    1, new Demo(), null, true,

];

$arr2 = array(1, 2);

$staffs = ['Nhân viên A', 'Nhân viên B', 'Nhân viên C', 'Nhân viên D', 'Nhân viên E'];
echo '<p>Mảng ban đầu</p>';
echo '<pre>';
print_r(var_dump($staffs));
//foreach
foreach ($staffs as $key => $value) {
    echo "Vị trí $key : $value";
    echo '<br />';

}

echo '<p>sử dụng vòng lặp for để lặp mảng</p>';
for ($i = 0; $i < count($staffs); $i++) {
    echo "Vị trí $i : $staffs[$i]";
    echo '<br />';
}

//phan loai mang
//1 - mang so nguyen - indexes array
$arr1 = [1, 'abc', 4];
foreach ($arr1 as $key => $value) {
    echo "Phần tử $key có giá trị = $value <br />";
}
echo $arr1[0];
echo $arr1[1];
echo $arr1[2];
//error
echo $arr1[3];

//mang ket hop
$arr2 = [
    'a' => 1000,
    'b' => 2000,
    'c' => 3000,
    'd' => 4000,
];
foreach ($arr2 as $key => $value) {
    echo "Phần tử $key có giá trị = $value <br />";
}
echo $arr2['a'];
echo $arr2['b'];
echo $arr2['c'];
//error
echo $arr2['e'];


//mang da chieu
$students = [
    'Lớp A1' => ['Huệ', 'Long'],
    'Lớp A2' => ['Trang', 'Nam', 'Binh'],
    'Lớp A3' => ['Hạnh', 'Hiền', 'Thủy', 'Việt']
];
foreach ($students as $key => $value) {
    echo "Phần tử $key có giá trị = $value <br />";
}

//thu vien thao tac voi mang
$arr1 = [1, 2, 3, 'a000', '4avx'];
echo '<br />';
echo array_sum($arr1);
echo '<br />';
var_dump(array_key_exists(1, $arr1));

print_r(array_merge($arr1, [2, 22, 22]));

echo '<br />';
var_dump(array_search('4avx', $arr1));

function sum($n)
{
    $sum = 0;
    for ($i = 1; $i <= $n; $i++) {
        $sum += 1 / $i;
    }
    return $sum;
}

$n = 3;
function checkValidate($n)
{
    if ($n < 0) {
        echo "Không cho phép tính với số âm";
    } else if ($n == 0) {
        echo "Không thực hiện xử lý";
    }
}

{
    echo "sum = " . sum($n);
}

?>


