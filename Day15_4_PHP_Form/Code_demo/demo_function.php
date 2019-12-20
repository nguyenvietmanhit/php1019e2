<?php
//Demo 1 số hàm thao tác với chuỗi
$string = "abc def";
//chuyển thành chữ hoa
echo strtoupper($string); // ABC DEF
//chuyển ký tử đầu tiên thành chữ hoa
$string = "hello abc";
echo ucfirst($string); //Hello abc
//chuyển ký từ đàu tiên của mỗi từ thành chữ hoa
$string = "my name is manh";
echo ucwords($string); //My Name Is Manh

//xóa các khoảng trắng ở đầu và cuối chuỗi
$string = "         abc def        ";
echo trim($string); //abc def

//tìm kiếm và thay thế
$string = "abc def";
echo str_replace("abc", "manh", $string); //manh def

//tìm kiếm và thay thế theo chuỗi regex
//chuỗi regex là 1 mẫu dùng để nhận dạng 1 format nào đó
//thay thế tất cả các ký tự nào là số bằng 1 dấu -
$string = "11aa 123456 343 12121";
echo preg_replace('/[0-9]/', '-', $string);
//--aa ----- --- -----

//cắt chuỗi
$string = "hello world";
echo substr($string, 0, 3); //hel

//Hàm thao tác với thời gian - ngày tháng
$datetime = "2019-05-30 15:00:00";
//format lại thành kiểu 30-05-2019 15:00:00
echo date('d-m-Y H:i:s', strtotime($datetime));
echo "<br >";
//lấy ra thời hiện tại
echo time(); //lấy ra thời gian hiện tại với định dạng là giây
//tính từ ngày 1-1-1970
echo "<br >";
//set lại múi giờ là giờ Việt Nam
date_default_timezone_set('Asia/Ho_Chi_Minh');
echo date('d/m/Y H:i:s', time());

// Thao tác với số
$price = 12500000;
echo "<br />";
//format thành 12.500.000
echo number_format($price, 0, '.', '.');
//12.500.000