<?php
function Chuvi($a)
{
    $c = $a * 4;
    return $c;
}

function Dientich($a)
{
    $s = pow($a, 2);
    return $s;
}

$a = 12;

echo "Cạnh hình vuông = " . $a . "m <br>";
echo "Chu vi hình vuông = " . Chuvi($a) . "m <br>";
echo "Diện tích hình vuông = " . Dientich($a) . "m<sup>2</sup>";

?>