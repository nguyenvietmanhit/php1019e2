<meta charset="utf-8">
<title>Bài 5</title>
<?php
$n = 10;
function tinhbt($n){
    $tong = 0;
    for($i = 1 ;$i<=$n;$i++){
        $tong = $tong + 1/$i;
    }
    echo "<b>S(10) = </b>";
    for($i = 1 ;$i<=$n-1;$i++){
        echo "<b>1/$i + </b>";
    }
    echo "<b>1/$n = </b>";
    echo "<b>$tong</b>";
}
tinhbt(10);
?>