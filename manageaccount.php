<?php
require('connectdb.php');
$id=$_REQUEST['id'];
echo "S.No: "./*$_SESSION['ID'];*/$id;
$query = "SELECT * from users where id='".$id."'";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Update Manga</title>
</head>
<body>
<center>
    <div class="form">
        <p><a href="indexadmin.php">Admin Page</a>
            | <a href="UpdateAdmin.php">Insert New Manga</a>
            | <a href="logout.php">Logout</a></p>
        <br>

        <?php
        $status = "";
        if(isset($_POST['new']) && $_POST['new']==1)
        {
            //Id Name Hobbies Address Country
            $id=$_REQUEST['id'];
            $username = $_REQUEST['username'];
            $password =$_REQUEST['password'];
            $pass = md5($password);
            $fullname =$_REQUEST['fullname'];
            $birth = $_REQUEST['birth'];
            $email = $_REQUEST['email'];
            $phone = $_REQUEST['phone'];
            $permission = $_REQUEST['permission'];
            $update="update users set username='".$username."',
    password='".$pass."', fullname='".$fullname."',email='".$email."',
    birth='".$birth."', permission='".$permission."', phone='".$phone."' where id='".$id."'";
            $result=mysqli_query($conn, $update);// or die(mysqli_error());
            $status = "Set Account Successfully. </br></br>
    <a href='viewAccount.php'>View Account Updated Record</a>";
            echo '<p style="color:#ff0000;">' .$status.'</p>';
        }else {
        ?>
        <div>
            <form name="form" method="post" action="" style="background: #e3eaf4; width: 350px; height: 270px; border: dashed 1px #97b8ef; text-align: left">
                <center>
                    <table cellspacing=10 border=0>
                        <tr>
                            <td colspan="2" style="text-align: center"><h2>Update Account</h2><hr style="border: 1px dashed #97b8ef"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="hidden" name="new" value="1" />
                                <input type="hidden" name="id" value="<?php echo $row['id'];?>" /></td>
                        </tr>
                        <tr>
                            <td>User Name:</td>
                            <td><input type="text" name="username" placeholder="Enter User Name" required value="<?php echo $row['username'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="password" placeholder="Enter Password" required value="<?php echo $row['password'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Full Name:</td>
                            <td><input type="text" name="fullname" placeholder="Enter Name" required value="<?php echo $row['fullname'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Birth:</td>
                            <td><input type="text" name="birth" placeholder="Enter Birth" required value="<?php echo $row['birth'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="text" name="email" placeholder="Enter Email" required value="<?php echo $row['email'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                            <td><input type="text" name="phone" placeholder="Enter Phone" required value="<?php echo $row['phone'];?>" /></td>
                        </tr>
                        <tr>
                            <td>permission:</td>
                            <td><input type="text" name="permission" placeholder="Enter Permission" required value="<?php echo $row['permission'];?>" /></td>
                        </tr>
                        <tr>
                            <td colspan="2"><center><input name="submit" type="submit" value="Update" /></center></td>
                        </tr>
                    </table>
                </center>
            </form>
        </div>
    </div>
</center>
</body>
<?php }?>
</html>