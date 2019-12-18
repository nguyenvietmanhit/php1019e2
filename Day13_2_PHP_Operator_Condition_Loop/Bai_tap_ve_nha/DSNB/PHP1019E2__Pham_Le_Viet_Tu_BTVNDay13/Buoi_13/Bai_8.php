<?php
function show($n)
{
    for ($i = 1; $i <= $n; $i++) {
        if($i != 1){
            echo "<br>";
        }
        for ($j = 1; $j <= $i; $j++) {
            echo "*";

        }
    }
    for ($i = $n; $i > 0; $i--) {
        echo "<br>";
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
        }
    }
}

$n = 5;
show($n);

?>