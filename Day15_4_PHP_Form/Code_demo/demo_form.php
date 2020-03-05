<?php

$a = [1, 2];
$b = ['a', 'b'];
$abc = 'abc'; //12c
echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
print_r(array_($b, $a));
echo "</pre>";
die;