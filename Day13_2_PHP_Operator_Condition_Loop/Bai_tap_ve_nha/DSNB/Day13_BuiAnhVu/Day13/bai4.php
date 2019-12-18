<meta charset="utf-8">
<title>Bài 4</title>
<?php
function htchuoi($n){
    for($i = 1 ;$i<=$n-1;$i++){

        echo "<b>$i - </b>";
    }
    echo "<b>$n</b>";
}
htchuoi(50);
?>