<?php
function sum($n){
    $sum = 0;
    for ($i = 0; $i <= $n; $i++){
        $sum += $i;
    }
    return $sum;
}

$result = sum(500);
echo "Tong cac so tu 1 den 500 = $result";


?>