<?php
/**
 * Created by PhpStorm.
 * User: nvmanh
 * Date: 2/24/2020
 * Time: 6:37 PM
 */
//tính tổng 3 số truyền vào
//các bạn mới, nghĩ gì viết nấy
$number1 = 1;
$number2 = 2;
$number3 = 3;
$sum = $number1 + $number2 + $number3;
echo "Sum = $sum";

//2 - Lập trình có cấu trúc
function sum($number1, $number2, $number3) {
    $sum = $number1 + $number2 + $number3;

    return $sum;
}

echo sum(3,4,5); //12

//quản lý sách
function connectDb() {}
function disconectDb() {}
function addBook() {
    connectDb();
    //code thêm sách
    disconectDb();
}
function editBook() {}


