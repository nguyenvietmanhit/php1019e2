<?php
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'ajax_example';
const DB_PORT = 3306;

$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

if (!$connection) {
  die("Không thể kết nối. Lỗi: " . mysqli_connect_error());
}
mysqli_query($connection, 'SET NAMES "utf8"');
$querySelect = "SELECT * FROM books";
$results = mysqli_query($connection, $querySelect);
$books = [];
if (mysqli_num_rows($results)) {
  $books = mysqli_fetch_all($results, MYSQLI_ASSOC);
}

?>
<h2>Danh sách book</h2>
<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Type</th>
        <th>Published Date</th>
        <th>Created at</th>
    </tr>
  <?php if (!empty($books)): ?>
    <?php foreach ($books as $book): ?>
          <tr>
              <td><?php echo $book['id'] ?></td>
              <td><?php echo $book['name'] ?></td>
              <td><?php echo $book['description'] ?></td>
              <td>
                <?php
                $bookType = '';
                switch ($book['type']) {
                  case 0:
                    $bookType = "Sách văn học";
                    break;
                  case 1:
                    $bookType = "Sách toán";
                    break;
                }
                echo $bookType;
                ?>
              </td>
              <td>
                <?php echo date('d-m-Y', strtotime($book['published_date'])); ?>
              </td>
              <td>
                <?php echo date('d-m-Y H:i:s', strtotime($book['created_at'])); ?>
              </td>
          </tr>
    <?php endforeach; ?>
  <?php else: ?>
      <tr>
          <td colspan="5">Không có bản ghi nào</td>
      </tr>
  <?php endif; ?>
</table>
