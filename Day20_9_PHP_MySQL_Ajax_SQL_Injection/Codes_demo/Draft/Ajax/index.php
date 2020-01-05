<!--tạo bảng-->
<!--CREATE DATABASE ajax_example CHARACTER SET utf8 COLLATE utf8_general_ci;-->
<!--//sử dụng CSDL vừa tạo-->
<!--USE ajax_example;-->
<!--tạo bảng books-->
<!--
CREATE TABLE books (
id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
name VARCHAR(255) NOT NULL,
description TEXT DEFAULT NULL,
type TINYINT(3),
published_date DATETIME,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)


<!--thêm dữ liệu demo vào bảng-->
<!--
INSERT INTO books(name, description, type, published_date)
VALUES('Sách văn học 1', 'Đây là sách văn học 1', 0, '2019-03-28');

INSERT INTO books(name, description, type, published_date)
VALUES('Sách văn học 2', 'Đây là sách văn học 2', 0, '2009-12-28');

INSERT INTO books(name, description, type, published_date)
VALUES('Sách văn học 3', 'Đây là sách văn học 3', 0, '2119-04-18');

INSERT INTO books(name, description, type, published_date)
VALUES('Sách toán 1', 'Đây là toán 1', 1, '2015-03-28');

INSERT INTO books(name, description, type, published_date)
VALUES('Sách toán 2', 'Đây là toán 2', 1, '2012-03-15');

INSERT INTO books(name, description, type, published_date)
VALUES('Sách toán 3', 'Đây là toán 3', 1, '2011-10-05');

-->
<!DOCTYPE html>
<html>
<head>
    <title>Ajax</title>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<a href="#" id="show-ajax">Click để lấy danh sách book dạng ajax</a>
<div id="result"></div>
</body>
</html>
