<?php
echo "bài 1";
echo "<br>";
$variable1 = 10;
$variable2 = 5;
$result = ($variable1 + $variable2)*2;
$result1 = $variable1 * $variable2;
echo "Chiều dài hình chữ nhật = $variable1 m";
echo "<br>";
echo "Chiều rộng hình chữ nhật = $variable2 m";
echo "<br>";
echo "Chu vi hình chữ nhật = $result m";
echo "<br>";
echo "Diện tích hình chữ nhật = $result1 m2";
?>


<?php
$variable1 = 12;
$result = $variable1 * $variable1;
$result1= $variable1 * 4 ;
echo "<br>";
echo "<br>";
echo "bài 2";
echo "<br>";
echo "Cạnh hình vuông = $variable1 cm";
echo "<br>";
echo "Chu vi hình vuông= $result1 m";
echo "<br>";
echo "Diện tích hình vuông = $result m2";
?>


<?php
$variable1 = 6;
echo "<br>";
echo "<br>";
echo "bài 3";
echo "<br>";
echo "Đường kính hình tròn = $variable1 m";
$result = $variable1 * 3.14;
$result1 = ($variable1/2)*$variable1*3.14;
echo "<br>";
echo "Chu vi hình tròn= $result m";
echo "<br>";
echo "Diện tích hình tròn = $result1 m2";
?>


<?php
echo "<br>";
echo "<br>";
echo "bài 4";
echo "<br>";
$variable1 = 50;
for($i=1;$i<=$variable1;$i++){
    if($i == 1) {
        echo "$i-";
        continue;
    }
    if($i < 50){
        echo "$i-";
    }
    if($i == 50)
    {
        echo "$i";
    }
}
?>


<?php
echo "<br>";
echo "<br>";
echo "bài 5";
echo "<br>";
$variable1 = 10;
$result = 0;
for($i=1;$i<=$variable1;$i++)
{
    if($i == $variable1){
        echo "1/$i =";
    }
    if($i < $variable1) {
        echo "1/$i +";
    }
    $result += 1/$i;
}
//$result1 = 1/$i + $result;
echo "$result";
?>


<?php
echo "<br>";
echo "<br>";
echo "bài 6";
echo "<br>";
$variable1 = 500;
$result = 0;
for($i=1;$i<=$variable1;$i++){
    $result += $i;
}
echo "Tổng các số từ 1 đến 500 = $result";
?>


<?php
echo "<br>";
echo "<br>";
echo "bài 7";
echo "<br>";
$variable1 = 5;
for ($i=0;$i<=$variable1;$i++) {
    $i2 = 0;
    echo "<br>";
    while ($i2 < $i) {
        $i2++;
        echo "*";
    }
}
?>


<?php
echo "<br>";
echo "<br>";
echo "bài 8";
echo "<br>";
$variable1 = 5;
for ($i=0;$i<=$variable1;$i++) {
    $i2 = 0;
    echo "<br>";
    while ($i2 < $i) {
        $i2++;
        echo "*";
    }
}
for($i=0;$i<=$variable1;$i++){
    echo "<br>";
    $i2 = $variable1;
    while ($i < $i2) {
        $i2--;
        echo "*";
    }
}
echo "<br>";
echo "<br>";
?>

