<meta charset="utf-8">
<title>Bài 1</title>
<?php
function hcn($chieudai, $chieurong){
    $dt = $chieudai * $chieurong;
    $cv = ($chieurong*2 +$chieudai*2);
    echo "<b>Chiều dài hình chữ nhật = $chieudai m</b><br>";
    echo "<b>Chiều rộng hình chữ nhật = $chieurong m</b><br>";
    echo "<b>Chu vi hình chữ nhật = <b>$cv m </b><br>";
    echo "<b>Diện tích hình chữ nhật = $dt m<sup>2</sup></b><br>";
}
hcn(10,5);
?>