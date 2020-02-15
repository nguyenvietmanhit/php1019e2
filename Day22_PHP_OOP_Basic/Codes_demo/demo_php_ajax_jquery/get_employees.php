<?php
//lay thong tin nhan vien tu csdl va hien thi ra
//1 - ket noi csdl
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'bt1';
const DB_PORT = 3306;

$connection = mysqli_connect(DB_HOST,
    DB_USERNAME, DB_PASSWORD,
    DB_NAME, DB_PORT);
if (!$connection) {
    die("Lỗi kết nối, thông tin lỗi: " . mysqli_connect_error());
}

echo "<h1>Kết nối thành công</h1>";

//2 - truy vấn vào bảng employees để lấy ra thông tin của tất cả
//nhân viên đang có trong hệ thống
$querySelect = "SELECT * FROM employees";
$results = mysqli_query($connection, $querySelect);

$employees = [];

if (mysqli_num_rows($results) > 0) {
    $employees = mysqli_fetch_all($results, MYSQLI_ASSOC);
}
?>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Des</th>
        <th>Salary</th>
        <th>Gender</th>
        <th>Birthday</th>
        <th>Created at</th>
    </tr>
    <?php if (empty($employees)): ?>
        <tr>
            <td colspan="7">
                KHông có bản ghi nào
            </td>
        </tr>
    <?php else: ?>
        <?php foreach ($employees AS $employee): ?>
            <tr>
                <td>
                    <?php echo $employee['id']; ?>
                </td>
                <td>
                    <?php echo $employee['name']; ?>
                </td>
                <td>
                    <?php echo $employee['description'] ?>
                </td>
                <td>
                    <?php
                    $salary = number_format($employee['salary']);
                    echo $salary . " VNĐ";
                    ?>
                </td>
                <td>
                    <?php
                    $genderText = '';
                    switch ($employee['gender']) {
                        case 0:
                            $genderText = 'Male';
                            break;
                        case 1:
                            $genderText = 'Female';
                            break;
                    }
                    echo $genderText;
                    ?>
                </td>
                <td>
                    <?php
                    $birthday = date('d-m-Y H:i:s',
                        strtotime($employee['birthday']));
                    echo $birthday;
                    ?>
                </td>
                <td>
                    <?php
                    $created_at = date('d/m/Y H:i:s',
                        strtotime($employee['created_at']));
                    echo $created_at;
                    ?>
                </td>
            </tr>
        <?php endforeach;; ?>
    <?php endif; ?>
</table>
