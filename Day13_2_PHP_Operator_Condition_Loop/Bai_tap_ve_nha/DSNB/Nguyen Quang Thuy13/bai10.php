<?php
for ($i = 1; $i <= 8; $i++ ){
    for ($j = 1; $j <= 8; $j++ ){
        if ($i%2 != 0){
            if($j%2 != 0){
                echo "<div style='background: black; width:50px; height:50px; display: inline-block; margin:0; border: 1px solid #ccc'>";
                echo "</div>";
            }
            else{
                echo "<div style='background: white; width:50px; height:50px; display: inline-block; margin:0; border: 1px solid #ccc '>";
                echo "</div>";
            }
        }
        else{
            if ($j%2 == 0){
                echo "<div style='background: black; width:50px; height:50px; display: inline-block; margin:0; border: 1px solid #ccc'>";
                echo "</div>";
            }
            else {
                echo "<div style='background: white; width:50px; height:50px; display: inline-block; margin:0; border: 1px solid #ccc '>";
                echo "</div>";
            }
        }
    }
    echo "<br/>";
}



?>

