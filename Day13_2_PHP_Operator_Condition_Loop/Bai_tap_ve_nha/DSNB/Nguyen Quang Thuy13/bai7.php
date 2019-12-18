<?php
function display($n){
    for ($i = 1; $i <= $n; $i++){
        echo "<br/>";
        for ($j = 1 ; $j <= $i; $j++){
            echo "*";
        }
    }
}


$result = display(5);
echo $result;
?>