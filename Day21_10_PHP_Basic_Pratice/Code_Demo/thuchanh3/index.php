<?php
session_start();
if (isset($_SESSION['fullname'])) {
    echo "Hello, " . $_SESSION['fullname'];
}