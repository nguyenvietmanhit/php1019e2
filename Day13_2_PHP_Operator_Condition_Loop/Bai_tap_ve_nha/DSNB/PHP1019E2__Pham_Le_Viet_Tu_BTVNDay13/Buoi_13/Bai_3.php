<?php
function Chuvi($a)
{
    $c = $a * pi();
    return $c;
}

function Dientich($a)
{
    $s = pi() * pow(((float)$a / 2), 2);
    return $s;
}

$a = 6;

echo "Đường kính hình tròn = " . $a . "m <br>";
echo "Chu vi hình tròn = " . Chuvi($a) . "m <br>";
echo "Diện tích hình tròn = " . Dientich($a) . "m<sup>2</sup>";

?>