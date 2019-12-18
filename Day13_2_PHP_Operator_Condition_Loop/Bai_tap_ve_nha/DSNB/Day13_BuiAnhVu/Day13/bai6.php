<meta charset="utf-8">
<title>Bài 6</title>
<?php
function tong($n){
    $tong = 0;
    for($i = 1 ;$i<=$n;$i++){
        $tong = $tong +$i;
    }
    echo "<b>Tổng các số từ 1 tới $n = $tong</b>";
}
tong(500);
?>