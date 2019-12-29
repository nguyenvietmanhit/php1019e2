1 - Tạo cơ sở dữ liệu
CREATE DATABASE IF NOT EXISTS my_database;
2 - Sử dụng CSDL vừa tạo
USE my_database;

3 - Xóa CSDL
DROP DATABASE php39;

4 - Các kiểu dữ liệu thường được sử dụng
- Nếu dữ liệu là 1 số: thường lưu kiểu
tinyint và int,
ngoài ra có thế là double, float
- Nếu dữ liều là 1 string: thường lưu kiểu varchar,
text

5 - Tạo bảng
CREATE TABLE books (
id INT(11) NOT NULL AUTO_INCREMENT,
title VARCHAR(255) NOT NULL,
description TEXT DEFAULT NULL,
created_at TIMESTAMP,
update_at DATETIME,
PRIMARY KEY (id)
);

6 - Thêm dữ liệu vào bảng vừa tạo

INSERT INTO books(title, description, update_at)
VALUES('Book1', 'Description 1', '2019-06-25 19:09:09')

7 - Xóa bảng
DROP TABLE books

8 - LẤy dữ liệu từ bảng
SELECT * FROM books;
SELECT title, description FROM books
SELECT * FROM books LIMIT 1

9 - Điều kiện Where
SELECT * FROM books WHERE id = 1 OR id = 2;
SELECT * FROM books WHERE title='book2';

10 - Cập nhật bản ghi, thường kết hợp với điều kiện WHER
để tránh update toàn bộ CSDL
UPDATE books SET title = 'New title' WHERE id = 1

11 - Xóa bản ghi, thường kết hợp với điều kiện WHER
để tránh update toàn bộ CSDL
DELETE FROM books WHERE id = 2

12 - Tìm kiếm tương đối với LIKE
SELECT * FROM books WHERE title LIKE '%ok%'

13 - Sắp xếp
SELECT * FROM books ORDER BY title DESC
SELECT * FROM books ORDER BY id ASC


14 - JOIN
SELECT * FROM products
INNER JOIN categories ON products.category_id = categories.id

15 - IN
SELECT * FROM products WHERE id IN (1, 3, 4)
SELECT * FROM products WHERE id = 1 OR id = 3 OR id = 4

16 - BETWEEN
SELECT * FROM products WHERE id >= 2 AND id <= 5

17 - COUNT
SELECT COUNT(id) FROM products WHERE category_id = 2
SELECT COUNT(id) AS count_category_id FROM products WHERE category_id = 2

18 - MAX
SELECT MAX(id) FROM products
SELECT MAX(id) AS max_id FROM products

19 - MIN
SELECT MIN(id) FROM products
SELECT MIN(id) AS min_id FROM products

20 - AVG
SELECT AVG(id) FROM products

21 - SUM
SELECT SUM(id) FROM products

22 - GROUP BY
SELECT category_id, COUNT(category_id) AS count_category_id FROM products
GROUP BY category_id
HAVING count_category_id > 2