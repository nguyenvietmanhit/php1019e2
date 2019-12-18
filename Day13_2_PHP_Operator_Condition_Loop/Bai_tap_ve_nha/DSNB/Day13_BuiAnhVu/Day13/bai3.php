<meta charset="utf-8">
<title>Bài 3</title>
<?php
function ht($duongkinh){
    $cv = $duongkinh*3.14;
    $dt = ($duongkinh/2)*3.14;
    echo "<b>Đường kính hình tròn = $duongkinh m</b><br>";
    echo "<b>Chu vi hình tròn = <b>$cv m </b><br>";
    echo "<b>Diện tích hình tròn = $dt m<sup>2</sup></b><br>";
}
ht(6);
?>