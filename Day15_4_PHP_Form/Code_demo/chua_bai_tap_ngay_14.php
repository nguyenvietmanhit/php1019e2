<?php
//Chữa bài tập 1

/**
 * Hàm tính toán giá trị từ 1 mảng dựa vào các toán tử đã cho
 * @param $arrs array Mảng cần tính toán
 * @param $operator string Các toán tử + - * /
 * @return string Kết quả của bài toán
 */
function calculate($arrs, $operator)
{
//    $arrs = [2, 5, 6, 9, 2, 5, 6, 12 ,5];
    $string = '';
    switch ($operator) {
        case '+' :
            $result = 0;
            $string = "Tổng các phần tử = ";
            foreach ($arrs AS $key => $value) {
                $result += $value;
                $string .= "$value + ";
            }
            break;
        case '-';
//            $arrs = [2, 5, 6, 9, 2, 5, 6, 12 ,5];
            $result = $arrs[0]; //2
            $string = "Hiệu các phần tử = ";
            foreach ($arrs AS $key => $value) {
                $string .= "$value + ";
                if ($key == 0) {
                    continue;
                }
                $result -= $value;
            }
            break;
        case '*':
            $result = 1;
            $string = "Tích các phần tử = ";
            foreach ($arrs AS $value) {
                $result *= $value;
                $string .= " $value * ";
            }
            break;
        case '/':
            $result = $arrs[0];
            $string = "Thương các phần tử = ";
            foreach ($arrs AS $key => $value) {
                //với phép chia, nếu có giá trị nào đó là 0
//                thì bỏ qua lần lặp hiện tại, không thực chia
                if ($value == 0) {
                    continue;
                }
                $string .= " $value / ";
                if ($key == 0) {
                    continue;
                }
                $result /= $value;
            }
            break;
    }

    //gọi hàm cắt chuỗi để loại bỏ ký tự + ở cuối chuỗi
//            $string = 1 + 2 + 3
    $string = substr($string, 0, -2);
    $string .= " = $result";
    $string .= "<br />";
    return $string;
}

$arrs = [2, 5, 6, 9, 2, 5, 6, 12, 5];
//gọi hàm
echo calculate($arrs, '+');
echo calculate($arrs, '-');
echo calculate($arrs, '*');
echo calculate($arrs, '/');

$arr2 = [1, 0, 5];
echo calculate($arr2, '/');

//chữa bài 6
$keys = array(
    "field1" => "first",
    "field2" => "second",
    "field3" => "third"
);
$values = array(
    "field1value" => "dinosaur",
    "field2value" => "pig",
    "field3value" => "platypus"
);
//hàm array_combine nhận vào giá trị của mảng thứ nhất làm key
//, giá trị của mảng thứ 2 làm value
$keysAndValues = array_combine($keys, $values);
echo "<pre>";
print_r($keysAndValues);
echo "</pre>";
//bài 7
$array = [12, 5, 200, 10, 125, 60, 90, 345, -123, 100, -125, 0];
foreach ($array AS $value) {
    if ($value >= 100 && $value <= 200 && $value % 5 == 0) {
        echo $value . " ";
    }
}

//BT 8
//8.	Tìm chuỗi có độ dài lớn nhất, nhỏ nhất và độ dài tương ứng đó từ mảng sau:
$array = ['programming', 'php', 'basic', 'dev', 'is', 'program is PHP'];

//Tìm chuỗi có độ dài lớn nhất
$max = 0;
$str_max = "";
foreach ($array AS $string) {
    $str_length = strlen($string);
    //tại 1 lần lặp nào đó, mà có 1 phần tử có độ dài lớn hơn giá trị
//    max thì làm các phép gán sau
    if ($str_length > 0) {
        $max = $str_length;
        $str_max = $string;
    }
}

echo "Chuỗi lớn nhất là $str_max, độ dài:  $str_length";

//bt 9
//9.	Viết hàm chuyển toàn bộ các ký tự trong mảng số
//nguyên thành mảng các ký tự thường. Cần print_r hoặc var_dump mảng ra màn hình kiểm tra
$arrs = ['1', 'B', 'C', 'E'];
function convertArrToLower($arrs) {
    $arr_result = [];
    foreach($arrs AS $value) {
        $value_lower = strtolower($value);
        //thêm các phần tử vào mảng mới
        $arr_result[] = $value_lower;
    }

    return $arr_result;
}
echo "<pre>";
print_r(convertArrToLower($arrs));
echo "</pre>";

//bài 13
//];
//•	Lấy ra phần tử đầu tiên, phần tử cuối cùng trong mảng trên
////reset($arrs), end($arrs)
//•	Tìm số lớn nhất, số nhỏ nhất, tổng các giá trị từ mảng trên
////max, min, array_sum
//•	Sắp xếp mảng theo chiều tăng, giảm các giá trị
//Sort($arrs), rsort($arrs)
//•	Sắp xếp mảng theo chiều tăng, giảm các key
//Ksort($arrs), rksort($arrs)
