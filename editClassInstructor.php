<?php
require('connectdb.php');
$id=$_REQUEST['id'];
echo "S.No: "./*$_SESSION['ID'];*/$id;
$query = "SELECT * from class where id='".$id."'";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Class</title>
</head>
<body>
<center>
    <div class="form">
        <p><a href="indexadmin.php">Admin Page</a>
            | <a href="UpdateAdmin.php">Insert New Manga</a>
            | <a href="logout.php">Logout</a></p>
        <br>

        <?php
        session_start();
        $status = "";
        if(isset($_POST['new']) && $_POST['new']==1)
        {
            //Id Name Hobbies Address Country
            $id=$_REQUEST['id'];
            $classname = $_REQUEST['classname'];
            $description =$_REQUEST['description'];
            $room =$_REQUEST['room'];
            $instructor = $_SESSION['fullname'];
            $own = $_SESSION['username'];
            $image = $_FILES['image']['name'];
            $target = "images/".basename($image);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
            }
            $update="update class set classname='".$classname."',
    description='".$description."', image_class='".$image."', room='".$room."',instructor='".$instructor."',
    own='".$own."' where id='".$id."'";
            $result=mysqli_query($conn, $update);// or die(mysqli_error());
            $status = "Set Account Successfully. </br></br>
    <a href='manageClassInstructor.php'>View Account Updated Record</a>";
            echo '<p style="color:#ff0000;">' .$status.'</p>';
        }else {
        ?>
        <div>
            <form name="form" method="post" action="" enctype= "multipart/form-data" style="background: #e3eaf4; width: 350px; height: 270px; border: dashed 1px #97b8ef; text-align: left">
                <center>
                    <table cellspacing=10 border=0>
                        <tr>
                            <td colspan="2" style="text-align: center"><h2>Edit Class</h2><hr style="border: 1px dashed #97b8ef"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="hidden" name="new" value="1" />
                                <input type="hidden" name="id" value="<?php echo $row['id'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Code Class:</td>
                            <td><?php echo $row['code'];?></td>
                        </tr>
                        <tr>
                            <td>Class Name:</td>
                            <td><input type="text" name="classname" placeholder="Enter Class Name" required value="<?php echo $row['classname'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Description:</td>
                            <td><input type="text" name="description" placeholder="Enter Description" required value="<?php echo $row['description'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Room:</td>
                            <td><input type="text" name="room" placeholder="Enter Room" required value="<?php echo $row['room'];?>" /></td>
                        </tr>
                        <tr>
                            <td>Image:</td>
                            <td><?php echo "<img style='width:35%;' src='images/".$row['image_class']."' >"; ?></td>
                            <td>Select New Image:</td>
                            <td><input type="file" name="image" value="<?php echo $row['image_class'];?>" required></td>
                        </tr>
                        <tr>
                            <td>Instructor:</td>
                            <td><?php echo $_SESSION['fullname'];?></td>
                        </tr>
                        <tr>
                            <td>Own:</td>
                            <td><?php echo $_SESSION['username'];?></td>
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