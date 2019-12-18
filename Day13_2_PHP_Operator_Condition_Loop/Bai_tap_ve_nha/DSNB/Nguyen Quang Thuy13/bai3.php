<?php
function circle($a){
    echo "Duong kinh hinh tron = $a" ."<br/>";
    echo "Chu vi hinh tron =" .(3.14*$a) . "m". "<br/>";
    echo "Dien tich hinh tron =" .(3.14*(sqrt($a/2))) ."m" ."<sup>" ."2" ."</sup>";
}

$result = circle(6);
echo $result;
?>