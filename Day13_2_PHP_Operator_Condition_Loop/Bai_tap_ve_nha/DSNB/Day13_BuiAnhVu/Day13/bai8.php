<meta charset="utf-8">
<title>Bài 8</title>
<?php
function inSao($n){
    for ($i = 1; $i <= $n; $i++){
        for($j =1;$j <= $i;$j++){
            echo "<b>*</b>";
        }
        echo "<br>";
    }
    if($n == 2){
        for ($i = $n-1; $i >= 1; $i--){
            for($j =$i;$j >= 1;$j--){
                echo "<b>*</b>";
            }
            echo "<br>";
        }
    }
    else{
        for ($i = $n; $i >= 1; $i--){
            for($j =$i;$j >= 1;$j--){
                echo "<b>*</b>";
            }
            echo "<br>";
        }
    }
}
inSao(5);
?>