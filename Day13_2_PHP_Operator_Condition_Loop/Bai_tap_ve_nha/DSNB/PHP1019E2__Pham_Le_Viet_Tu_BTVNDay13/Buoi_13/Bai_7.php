<?php
function show($n){
    for($i = 1; $i <= $n; $i++){
        echo "<br>";
        for($j = 1; $j <= $i; $j++){
            echo "*";
        }
    }
}

$n = 5;
show($n);

?>