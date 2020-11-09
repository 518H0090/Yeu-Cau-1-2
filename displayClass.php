<?php
require('connectdb.php');
$code=$_REQUEST['code'];
$query = "SELECT * from class where code='".$code."'";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Class</title>
</head>
<body>
<center>

        <td>
            <b>Class Name: <?php echo $data["classname"];// In ra title bài viết ?></b><br>
            <b>Description: <?php echo substr($data["description"], 0, 100);// In ra nội dung bài viết lấy chỉ 100 ký tự ?></b><br>
            <b>Room: <?php echo $data["room"];// In ra title bài viết ?></b><br>
            <b>Instructor: <?php echo $data["instructor"];// In ra title bài viết ?></b><br>
            <b>Own: <?php echo $data["own"];// In ra title bài viết ?></b><br>
            <b><?php echo "<img src='images/".$data['image_class']."' >"; ?></b><br>
        </td>


</center>
</body>
</html>