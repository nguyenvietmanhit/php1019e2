<meta charset="utf-8">
<title>Bài 10</title>
<style>
    #den{
        height: 70px;
        width: 70px;
        background: black;
    }
    #trang{
        height: 70px;
        width: 70px;
        background: white;
    }
    div{
        display: inline-block;
        border-style: solid ;
        border-color: black;
        boder-width: 1px;
    }
</style>
<?php
for($i = 8; $i >= 1; $i--){
    if($i %2 != 0){
        for($j = 8; $j >= 1; $j--){
            if($j % 2 != 0){
                echo"<div id='den'></div>";
            }
            else{
                echo"<div id='trang'></div>";
            }
    }
    echo "<br>";}
    else{
        for($j = 8; $j >= 1; $j--){
            if($j % 2 != 0){
                echo"<div id='trang'></div>";
            }
            else{
                echo"<div id='den'></div>";
            }
        }echo"<br>";
    }

}
?>