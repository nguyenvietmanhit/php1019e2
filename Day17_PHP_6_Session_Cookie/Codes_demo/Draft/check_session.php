<?php
session_start();
echo '<pre>';
print_r($_SESSION);
if (isset($_SESSION['key'][0])) {
    echo $_SESSION['key'][0];
}