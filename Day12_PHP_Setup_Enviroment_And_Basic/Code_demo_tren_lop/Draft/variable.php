<?php
/**
 * Created by PhpStorm.
 * User: StM7
 * Date: 5/31/2019
 * Time: 8:15 PM
 */
echo '<pre>';
//$abc = 2;
//$abC = 3;
//echo $abc;
//echo $abC;
//var_dump($abc);
//$boolean = truE;
//var_dump($boolean);
//var_dump($b = 10.2e3);
//ep kieu trong php
//$floatVariable = (float)1.2;
//echo gettype($floatVariable);
//echo $floatVariable;
$variable = 0b11111111;
var_dump($variable); //integer
var_dump((string)$variable); //string
var_dump((float)$variable); //float
var_dump((double)$variable); //float
var_dump((object)$variable); //object
var_dump((array)$variable); //array
var_dump((boolean)$variable); //boolean

//sự khác nhau echo khi sử dụng nháy đơn và nháy kép
$floatVariable = 3.2;
echo "Biến floatVariable = $floatVariable";
//Biến floatVariable = 3.2
echo "<br />";
echo 'Biến floatVariable = ' . $floatVariable;
echo 'String thông thường';
//Biến floatVariable = $floatVariable
echo json_encode('Mạnh');

//mb_internal_encoding("UTF-8");
//echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
//print_r(var_dump(mb_check_encoding("Nguyễn Viết Mạnh")));
//print_r(var_dump(mb_check_encoding("NGuyen Viet Manh")));
//echo "</pre>";
//die;
//echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
//print_r(var_dump((preg_match('!!u', 'Nguyễn Viết Mạnh'))));
//print_r(var_dump((preg_match('!!u', 'NGuyen Viet Manh'))));
//echo "</pre>";
//die;
$string = "Nguyễn Viết Mạnh";
$string = "NGuyen Viet Manh";

function str_to_utf8 ($str) {
  $decoded = utf8_decode($str);
  if (mb_detect_encoding($decoded , 'UTF-8', true) === false)
    return $str;
  return $decoded;
}


?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<div class="dropdown">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown link
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
    </div>


</div>
