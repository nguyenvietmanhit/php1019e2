<?php
/**
 * Created by PhpStorm.
 * User: StM7
 * Date: 6/4/2019
 * Time: 6:54 PM
 */
//php có 2 cách comment
//1 - comment trên 1 dòng
//sử dung ký tự //  hoặc #
//2 - comment trên nhiều dòng
/* <nội-dung-cm> */
//$name = 'Mạnh';
#$age = "Tên của bạn là $name";

/**
 * Display message
 *
 * @param $message show message
 */
function display($message) {
    echo "Hello, $message";
}

display("World");