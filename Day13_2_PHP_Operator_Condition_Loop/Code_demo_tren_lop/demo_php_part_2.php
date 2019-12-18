<?php
//Toán tử
//Toán tử số học
$number1 = 5;
$number2 = 2;
$result1 = $number1 + $number2;
$result2 = $number1 - $number2;
$result3 = $number1 * $number2;
$result4 = $number1 / $number2;
$result5 = $number1 % $number2;
echo "Number 1 = $number1 <br />";
echo "Number 2 = $number2 <br />";
echo "Tổng = $result1 <br />";
echo "Hiệu = $result2 <br />";
echo "Tích = $result3 <br />";
echo "Thương = $result4 <br />";
echo "Chia lấy dư = $result5 <br />";
$number1++;
$number2--;
echo "Tăng tích lũy lên 1 = $number1 <br />";
echo "Trừ tích lũy đi 1 = $number2 <br />";
//$number = 5;
//$result = $number++ - $number++ % 2;
//            5   -      6  % 2
//5 -8
$number = 5;
$result = 2 - --$number * ($number-- / 2 + --$number);
//        = 2 -    4      *  ( 4       / 2 +   2 );
//        = -14
//-40 -14 -2 2

//2 - Toán tử so sánh
$number1 = 5;
$number2 = -2;
$result1 = $number1 > $number2; //true
$result2 = $number1 >= $number2; //true
$result3 = $number1 == $number2; //false
$result4 = $number1 < $number2; //false
$result5 = $number1 <= $number2; //false
$result6 = $number1 != $number2; //true

//3 - Toán tử logic
$number1 = 4;
$number2 = -2;
//AND &&
$result1 = ($number1 != 0) && ($number2 == 0); //false
//OR ||
$result2 = ($number1 == 0) || ($number2 != 0); //true
// NOT !
$result3 = !($number1 > $number2); //false

//4 - Toán tử gán
$number1 = 5;
$number1 += 2; //$number1 = $number1 + 2 //7
$number1 -= 1; //6
$number1 *= 2; //12
$number1 /= 4; //3
$number1 %= 2; //1

//5 - Toán tử điều kiện
$number1 = 0;
if ($number1 > 0) {
    echo "> 0";
} else {
    echo "<=0";
}

echo $number1 > 0 ? ">0" : "<=0";

//Chữa thực hành 2
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

//Chữa thực hành 3
echo "<span style='color:red'>";
$number = 8;
echo "Giá trị hiện tại là $number";
echo "<br />";
echo "Cộng thêm 2. Giá trị hiện tại là " . ($number += 2);
echo "<br />";
echo "</span>";


//CÂU LỆNH ĐIỀU KIỆN
$number1 = -1;
//IF
if ($number1 > 0) {
    //thực thi code nếu biểu thức so sánh trả về  true
}

$number1 = 5;
//IF ELSE
if ($number1 > 0) {
    echo "<p> > 0 </p>";
} else {
    echo "<p> < 0 </p>";
}

//IF ELSEIF ..ELSE
$number = 10;
if ($number == 20) {
    echo "Biến đang có giá trị là 20";
} elseif ($number == 15) {
    echo "Biến đang có giá trị là 15";
} elseif ($number == 10) {
    echo "Biến đang có giá trị là 10";
} else {
    echo "Biến đang có giá trị khác 20, 15, 10";
}

//switch -case
$name = "Manh";
switch ($name) {
    case "A" :
        echo "Name là A";
        break;
    case "B" :
        echo "Name là B";
        break;
//        ...
    default:
        echo "NAme khác A hoặc B";
}

//4 - Vòng lặp
//FOR
$number = 10;
for($i = 1; $i < $number; $i++) {
    echo "$i";
}



//WHILE
$number = 5;
$i = 1;
while($i < $number) {
    echo $i;
    $i++;
}
//do while
$number = 2;
$i = 0;
do {
    echo $i;
} while($i > $number);

// Từ khóa continue, break
//BREAK;
for ($i = 1; $i < 10; $i++) {
    //i = 2
    echo $i;//12
    if ($i == 2) {
        break;
    }
}

//CONTINUE
//$number = 5;
for ($i = 1; $i < 5; $i++) {
    echo $i;
    if ($i == 1 || $i == 3) {
        continue;
    }

}
//24

//Chữa bài tập in ra số chẵn lẻ
for($i = 0; $i <= 100; $i++) {
    if ($i % 2 == 0) {
        echo "Số chẵn: $i";
    } else {
        echo "Số lẻ: $i";
    }
}

//Chữa bài tập kiểm tra số nguyên tố
function isPrime($number) {
    //number = 8
    if ($number < 2) {
        return false;
    }

    $is_prime = true;

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            $is_prime = false;
            break;
        }
    }

    return $is_prime;
}

$is_prime = isPrime(15);
var_dump($is_prime);
?>

<?php if ($number == 20): ?>
    <p>Biến đang có giá trị là 20</p>
<ul>
    <li></li>
</ul>
<?php elseif ($number == 15): ?>
    <p>Biến đang có giá trị là 15</p>
<?php elseif ($number == 10): ?>
    <p>Biến đang có giá trị khác 20, 15, 10</p>
<?php else: ?>
<?php endif; ?>






<?php if ($number1 > 0): ?>
    <p>Lớn hơn 0</p>
<?php else: ?>
    <p>Nhỏ hơn 0 </p>
<?php endif; ?>



<?php if ($number1 > 0) : ?>
    <ul>
        <li>
            <a href="#">Link 1</a>
        </li>
        <li>
            <a href="#">Link 2</a>
        </li>
        <li>
            <a href="#">Link 3</a>
        </li>
    </ul>
<?php endif; ?>

