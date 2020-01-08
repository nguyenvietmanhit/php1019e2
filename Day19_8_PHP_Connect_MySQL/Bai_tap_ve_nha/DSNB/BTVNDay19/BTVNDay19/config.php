<?php
const DB_HOST ='localhost';
const DB_USERNAME ='root';
const DB_PASSWORD ='';
const DB_NAME ='db_19';
const DB_PORT = 3306 ;
$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD
,DB_NAME,DB_PORT);
if(!$connection){
    die("kết nối thất bại," .mysqli_connect_error());
}
echo "<h1 style='color:RED'> Kết nối thành công CSDL :".DB_NAME." </h1>";
mysqli_query($connection,"set name 'utf8");