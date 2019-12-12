<?php
/**
 * Created by PhpStorm.
 * User: StM7
 * Date: 6/4/2019
 * Time: 8:21 PM
 */
//-If else
//    if elseif
//Bài toán: cho trước điểm của 1 học sinh,
//kiểm tra xem học sinh đó có học lực gì, và hiển thị ra
//học lực tương ứng
//có 4 loại học lực: giỏi, khá , trung bình, yếu
$score = -2;
if ($score >= 8.0) {
//    if()
    echo 'Là học sinh giỏi';
}
elseif ($score >= 6.5) {
    echo 'Là học sinh khá';
}
elseif ($score >= 5) {
    echo 'Là học sinh trung bình';
}
else {
    echo 'Là học sinh yếu';
}

//bt2 sử dụng switch case
//nhập vào thứ cho trước dưới dạng số nguyên
//hiển thị ngày tương ứng
echo '<br />';
$day = 9;
switch ($day) {
    case 0: echo 'Ngày chủ nhật';
    break;
    case 1: echo 'Ngày thứ 2';
        break;
    case 2: echo 'Ngày thứ 3';
        break;
    case 3: echo 'Ngày thứ 4';
        break;
    case 4: echo 'Ngày thứ 5';
        break;
    case 5: echo 'Ngày thứ 6';
        break;
    case 6: echo 'Ngày thứ 7';
        break;
    default:
        echo 'Tôi không biết ngày nào';
}

//$string = "Lập trình web";
//for ($i = 0; $i < strlen($string); $i++) {
//    echo $string[$i];
//}
////echo $string;
///
///vòng lặp
/// BT1 - Viết chương trình In ra các số chẵn từ 0 đến 100
for ($i = 0; $i <= 100; $i+=2) {
    echo '<br />';
    echo $i;
}