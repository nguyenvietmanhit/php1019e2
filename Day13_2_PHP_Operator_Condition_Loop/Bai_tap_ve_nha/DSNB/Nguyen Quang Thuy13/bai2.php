<?php
function tinhChuViHv($a){
    echo "Canh hinh vuong= $a m" ."<br>";
    echo "Chu vi hinh vuong = " .($a*4) ."m" ."<br/>";
    echo "Dien tich hinh vuong = " .($a*$a) ."m" ."<sup>" ."2". "</sup>";

}


$result = tinhChuViHv(12);
echo $result;
?>