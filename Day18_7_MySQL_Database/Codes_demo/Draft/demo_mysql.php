#INSERT INTO categories (name, status)
#VALUES ('ABC', 3)
#lấy dữ liệu ra, lấy tất cả các trường
#SELECT * FROM products
#lấy cụ thể các trường
#SELECT name, price, status FROM products
#lấy theo giới hạn số bản ghi
#SELECT * FROM products LIMIT 2
#lấy giới hạn số bản ghi từ vị trí cụ thể
#SELECT * FROM products LIMIT 5 OFFSET 5
#Biểu thức điều kiện với WHERE
#SELECT * FROM products WHERE id = 1 OR id = 2
#SELECT * FROM products WHERE price > 100 AND status = 0;
#UPDATE bản ghi, luôn phải sử dụng từ khóa WHERE
#UPDATE categories SET name = "New name", status = 3 WHERE id = 1
#Xóa bản ghi, bắt buộc phải có điều kiện WHERE
#DELETE FROM categories WHERE id = 1
#CRUD - create - read - update - delete
#mệnh đề LIKE, search tương đối, thường sử dụng ký tự % để đại diện cho 1 chuỗi ký tự bất kỳ
#SELECT * FROM products WHERE name LIKE '%sam%'
#Sắp xếp với ORDER BY, ASC là tăng dần, DESC sẽ là giảm dần
#SELECT * FROM products ORDER BY price ASC
#SELECT * FROM products ORDER BY id DESC
#Join bảng
#lấy dữ liệu từ bagnr products và tên danh mục mà sản phẩm đó đang thuộc vê
#SELECT products.name AS product_name, products.price, categories.name FROM products
#INNER JOIN categories
#ON products.category_id = categories.id
#Mệnh đề IN
#SELECT * FROM products WHERE id IN(1, 3, 4)
#SELECT * FROM products WHERE id = 1 OR id = 3 OR id = 4
#BETWEEN
#SELECT * FROM products WHERE id BETWEEN 2 AND 4
#cách viết khác của BETWEEN
#SELECT * FROM products WHERE id >= 2 AND id <= 4
#hàm count - đếm số bản ghi trả về từ câu lệnh select
#SELECT COUNT(id) AS count_id FROM products WHERE id > 5
#hàm MAX - Lấy ra giá trị lớn nhất của 1 trường nào đó
#SELECT MAX(price) FROM products
#hàm MIN - Lấy ra giá trị nhỏ nhất của 1 trường nào đó
#SELECT MIN(price) FROM products
#hàm AVG - Lấy ra giá trị trung bình của 1 trường nào đó
#SELECT AVG(price) FROM products
#Mệnh đề GROUP BY
SELECT category_id, COUNT(category_id) AS count_category_id FROM products GROUP BY category_id