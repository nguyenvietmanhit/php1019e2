<?php
function show($n)
{
    for ($i = 0; $i <= $n; $i++) {
        echo "$i";
        if ($i < $n) {
            echo " - ";
        } else {
            break;
        }
    }
}

$n = 50;
show($n);
?>