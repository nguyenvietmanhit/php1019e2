<?php
/**
 * Created by PhpStorm.
 * User: nvmanh
 * Date: 6/1/2019
 * Time: 11:30 AM
 */
//Các ví dụ về kiểu dữ liệu và khai báo
//1 - Integer
$intThapPhan = 2147483647;
$intSoAm = -456;
$intBatPhan = 0444;
$intThapLucPhan = 0444;
echo 'Kiểm tra kiểu dữ liệu integer sử dụng hàm var_dump: ';
var_dump($intThapPhan);
var_dump($intSoAm);
var_dump($intBatPhan);
var_dump($intThapLucPhan);

//2 - Boolean
$booleanTrueUpperCase = TRUE;
$booleanFalseUpperCase = FALSE;
$booleanTrueLowerCase = true;
$booleanFalseLowerCase = false;
echo '<br />';
echo 'Kiểm tra kiểu dữ liệu boolean sử dụng hàm var_dump: ';
var_dump($booleanTrueUpperCase);
var_dump($booleanFalseUpperCase);
var_dump($booleanTrueLowerCase);
var_dump($booleanFalseLowerCase);

//3 - Float
$floatNumber = -1.23;
echo '<br />';
echo 'Kiểm tra kiểu dữ liệu float sử dụng hàm var_dump: ';
var_dump($floatNumber);

//4 - String
$stringNumber = '1212121';
echo '<br />';
echo 'Kiểm tra kiểu dữ liệu string sử dụng hàm var_dump: ';
var_dump($stringNumber);

//5 - Array
$arrayEx1 = array(1, 2, "string", true);
$arrayEx2 = [1, 2, 'string', false];
echo '<br />';
echo 'Kiểm tra kiểu dữ liệu array sử dụng hàm var_dump: ';
var_dump($arrayEx1);
var_dump($arrayEx2);

//6 - Null
$nullEx1 = NULL;
$nullEx2 = null;
echo '<br />';
echo 'Kiểm tra kiểu dữ liệu null sử dụng hàm var_dump: ';
var_dump($nullEx1);
var_dump($nullEx2);

echo '<br />';
echo "Today I \'ll learn PHP - \"Variable\"";
//echo "This is a bad command : del c:\*.* ";
//7 - Object
//sẽ học riêng trong các phần sau