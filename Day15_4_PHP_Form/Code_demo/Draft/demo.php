<?php
$result = "";
$error = "";
$errorLastname = "";
$errorPassword = "";
$errorConfirmPassword = "";
if(isset($_POST['save'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    if(empty($lastname)){
        $errorLastname = "Please enter your lastname";
    }
    if(empty($password)){
        $errorPassword = "Please provide a password";
    }
    if(empty($confirm)){
        $errorConfirmPassword = "Please provide a confirm password";
    }
    if($confirm != $password){
        $errorConfirmPassword = "Confirm password must be the same a Password";
    }
    if($firstname == ""){
        $error = "Please enter your firstname";
    } else if($lastname == ""){
        $error = "";
    } else if($username == ""){
        $error = "Please enter username";
    } else if($email == ""){
        $error = "Please provide a email address";
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email is not a valid";
    } else if($password == ""){
        $error = "";
    } else if(($confirm == "") || ($confirm != $password)){
        $error = "";
    } else {
        $result = "<p style='color: #4e95ea'>Đăng ký thành công!</p>";
        $result .= "<p style='color: #4e95ea'>Thông tin của bạn:</p>";
        $result .= "Firstname: $firstname <br/>";
        $result .= "Lastname: $lastname <br/>";
        $result .= "Username: $username <br/>";
        $result .= "Email: $email";
    }
}
?>

<!DOCTYPE>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bài 5 - Ngày 15</title>
    <style>
        html, body{
            font-size: 1rem;
            font-family: 'Arial';
        }
        .container{
            width: 80%;
            margin: auto;
        }
        h1{
            font-size: 2rem;
            font-weight: 500;
        }
        form{
            text-align: center;
        }
        table{
            width: 100%;
        }
        td:first-child{
            float: right;
            margin-right: 2rem;
            font-weight: 600;
            font-size: 0.9rem;
        }
        td:last-child{
            width: 70%;
        }
        div.form-control{
            margin-bottom: 1rem;
        }
        div.form-control input{
            width: 100%;
            padding: 6px;
            border-radius: 5px;
        }
        input.btn{
            padding: 8px 10px;
            background-color: #2e5ba6;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }
        input.btn:hover{
            background-color: #1c37a6;
            transition: 0.4s;
        }
        input.btn:focus{outline: none;}
        .error{
            border: 1px solid red;
        }
        #errorLastname, #errorPassword, #errorConfirmPassword{
            font-style: italic;
            color: red;
            font-weight: 600;
            padding-left: 6px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Register</h1>
    <hr/>
    <h3 style="color: red">
        <?php echo $error;?>
    </h3>
    <form action="" method="post" id="form" class="container">
        <table cellspacing="0">
            <tr>
                <td>Firstname:</td>
                <td>
                    <div class="form-control">
                        <input type="text" id="firstname" placeholder="Firstname" name="firstname" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : ''?>"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Lastname:</td>
                <td>
                    <div class="form-control">
                        <?php
                        $errorClass = '';
                        if(isset($_POST['save'])){
                            if($lastname == ""){
                                $errorClass = 'class="error"';
                            } else {
                                $errorClass = '';
                            }
                        }
                        ?>
                        <input type="text" id="lastname" <?php echo $errorClass;?> placeholder="Lastname" name="lastname" value="<?php echo isset($lastname) ? $lastname : null?>"/>
                        <div id="errorLastname">
                            <?php echo $errorLastname;?>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Username:</td>
                <td>
                    <div class="form-control">
                        <input type="text" id="username" name="username" placeholder="Username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''?>"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Email Address:</td>
                <td>
                    <div class="form-control">
                        <input type="email" id="email" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''?>"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Password:</td>
                <td>
                    <div class="form-control">
                        <?php
                        $errorClass = '';
                        if(isset($_POST['save'])){
                            if($password == ""){
                                $errorClass = 'class="error"';
                            } else {
                                $errorClass = '';
                            }
                        }
                        ?>
                        <input type="password" id="password" <?php echo $errorClass;?> name="password" placeholder="Password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''?>"/>
                        <div id="errorPassword">
                            <?php echo $errorPassword;?>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td>
                    <div class="form-control">
                        <?php
                        $errorClass = '';
                        if(isset($_POST['save'])){
                            if(($confirm == "") || ($confirm != $password)){
                                $errorClass = 'class="error"';
                            } else {
                                $errorClass = '';
                            }
                        }
                        ?>
                        <input type="password" id="confirm" <?php echo $errorClass;?> name="confirm" placeholder="Confirm Password" value="<?php echo isset($_POST['confirm']) ? $_POST['confirm'] : ''?>"/>
                        <div id="errorConfirmPassword">
                            <?php echo $errorConfirmPassword;?>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <input type="submit" name="save" id="btn-submit" class="btn" value="Save" onclick="return submitForm();" />
    </form>
    <h4>
        <?php echo $result;?>
    </h4>
</div>
</body>
</html>