<?php require_once("connectdb.php"); ?>
<?php
    $own = $_SESSION['username'];
	$sql = "select * from class WHERE own='$own' order by id";
	$query = mysqli_query($conn,$sql);
?>
<style>
    img{
        width:30%;
        box-sizing: border-box;
    }
</style>
<div >
    <table width="100%" border="1">
        <tr>
        <?php

            $i = 0;

            while ( $data = mysqli_fetch_array($query) ) {

                if ($i == 4) {
                    echo "</tr>";
                    $i = 0;
                }
        ?>
            <td>
                <b>Class Name: <?php echo $data["classname"]; ?></b><br>
                <b>Description: <?php echo substr($data["description"], 0, 100); ?></b><br>
                <b>Room: <?php echo $data["room"];?></b><br>
                <b>Instructor: <?php echo $data["instructor"];?></b><br>
                <b>Own: <?php echo $data["own"]; ?></b><br>
                <b><?php echo "<img style='width:25%;' src='images/".$data['image_class']."' >"; ?></b><br>
                <a href="indexeditClassInstructor.php?id=<?php echo $data["id"];  ?>">Edit</a>
                <a href="indexdeleteClassInstructor.php?id=<?php echo $data["id"]; ?>">Delete</a>
                <a href="displayClass.php?code=<?php echo $data["code"];?>"> Xem thêm</a>
            </td>

        <?php
                $i++;
            }
        ?>
    </table>
</div>

		
