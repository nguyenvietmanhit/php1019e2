<?php
session_start();
echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
print_r($_SESSION);
echo "</pre>";
die;