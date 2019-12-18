<?php
echo "<h2>Bài 1</h2>";
function chuVi_dienTich_HCN($a, $b) {
    echo 'Chiều dài hình chữ nhật = ' . $a . 'm<br/>';
    echo 'Chiều rộng hình chữ nhật = ' . $b . 'm<br/>';
    echo 'Chu vi hình chữ nhật = ' . 2*($a + $b) . 'm<br/>';
    echo 'Diện tích hình chữ nhật = ' . ($a * $b) . 'm<sup>2</sup><br/>';
}
chuVi_dienTich_HCN(10, 5);

echo "<h2>Bài 2</h2>";
function chuVi_dienTich_HV($a) {
    echo 'Cạnh hình vuông = ' . $a . 'm<br/>';
    echo 'Chu vi hình vuông = ' . 4*$a . 'm<br/>';
    echo 'Diện tích hình vuông = ' . pow($a,2) . 'm<sup>2</sup><br/>';
}
chuVi_dienTich_HV(12);

echo "<h2>Bài 3</h2>";
CONST PI = 3.1416;
function chuVi_dienTich_HTron($a) {
    echo 'Đường kính hình tròn = ' . $a . 'm<br/>';
    echo 'Chu vi hình tròn = ' . PI*$a . 'm<br/>';
    echo 'Diện tích hình tròn = ' . PI*pow(($a/2),2) . 'm<sup>2</sup><br/>';
}
chuVi_dienTich_HTron(6);

echo "<h2>Bài 4</h2>";
function show_string($n){
    $char_string = 1;
    for($i=2; $i<=$n; $i++){
        $char_string .= ' - '.$i;
    }
    echo $char_string;
}
show_string(1);

echo "<h2>Bài 5</h2>";
function result_expression($n){
    $sum = 0;
    for($i=1; $i<=$n; $i++){
        $sum += 1/$i;
    }
    return $sum;
}
function show_expresion($n){
    $string = "S($n) = 1/1";
    for($i=2; $i<=$n; $i++) {
        $string .= ' + ' . "1/$i";
    }
    echo $string . ' = ' . result_expression($n);
}
show_expresion(20);

echo "<h2>Bài 6</h2>";
function sum_expr($n){
    $sum = 0;
    for($i=1; $i<=$n; $i++){
        $sum += $i;
    }
    echo "Tổng các số từ 1 đến $n = $sum";
}
sum_expr(10);