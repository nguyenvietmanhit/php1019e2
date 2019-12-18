<?php
function tinh($a = 10)
{
    echo "<b>";
    echo "Cạnh của hình vuông = $a" . "m" ;
    echo "<br>";
    echo "Chu vi hình vuông = " . $a*4 . "m";
    echo "<br>";
    echo "Diện tích hình vuông = " . $a*$a . "m<sup>2</sup>";
    echo "<br>";
    echo "</b>";
}
tinh();
?>