<?php
//1 - CONSTANT
const ABC = 1;
//echo abc;
define("ABCD", 2, true);
echo abcd;

define("A", [1, 2, 3]);
print_r(A);

if (1 > 2) {
    define("A", 123);
//    error
//    const B = 5;
}

const B = 6;
//const B = 4;
echo B;

define("C", 1 + 2);
const D = 1 + 2;
echo D;
echo C;
echo constant("D");

echo __LINE__;
echo "<br />";
echo __FILE__;
echo "<br />";
echo __DIR__;

//2 - Comment

#comment one line
//comment one line
/*
Comment
multi
line
*/


//$variable = 1;
/**
 * @param $num1 number one
 * @param $num2 number two
 * @return mixed sum two number
 */
function sum($num1, $num2) {
    return $num1 + $num2;
}


//3 - OPERATOR

$variable5 = (float)-123;

$arr = [];
//từ version 5.3 -5.4 trở xuống thì bắt
//buộc phải sử dụng từ khóa aray
$arr2 = array();

$string = 'Today I \\\'ll learn PHP - "Variable"';
echo "<br />";
echo $string;