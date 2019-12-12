<span style="">
<?php
$number = 8;
echo "Giá trị hiện tại là $number";
echo '<br />';
//Cộng thêm 2. Giá trị hiện tại là 10.
$number += 2;
//$number = 8
echo "Cộng thêm 2. Giá trị hiện tại là $number";
echo '<br />';
//Trừ đi 4. Giá trị hiện tại là 6.
$number -= 4;
//$number = 6
echo "Trừ đi 4. Giá trị hiện tại là $number";
echo '<br />';
$number *= 5;
echo "Nhân với 5. Giá trị hiện tại là $number";
echo '<br />';

$number /= 3;
echo "Chia cho 3. Giá trị hiện tại là $number";
echo '<br />';

$number++;
echo "Tăng giá trị lên 1. Giá trị hiện tại là $number";
echo '<br />';
$number--;
echo "Giảm giá trị xuống 1. Giá trị hiện tại là 10.";

$array = [0, true, [1, 2, 3], 'string', -234, null];
//echo "<br />";
//var_dump($array);
//echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
//print_r($array);
//echo "</pre>";
//die;
?>
</span>
<?php if (-1 > 0): ?>
<?php else: ?>
<?php endif; ?>

