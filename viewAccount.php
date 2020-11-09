<?php
require "connectdb.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>View Account Manage</title>
</head>
<style>
    .copyright{
        display: none;
    }
</style>
<body>
<div  style="background: #e3eaf4;  border: dashed 1px #97b8ef; text-align: left">
    <center>
        <p><a href="indexadmin.php">Admin Page</a>
            | <a href="logout.php">Logout</a></p>
        <h2 style="background: white; color: #31708f; padding: 15px 15px;">View Account</h2>
        <table width="100%" border="1" style="border-collapse:collapse;">
            <thead>
            <tr>
                <th><strong>S.No</strong></th>
                <th><strong>User Name</strong></th>
                <th><strong>Password</strong></th>
                <th><strong>Full Name</strong></th>
                <th><strong>Birth</strong></th>
                <th><strong>Email</strong></th>
                <th><strong>Phone</strong></th>
                <th><strong>Permission</strong></th>
                <th colspan="2"><strong>Action</strong></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count=1;
            $sel_query="Select * from users ORDER BY id desc;";
            $result = mysqli_query($conn,$sel_query);
            //Id Name Hobbies Address Country
            while($row = mysqli_fetch_array($result)) { ?>
                <tr><td align="center"><?php echo $count; ?></td>
                    <td align="center"><?php echo $row["username"]; ?></td>
                    <td align="center"><?php echo $row["password"]; ?></td>
                    <td align="center"><?php echo $row["fullname"]; ?></td>
                    <td align="center"><?php echo $row["birth"]; ?></td>
                    <td align="center"><?php echo $row["email"]; ?></td>
                    <td align="center"><?php echo $row["phone"]; ?></td>
                    <td align="center"><?php echo $row["permission"]; ?></td>
                    <td align="center">
                        <a href="manageaccount.php?id=<?php echo $row["id"];  ?>">Edit Account</a>
                    </td>
                    <td align="center">
                        <a href="deleteAccount.php?id=<?php echo $row["id"]; ?>">Delete Account</a>
                    </td>
                </tr>
                <?php $_SESSION['ID']=($count++)-1; } ?>
            </tbody>
        </table>
    </center>
</div>
</body>
</html>