<?php
echo "bài 9";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>tên trang</title>
    <style type="text/css" rel="stylesheet">
        .header {
            font-weight: bold;
            font-size: 15pt;
            text-align: center;
            color: red;
            background: #CDFFFF;
        }
        td {
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <td class="header">1</td>
        <td class="header">2</td>
        <td class="header">3</td>
        <td class="header">4</td>
        <td class="header">5</td>
    </tr>
    <tr>
        <td><?php
            $result1 = 0;
            $result = 1;
            $i = 0;
            while($i<10){
                $i++;
                $result1 = $result * $i;
                echo "<br>";
                echo "1X$i = $result1";
            }
            ?>
        </td>
        <td>
            <?php
            $result1 = 0;
            $result = 2;
            $i = 0;
            while($i<10){
                $i++;
                $result1 = $result * $i;
                echo "<br>";
                echo "2X$i = $result1";
            }
            ?>
        </td>
        <td>
            <?php
            $result1 = 0;
            $result = 3;
            $i = 0;
            while($i < 10){
                $i++;
                $result1 = $result * $i;
                echo "<br>";
                echo "3X$i = $result1";
            }
            ?>
        </td>
        <td>
            <?php
            $result1 = 0;
            $result = 4;
            $i = 0;
            while($i < 10){
                $i++;
                $result1 = $result * $i;
                echo "<br>";
                echo "4X$i = $result1";
            }
            ?>
        </td>
        <td>
            <?php
            $result1 = 0;
            $result = 5;
            $i = 0;
            while($i < 10){
                $i++;
                $result1 = $result * $i;
                echo "<br>";
                echo "5X$i = $result1";
            }
            ?>
        </td>
    </tr>
    <tr>
        <td class="header">6</td>
        <td class="header">7</td>
        <td class="header">8</td>
        <td class="header">9</td>
        <td class="header">10</td>
    </tr>
    <tr>
        <td>
            <?php
            $result1 = 0;
            $result = 6;
            $i = 0;
            while($i < 10){
                $i++;
                $result1 = $result * $i;
                echo "<br>";
                echo "6X$i = $result1";
            }
            ?>
        </td>
        <td>
            <?php
            $result1 = 0;
            $result = 7;
            $i = 0;
            while($i < 10){
                $i++;
                $result1 = $result * $i;
                echo "<br>";
                echo "7X$i = $result1";
            }
            ?>
        </td>
        <td>
        <?php
        $result1 = 0;
        $result = 8;
        $i = 0;
        while($i < 10){
            $i++;
            $result1 = $result * $i;
            echo "<br>";
            echo "8X$i = $result1";
        }
        ?>
        </td>
        <td>
            <?php
            $result1 = 0;
            $result = 9;
            $i = 0;
            while($i < 10){
                $i++;
                $result1 = $result * $i;
                echo "<br>";
                echo "9X$i = $result1";
            }
            ?>
        </td>
        <td>
            <?php
            $result1 = 0;
            $result = 10;
            $i = 0;
            while($i < 10){
                $i++;
                $result1 = $result * $i;
                echo "<br>";
                echo "10X$i = $result1";
            }
            ?>
        </td>
    </tr>
</table>
</body>
</html>


<?php
echo "<br>";
echo "<br>";
echo "bài 9 - cách khác";
echo "<br>";
//while(){
echo "<div class='container'>";
    for($i=1;$i<=5;$i++)
    {
        echo "<div class='row-1'>";
        $result = 0;
        $i2 = 0;
        while ($i2 < 10){

            $i2++;
            $result = $i * $i2;
            echo "$i *$i2 = $result";
            echo "<br>";

        }
        echo "<br>";
        echo "</div>";
    }

    for ($i=6;$i<=10;$i++)
    {
        echo "<div class='row-2'>";
        $result = 0;
        $i2 = 0;
        while ($i2 < 10){
            $i2++;
            $result = $i * $i2;
            echo "$i *$i2 = $result";
            echo "<br>";
        }
        echo "<br>";
        echo "</div>";
    }
echo "</div>";
    echo "<style type='text/css' rel='stylesheet'>
            .container{
            border: #000 solid 1px;
            }
            .row-2, .row-1{
            
            text-align: center;
            float: left;
            display: flex;
            display: inline-block;
            padding: 10px;
            }
</style>";
//}
?>

<?php
echo "<br>";
echo "<br>";echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
echo "bài 10";
echo "<br>";
$number1 = 4;
for ($i1=1;$i1<=$number1;$i1++) {
    $i2 = 1;
    while ($i2 <= 4) {
        $i2++;
        echo "<div class='row'>";
        echo "<div class='box'></div>";
        echo "<div class='box2'></div>";
        echo "</div>";
//        echo "<br>";
//        echo "<div class='box'></div>";
//        echo "<br>";
//
    }
    echo "<br>";
    $i3 = 1;
    while ($i3 <= 4) {
        $i3++;
        echo "<div class='row1'>";
        echo "<div class='box2'></div>";
        echo "<div class='box'></div>";
        echo "</div>";
    }
    echo "<br>";
}
        echo "<style type='text/css' rel='stylesheet'>
                    .row{
                    display: flex;
                    display: inline-block;                    
                    border: #000 solid 1px;
                    }
                    .box{
                    float: left;
                    
                   
                    background: black;
                    height: 25px;
                    width: 25px;
                    }
          </style>";
echo "<style type='text/css' rel='stylesheet'>
                   .row1{
                   display: flex;
                   display: inline-block;
                   border: #000 solid 1px;
                   }
                   .box2{             
                   float: left;     
                   background: white;
                   height: 25px;
                   width: 25px;
                }
         </style>";

?>