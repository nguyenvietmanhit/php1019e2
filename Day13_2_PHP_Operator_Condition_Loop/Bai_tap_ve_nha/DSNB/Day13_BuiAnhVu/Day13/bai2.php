<meta charset="utf-8">
<title>Bài 2</title>
<?php
function hv($canh){
    $cv = $canh*4;
    $dt = $canh*$canh;
    echo "<b>Cạnh hình vuông = $canh m</b><br>";
    echo "<b>Chu vi hình vuông = <b>$cv m </b><br>";
    echo "<b>Diện tích hình vuông = $dt m<sup>2</sup></b><br>";
}
hv(12);
?>