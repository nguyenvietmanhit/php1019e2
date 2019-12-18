<?php
const VALUE1 = 1;
const VALUE2 = 2;
const VALUE3 = 3;
const VALUE4 = 4;
function isCheckedRadio($value)
{
  $checked = '';
  if (isset($_GET['submit']) && isset($_GET['gender'])) {
    if ($value == $_GET['gender']) {
      $checked = "checked='checked'";
    }
  }

  return $checked;
}

$checked = isset($_GET['gender'])
?>
    <form action="" method="get">
        <input type="text" name="name"/>
        <input type="radio" name="gender" value="1" checked=""> Gender 1
        <input type="radio" name="gender" value="2" checked=""> Gender 2
        <input type="radio" name="gender" value="3" checked=false> Gender 3
        <input type="radio" name="gender" value="4" checked=false> Gender 4
        <input type="submit" value="submit" name="submit"/>
    </form>
<?php
echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
print_r($_GET);
echo "</pre>";
//die;
if (isset($_GET['submit'])) {
  echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
  print_r($_GET);
  echo "</pre>";
//  die;
// $name = !empty($_GET['name']) ? $_GET['name'] : "111111";
  $name = strlen($_GET['name']) > 0 ? $_GET['name'] : "111111";
  echo $name;
}

//function display() {
//    echo "ahihi";
//}
//
//echo "abc " . display();

$arr = [2, 5, 6, 9, 2, 5, 6, 12, 5];
function calculate($arr, $operator)
{
  $result = $arr[0];
  switch ($operator) {
    case '+':
      $string = "Tổng các phần tử = ";
      foreach ($arr as $value) {
        $string .= "$value + ";
        $result += $value;
      }
      $string = substr($string, 0, -2);
      $string .= " = " . $result;
      break;
    case '-':
      $string = "Hiệu các phần tử = ";
      foreach ($arr as $value) {
        $string .= "$value - ";
        $result -= $value;
      }
      $string = substr($string, 0, -2);
      $string .= " = " . $result;
      break;
    case '*':
      $string = "Tích các phần tử = ";
      foreach ($arr as $value) {
        $string .= "$value * ";
        $result *= $value;
      }
      $string = substr($string, 0, -2);
      $string .= " = " . $result;
      break;
    case '/':
      $string = "Thương các phần tử = ";
      foreach ($arr as $value) {
        $string .= "$value / ";
        $result /= $value;
      }
      $string = substr($string, 0, -2);
      $string .= " = " . $result;
      break;
  }

  $string .= "<br />";
  return $string;
}

echo calculate($arr, '+');
echo calculate($arr, '-');
echo calculate($arr, '*');
echo calculate($arr, '/');

//$array = array(1, 2, 3, 4, 5);
//unset($array[2]);
//$array = array_values($array);
//echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
//print_r($array);
//echo "</pre>";
//die;
//$array = ['programming', 'php', 'basic', 'dev', 'is', 'ab', 'program is PHP'];
//
//$arrMaxLength = [];
//foreach ($array as $key => $value) {
//    $length = strlen($value);
//    $arrMaxLength[$value] = $length;
//}
//
//$max = max($arrMaxLength);
//$min = min($arrMaxLength);
//$arrKeyMax = array_keys($arrMaxLength, $max);
//$arrKeyMin = array_keys($arrMaxLength, $min);
//$arrs = ['1', 'A', 'BCD', 'd'];
//function convertArrayToLower($arr) {
//    $arr_result = [];
//    foreach ($arr as $value) {
//        $arr_result[] = strtolower($value);
//    }
//
//    return $arr_result;
//}
//
//$arrs = convertArrayToLower($arrs);
//echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
//print_r($arrs);
//echo "</pre>";
//die;
$numbers = [78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73];
$average = array_sum($numbers) / count($numbers);
echo $average;
echo "<br />";
$stringLargeAverage = "Các số lớn hơn giá trị trung bình $average là: ";
$stringSmallAverage = "Các số nhỏ hơn hoặc bằng giá trị trung bình $average là: ";
$numbers = array_unique($numbers);
sort($numbers);
foreach ($numbers as $number) {
    if ($number > $average) {
        $stringLargeAverage .= " $number ";
     } else {
      $stringSmallAverage .= " $number ";
    }

}
echo $stringLargeAverage;
echo "<br />";
echo $stringSmallAverage;
?>