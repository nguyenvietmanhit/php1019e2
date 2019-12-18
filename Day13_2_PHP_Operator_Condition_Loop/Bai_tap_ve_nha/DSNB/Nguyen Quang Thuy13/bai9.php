<?php
function bangCuuChuong($n){
    for ($i = 1; $i <=10; $i++){
        echo $i ."x" .$n ."=" .($i*$n) ."<br/>";
    }
}


echo bangCuuChuong(2);

?>