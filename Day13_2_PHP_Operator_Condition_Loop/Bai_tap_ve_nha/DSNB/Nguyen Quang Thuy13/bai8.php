<?php
function display($n)
{
    if ($n % 2 != 0) {
        for ($i = 1; $i <= $n; $i++) {
            echo "<br/>";
            for ($j = 1; $j <= $i; $j++) {
                echo "*";
            }
        }
        for ($i = 1; $i <= $n; $i++) {
            echo "<br/>";
            for ($j = $n; $j >= $i; $j--) {
                echo "*";
            }
        }
    }
    else{
        for ($i = 1; $i <= $n; $i++) {
            echo "<br/>";
            for ($j = 1; $j <= $i; $j++) {
                echo "*";
            }
        }
        for ($i = 1; $i <= $n; $i++) {
            echo "<br/>";
            for ($j = ($n-1); $j >= $i; $j--) {
                echo "*";
            }
        }

    }
}

$result = display(5);
echo $result;
?>