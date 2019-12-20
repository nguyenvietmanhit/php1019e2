
<?php
//session_start();
//if(time() - $_SESSION['timestamp'] > 5) { //subtract new timestamp from the old one
////  echo"<script>alert('15 Minutes over!');</script>";
//  unset($_SESSION['username'], $_SESSION['password'], $_SESSION['timestamp']);
//  $_SESSION['logged_in'] = false;
//  header("Location: index.php" ); //redirect to index.php
//  exit;
//} else {
//  $_SESSION['timestamp'] = time(); //set new timestamp
//}
$arrs = array("Italy" => "Rome", "Luxembourg" => "Luxembourg", "Belgium" => "Brussels", "Denmark" => "Copenhagen", "Finland" => "Helsinki", "France" => "Paris", "Slovakia" => "Bratislava", "Slovenia" => "Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland" => "Dublin", "Netherlands" => "Amsterdam", "Portugal" => "Lisbon", "Spain" => "Madrid", "Sweden" => "Stockholm", "United Kingdom" => "London", "Cyprus" => "Nicosia", "Lithuania" => "Vilnius", "Czech Republic" => "Prague", "Estonia" => "Tallin", "Hungary" => "Budapest", "Latvia" => "Riga", "Malta" => "Valetta", "Austria" => "Vienna", "Poland" => "Warsaw");
foreach ($arrs as $country => $city) {
  echo "<i>Thủ đô của $country là $city</i>";
  echo "<br />";
}

$a = [
  'a' => [
    'b' => 0,
    'c' => 1
  ],
  'b' => [
    'e' => 2,
    'o' => [
      'b' => 3
    ]
  ]
];
//Hãy lấy giá trị = 3 mà có key là b từ mảng trên
echo $a['b']['o']['b'];
echo "<br />";
//Hãy lấy giá trị = 1 mà có key là c từ mảng trên
echo $a['a']['c'];
//Hãy lấy thông tin của phần tử có key là a
print_r($a['a']);

$keys = array(
  "field1" => "first",
  "field2" => "second",
  "field3" => "third"
);
$values = array(
  "field1value" => "dinosaur",
  "field2value" => "pig",
  "field3value" => "platypus",
  "field3value" => "dsadsa",
);

$arr = array_combine($keys, $values);

$array = [12, 5, 200, 10, 125, 60, 90, 345, -123, 100, -125, 0];
foreach ($array as $value) {
  if ($value >= 100 && $value <= 200 && $value % 5 == 0) {
    echo $value . " ";
  }
}

$numbers = [
  'key1' => 12,
  'key2' => 30,
  'key3' => 4,
  'key4' => -123,
  'key5' => 1234,
  'key6' => -12565,
];
//•      Lấy ra phần tử đầu tiên, phần tử cuối cùng trong mảng trên
echo "Phần tử đầu tiên của mảng: " . reset($numbers);
echo "<br />";
echo "Phần tử cuối cùng của mảng: " . end($numbers);
echo "<br />";
//•      Tìm số lớn nhất, số nhỏ nhất, tổng các giá trị từ mảng trên
echo "Số lớn nhất trong mảng: " . max($numbers);
echo "<br />";
echo "Số nhỏ nhất trong mảng: " . min($numbers);
echo "<br />";
echo "Tổng giá trị mảng trên: " . array_sum($numbers);
echo "<br />";
//•      Sắp xếp mảng theo chiều tăng, giảm các giá trị
echo "Sắp xếp theo chiều tăng giá trị: ";
sort($numbers);
echo "<br />";
echo "Sắp xếp theo chiều giảm giá trị: ";
rsort($numbers);
//•      Sắp xếp mảng theo chiều tăng, giảm các key
echo "<br />";
echo "Sắp xếp theo chiều tăng của key: ";
ksort($numbers);
echo "Sắp xếp theo chiều giảm của key: ";
krsort($numbers);

$numbers = [78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73];
$average = array_sum($numbers) / count($numbers);
echo $average;
echo "<br />";
$stringLargeAverage = "Các số lớn hơn giá trị trung bình $average là: ";
$stringSmallAverage = "Các số nhỏ hơn hoặc bằng giá trị trung bình $average là: ";
$numbers = array_unique($numbers);
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

$array1 = [
  [77, 87],
  [23, 45]
];
$array2 = [
  'giá trị 1', 'giá trị 2'
];


[
  0 => [
    'giá trị 1',
    77,
    87
  ],
  1 => [
    'giá trị 2',
    23,
    45,
  ]
]

?>