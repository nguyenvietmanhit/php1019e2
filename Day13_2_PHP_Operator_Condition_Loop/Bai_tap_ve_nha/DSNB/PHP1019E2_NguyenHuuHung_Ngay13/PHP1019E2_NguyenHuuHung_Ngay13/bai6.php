<?php
function  tinh($n = 500)
{
    $S = 0;
    for ($i=1;$i<=$n;$i++)
    {
        $S = $S + $i;
    }
    echo "<b>Tổng các số từ 1 đến $n = $S</b>";
}
tinh();
?>