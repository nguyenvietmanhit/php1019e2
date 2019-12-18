<?php
function display($n){
    for ($i = 1; $i <= $n; $i++){

        echo "$i";
        if ($i < $n){
            echo " - ";
        }
    }
}

$result = display(50);
echo $result;

?>