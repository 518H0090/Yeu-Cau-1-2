<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register Page!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<?php
require_once("connectdb.php");
if (isset($_POST["SUBMIT"])) {
    //lấy thông tin từ các form bằng phương thức POST
    $username = $_POST["username"];
    $password = $_POST["password"];
    $pass = sha1($password);
    $name = $_POST["name"];
    $birth = $_POST["birth"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
    if ($username == "" || $password == "" || $name == "" || $birth == "" || $email == "" || $phone == "" ) {
        echo "bạn vui lòng nhập đầy đủ thông tin";
    }else{
        $sql = "insert into users(
										username,
										password,
										fullname,
										birth,
										email,
										phone
									) VALUES (
										'$username',
										'$pass',
										'$name',
										'$birth',
										'$email',
										'$phone'
									)";
        // thực thi câu $sql với biến conn lấy từ file connection.php
        mysqli_query($conn,$sql);
        echo "<div class='container mt-3'>
            <table class='table table-bordered '>
            <tr>
                    <td colspan='4'><h4><center>Congratulations on your successful registration!</center></h4></td>
                    <td colspan='4'><h4><center>Turn Back <a href='Login.html'>Click Here!</a></center></h4></td>                    
                </tr>
            </div>";
    }
}

?>
</html>
