<?php
function sum($n){
    $sum = 0;
    $string = "";
    for ($i = 1; $i <= $n; $i++){
        if ($i == $n){
            $string .= "1/$i = ";
            $sum += (1.0/$i);
            break;
        }
        $string .= "1/$i + ";
        $sum += (1.0/$i);

    }

    $sum = $string .$sum;
    return $sum;
}


$result = sum(10);
echo $result;


?>


