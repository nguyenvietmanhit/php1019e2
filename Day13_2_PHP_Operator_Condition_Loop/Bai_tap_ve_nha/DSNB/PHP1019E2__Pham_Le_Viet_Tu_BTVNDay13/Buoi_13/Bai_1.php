<?php
function Chuvi($a, $b)
{
    $c = ($a + $b) * 2;
    return $c;
}

function Dientich($a, $b)
{
    $s = $a * $b;
    return $s;
}

$a = 10;
$b = 5;

echo "Chiều dài hình chữ nhật = " . $a . "m <br>";
echo "Chiều rộng hình chữ nhật = " . $b . "m <br>";
echo "Chu vi hình chữ nhật = " . Chuvi($a, $b) . "m <br>";
echo "Diện tích hình chữ nhật = " . Dientich($a, $b) . "m<sup>2</sup>";

?>