<?php
/**
 * Created by PhpStorm.
 * User: StM7
 * Date: 6/4/2019
 * Time: 6:33 PM
 */

//Khai báo hằng
//2 cách khai báo:
//- hàm define
//- từ khóa const (nên sử dụng cách dụng)
define("NAME", "ABC");
const AGE = 5;

echo NAME;
echo "<br />";
echo AGE;
echo "<br />";
echo constant("NAME");
echo "<br />";
echo constant("AGE");

//không cho phép gán lại gia trị cho biến
//AGE = 6;
echo "<br />";
echo "Số dòng hiện tại đang gọi hằng __LINE__: " . __LINE__;
echo "<br />";
echo "Đường dẫn file hiện tại đang gọi hằng __FILE__: " . __FILE__;
echo "<br />";
echo "Thư mục hiện tại chứa file đang gọi hằng __DIR__: " . __DIR__;
