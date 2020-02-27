<?php
//tinh tong 3 so truyen vao

function sum($no1,$no2) {
    $sum = $no1 + $no2;
    return $sum;
};
//quan ly sach
function connectDb(){};
function disconnectDb(){};
function addbook(){
    connectDb();
    disconnectDb();
};
function editbook(){};

?>