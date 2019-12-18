<meta charset="utf-8">
<title>Bài 7</title>
<?php
function inSao($n){
    for ($i = 1; $i <= $n; $i++){
        for($j =1;$j <= $i;$j++){
            echo "<b>*</b>";
        }
        echo "<br>";

    }
}
inSao(4);
?>