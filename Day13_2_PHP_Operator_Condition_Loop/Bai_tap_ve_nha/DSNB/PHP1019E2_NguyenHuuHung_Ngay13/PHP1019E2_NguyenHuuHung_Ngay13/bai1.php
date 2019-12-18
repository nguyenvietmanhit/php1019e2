<?php
    function tinh($a = 10, $b = 5)
    {
        echo "<b>";
        echo "Chiều dài hình chữ nhật = $a" . "m" ;
        echo "<br>";
        echo "Chiều rộng hình chữ nhật = $b" . "m";
        echo "<br>";
        echo "Chu vi hình chữ nhật = " . ($a+$b)*2 . "m";
        echo "<br>";
        echo "Diện tích hình chữ nhật = " . $a*$b . "m<sup>2</sup>";
        echo "<br>";
        echo "</b>";
    }
    tinh();
?>