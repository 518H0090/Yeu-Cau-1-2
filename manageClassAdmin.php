<?php
require "connectdb.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>View Account Manage</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
    .copyright{
        display: none;
    }
    img{
        width: 30%;
    }
</style>
<body>
<div  style="background: #e3eaf4;  border: dashed 1px #97b8ef; text-align: left">
    <center>
        <p><a href="admin.php">Admin Page</a>
            | <a href="logout.php">Logout</a></p>
        <h2 style="background: white; color: #31708f; padding: 15px 15px;">Manage Class</h2>
        <table width="100%" border="1" style="border-collapse:collapse;">
            <thead>
            <tr>
                <th><strong>S.No</strong></th>
                <th><strong>Code Class</strong></th>
                <th><strong>Class Name</strong></th>
                <th><strong>Description</strong></th>
                <th><strong>Room</strong></th>
                <th><strong>Instructor</strong></th>
                <th><strong>Own</strong></th>
                <th><strong>Image Name</strong></th>
                <th><strong>Image</strong></th>
                <th colspan="2"><strong>Action</strong></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count=1;
            $sel_query="Select * from class ORDER BY id;";
            $result = mysqli_query($conn,$sel_query);
            //Id Name Hobbies Address Country
            while($row = mysqli_fetch_array($result)) { ?>
                <tr><td align="center"><?php echo $count; ?></td>
                    <td align="center"><?php echo $row["code"]; ?></td>
                    <td align="center"><?php echo $row["classname"]; ?></td>
                    <td align="center"><?php echo $row["description"]; ?></td>
                    <td align="center"><?php echo $row["room"]; ?></td>
                    <td align="center"><?php echo $row["instructor"]; ?></td>
                    <td align="center"><?php echo $row["own"]; ?></td>
                    <td align="center"><?php echo $row["image_class"]; ?></td>
                    <td align="center"><?php echo "<img src='images/".$row['image_class']."' >"; ?></td>

                    <td align="center">
                        <a href="editClassAdmin.php?id=<?php echo $row["id"];  ?>">Edit Class</a>
                    </td>
                    <td align="center">
                        <a href="deleteClassAdmin.php?id=<?php echo $row["id"]; ?>">Delete Class</a>
                    </td>
                </tr>
                <?php $_SESSION['ID']=($count++)-1; } ?>
            </tbody>
        </table>
    </center>
</div>
</body>
</html>