<?php
function tinh($a = 6)
{
    echo "<b>";
    echo "Đường kính của hình tròn = $a" . "m" ;
    echo "<br>";
    echo "Chu vi hình tròn = " . (float)$a*3.14 . "m";
    echo "<br>";
    echo "Diện tích hình tròn = " . (float)($a/2)*($a/2)*3.14 . "m<sup>2</sup>";
    echo "<br>";
    echo "</b>";
}
tinh();
?>