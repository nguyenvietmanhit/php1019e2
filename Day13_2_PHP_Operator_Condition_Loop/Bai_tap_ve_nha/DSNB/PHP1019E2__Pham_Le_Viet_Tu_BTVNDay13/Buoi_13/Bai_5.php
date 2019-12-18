<?php
function show($n)
{
    for ($i = 1; $i <= $n; $i++) {
        echo "1/$i";
        if ($i < $n) {
            echo " + ";
        } else {
            break;
        }
    }
}

function sum($n)
{
    $s = 0;
    for ($i = 1; $i <= $n; $i++) {
        $s += (float)1 / $i;
    }
    return $s;
}

$n = 10;
echo "S($n) = ";
echo show($n) . " = " . sum($n);

?>