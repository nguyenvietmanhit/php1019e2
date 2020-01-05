<!--!DOCTYPE html>-->
<html lang="en">
<head>
<!--    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">-->
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<!--    <link rel="stylesheet" href="css/bootstrap.min.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--    <script src="js/jquery-3.2.1.min.js"></script>-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            max-width: 80%;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="page-header clearfix">
<!--                    <div class="alert alert-success" role="alert">-->
<!--                        Thêm nhân viên mới thành công!-->
<!--                    </div>-->
                    <h2 class="pull-left">Employees List</h2>
                    <a href="create.php" class="btn btn-success pull-right"><span class="glyphicon-plus"></span> Add New Employee</a>
                </div>
                <?php
                // Include configs file
                require_once "config.php";
//                header("Content-Type: text/html;charset=UTF-8");
//                mysqli_query($link, "set names 'utf8'");
                // Attempt select query execution
                $sql = "SELECT * FROM employees";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>#</th>";
                        echo "<th>Name</th>";
                        echo "<th>Description</th>";
                        echo "<th>Salary</th>";
                        echo "<th>Gender</th>";
                        echo "<th>Birthday</th>";
                        echo "<th>Created_at</th>";
                        echo "<th>Action</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($row = mysqli_fetch_array($result)){
                            $genderName = $row['gender'] == 1 ? 'Male' : 'Female';
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            echo "<td>" . number_format($row['salary']) . " VNĐ</td>";
                            echo "<td>" . $genderName . "</td>";
                            echo "<td>" . date('d-m-Y', strtotime($row['birthday'])) . "</td>";
                            echo "<td>" . date('d-m-Y H:i:s', strtotime($row['created_at'])) . "</td>";
                            echo "<td>";
                            echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip' onclick=\"confirm('Are you sure delete?');\"><span class='glyphicon glyphicon-trash'></span></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        // Free result set
                        mysqli_free_result($result);
                    } else{
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }

                // Close connection
                mysqli_close($link);
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>