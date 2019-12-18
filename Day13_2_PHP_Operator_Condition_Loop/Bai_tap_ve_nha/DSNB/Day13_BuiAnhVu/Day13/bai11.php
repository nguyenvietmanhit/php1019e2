<meta charset="utf-8">
<title>Bài 11</title>
<style>
    #co{
        height: 50px;
        width: 50px;
        background: greenyellow;
        text-align: center;
    }
    #khong{
        height: 50px;
        width: 50px;
        background: white;
        text-align: center;
    }
    div{
        display: inline-block;
        border-style: solid ;
        border-color: black;
        boder-width: 1px;
    }
</style>
<?php
function isPrime($number) {
    if ($number < 2) {
        return false;
    }
    $is_prime = true;
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            $is_prime = false;
            break;
        }
    }
    return $is_prime;
}
$x = 1;
for($i = 10; $i >=1; $i--){
    for($j = 10; $j>=1 ; $j--) {
        if(isPrime($x) == true){
            echo "<div id='co'>$x</div>";
        }
        else{
            echo "<div id='khong'>$x</div>";
        }
        $x++;
    }
    echo "<br>";
}
?>

