<?php
echo "<h1>Toán tử</h1>";
echo "<h2>Toán tử số học</h2>";
//cộng trừ nhân chia, lấy số dư, cộng trừ tích lũy
$number1 = 5;
$number2 = 2;
$remain = $number1 % $number2;
echo "Phần dư của $number1 % $number2 = $remain";

$sum = $number1-- - 2 * $number2++ + --$number1 % 2 - ++$number2;
//     =      5     - 2 *      2     +   3        % 2 -      4

echo $sum;
//9 2 15 -2 10 -4

echo "<h2>Toán tử so sánh</h2>";
//!=
$number1 = 5;
$number2 = 4;
echo '<br />';
var_dump($number1 == $number2);

echo "<h2>Toán tử logic</h2>";
//toán tử and: && - and
//toán tử or: || - or
//toán tử not: !
$number1 = -1;
$number2 = 2;
$check = ($number1 > 0) && ($number2 > 0);
var_dump($check);

echo "<h2>Toán tử gán</h2>";
// đặc trưng bởi ký tự =
//$a = 5;
//$sum = 6;
//$sum += $a; // $sum = $sum + $a
//echo $sum;

$number = -2;
$sum = 5;
//$sum = $sum * (--$sum + ($number-- * --$sum) / ($number-- - --$sum));
$sum *= --$sum + ($number-- * --$sum) / ($number-- - --$sum);
//2    *   (4   +  (-2       *   3)    /  (-3       -   2 ))
//2 + (4 + 1.2) = 26
echo $sum;
//25 10 14 27.5 10.4 -4 26

echo '<h2>Toán tử điều kiện</h2>';
//Sử dụng toán tử ?:
$check = 5 > 4 ? "ok" : "no";
echo $check;
//if (5 > 4) {
//    $check = "ok";
//}
//else {
//    $check = "no";
//}

echo "<h1>Chữa thực hành 2</h1>";
$number1 = 10;
$number2 = 7;
echo "<span style='color: red'>";
echo "$number1 + $number2 = " . ($number1 + $number2);
echo "<br />";
echo "$number1 - $number2 = " . ($number1 - $number2);
echo "<br />";
echo "$number1 * $number2 = " . ($number1 * $number2);
echo "<br />";
echo "$number1 / $number2 = " . ($number1 / $number2);
echo "<br />";
echo "$number1 % $number2 = " . ($number1 % $number2);
echo "<br />";
echo "</span>";

echo "<h1>Chữa thực hành 3</h1>";
$number = 8;
echo "<span style='color: red'>";
echo "Giá trị hiện tại là $number";
echo "<br />";
echo "Cộng thêm 2. Giá trị hiện tại là " . ($number += 2);
echo "<br />";
echo "Trừ đi 2. Giá trị hiện tại là " . ($number -= 4);
echo "<br />";
echo "</span>";
?>

    <h1>Biểu thức điều kiện</h1>
    <h2>If, if..else, if...elseif, if...elseif..else, switch-case</h2>
<?php
$a = 5;
//if
if ($a > 0) {
    echo "a > 0";
}
//if.else
if ($a > 4) {
    echo 'a > 4';
} else {
    echo 'a <= 4';
}
//if elseif
if ($a == 1) {
    echo 'a đang có giá trị là 1';
} elseif ($a == 2) {
    echo 'a đang có giá trị là 2';
} elseif ($a == 4) {
    echo 'a đang có giá trị là 4';
} else {
    echo 'a đang có giá trị khác 1, 2, 4';
}

//
switch ($a) {
    case 1:
        echo 'a đang có giá trị là 1';
        break;
    case 2:
        echo 'a đang có giá trị là 2';
        break;
    case 4:
        echo 'a đang có giá trị là 4';
        break;
    default:
        echo 'a đang có giá trị khác 1, 2, 4';
}

//hiển thị chuỗi html bất kỳ dựa theo điều kiên
$number = 2;
if ($number > 0) {
    echo "<form method='get' action=''>Đây là form</form>";
}
?>
<?php if ($number > 0): ?>
    <form action="" method="get">
        Username
        <input type="text" name="username" value="Manh"/>
        <input type="submit" value="Send" name="submit"/>
    </form>
<?php endif; ?>

<?php if ($number > 0): ?>
    <h1>Number > 0</h1>
<?php else: ?>
    <h5>Number < 0</h5>
<?php endif; ?>

<?php if ($number > 0): ?>

<?php elseif ($number > 1): ?>

<?php endif; ?>

    <h1>Vòng lặp</h1>
    <h2>For, While, do...while</h2>
<?php
echo "<br >";
//Vòng lặp for
for ($i = 1; $i < 10; $i++) {
    echo "$i,";
}
//vòng lặp while
echo "<br />";
$j = 1;
while($j < 10) {
    echo "$j,";
    $j++;
}

echo "<br />";
//vòng lặp do...while
$m = 1;
do {
    echo "$m,";
    $m++;
}while($m > 10);

echo "<h1>Từ khóa break - continue</h1>";
//từ khóa break
for($i = 1; $i < 10; $i++) {
    if ($i == 5) {
        break;
    }
    echo $i;

}
//continue
echo "<br />";
for($j = 1; $j < 10; $j++){
    if ($j == 5 || $j == 6) {
        continue;
    }
    echo $j;
}

?>
<h1>Thực hành 1 cuối slide</h1>
<?php
$strSoChan = 'Số chẵn:';
$strSoLe = 'Số lẻ:';
for ($i = 0; $i <=100; $i++) {
    if ($i % 2 == 0) {
        if ($i == 100) {
            $strSoChan .= "$i";
            continue;
        }
        $strSoChan .= "$i,";
    }
    else {
        if ($i == 99) {
            $strSoLe .= "$i";
            continue;
        }
        $strSoLe .= "$i,";
    }
}
echo $strSoChan;
echo "<br />";
echo $strSoLe;


?>

<h1>Thực hành 2 cuối slide</h1>
<?php
function isPrime($number) {
    for($i = 2; $i <= sqrt($number); $i++) {
        //chỉ cần biến number chia hết cho 1 số
//        từ 2 đến căn bậc 2 của nó, thì chắc chắn
//        đó ko phải số nguyên tố
        if ($number % $i == 0) {
            return FALSE;
        }
    }
    return TRUE;
}
//$a = 5;
//$a = 12;
$a = 9;
//if (isPrime($a) == TRUE) {
if (isPrime($a)) {
    echo "$a là số nguyên tố";
}
else {
    echo "$a không phải số nguyên tố";
}
?>

<h1>Thực hành 3 cuối slide</h1>
<?php
    function tinhGiaiThua($number) {
        $giaiThua = 1;
        for($i = 1; $i <= $number; $i++) {
            $giaiThua *= $i;
        }

        return $giaiThua;
    }
    $number = 5;
    echo "Giai thừa của $number = " . tinhGiaiThua(5);
?>