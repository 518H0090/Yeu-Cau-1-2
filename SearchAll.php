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

        <form method="GET" action="">
            <div class="form-group">
                <center>
                    <table>
                        <tr>
                            <td>
                                <input type="text" class="form-control" style="width: 700px;" name="search" placeholder="Search by Class Name,Description or Room"/>
                            </td>
                            <td>
                                <input type="submit" class="btn btn-primary" value="search">
                            </td>
                        </tr>
                    </table>
            </div>
            </right>
        </form>
        <?php
        if(isset($_GET['search']))
        {
            $key=$_GET["search"];
            $con=mysqli_connect("localhost","root","","classroomdb");

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $result=mysqli_query($con,"select * from class where `classname` like '%$key%' or `description` like '%$key%' or `room` like '%$key%'");
            echo "
<div class='container mt-3'>
    <table class='table table-bordered '>
        <tr>
            <td colspan='8'><h4>Search of Story</h4></td>
        </tr>
        <tr style='background: #d9edf7; color: #31708f; padding: 15px 15px;'>
            <th>Code Class:</th>
            <th>Class Name:</th>
            <th>Description:</th>
            <th>Room:</th>
            <th>Instructor:</th>
            <th>Own:</th>
            <th>Image:</th>
            <th>Link:</th>
        </tr>
</div>
";
            while($row=mysqli_fetch_assoc($result))
            {
// Print your search variables
                echo "<tr>";
                echo "<td>" . $row['code'] . "</td>";
                echo "<td>" . $row['classname'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['room'] . "</td>";
                echo "<td>" . $row['instructor'] . "</td>";
                echo "<td>" . $row['own'] . "</td>";
                echo "<td>";
                echo "<img style='width:35%;' src='images/" . $row['image_class'] . "' >";
                echo "</td>";
                echo "<td>";
                ?>
                <a href='displayClass.php?code=<?php echo $row['code'];?>'> Xem thêm</a>
            <?php
                echo "</td>";
                echo "</tr>";
            }

        }
        ?>
    </center>
</div>
</body>
</html>