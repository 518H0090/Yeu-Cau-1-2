<?php
require('connectdb.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM class WHERE id=$id";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: manageClassInstructor.php");
?>