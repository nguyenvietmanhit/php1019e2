<?php
/**
 * Created by PhpStorm.
 * User: StM7
 * Date: 6/4/2019
 * Time: 7:04 PM
 */
$a = 5;
$sum = ++$a + 2 * ($a-- % 2) + $a;
//6 + 2 * (6 % 2) + 5;
echo $sum;

$b = -2;
$sum1 = 9;
$sum1 += $b++ - --$b * 2;


$a = 5;
$b = 6;
var_dump($a == $b); //false


var_dump($a == $b || $a != $b);

$c = 5;
echo $c += 10;

echo 5 > 6 ? "5 > 6" : "5 <= 6";
if (5 > 6) {
    echo "5 > 6";
}
else {
    echo "5 <= 6";
}

//BT1: Viết code để hiển thị các biểu thức sau:
