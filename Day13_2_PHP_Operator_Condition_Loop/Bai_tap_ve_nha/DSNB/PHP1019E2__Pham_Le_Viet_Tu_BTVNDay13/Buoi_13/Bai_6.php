<?php
function sum($n)
{
    $s = 0;
    for ($i = 1; $i <= $n; $i++) {
        $s += $i;
    }
    return $s;
}

$n = 500;
echo "Tổng các số từ 1 tới $n = " . sum($n);
?>