<?php require_once("connectdb.php"); ?>
<?php
	// Lấy 16 bài viết mới nhất đã được phép public ra ngoài từ bảng posts
	$sql = "select * from class order by id";
	// Thực hiện truy vấn data thông qua hàm mysqli_query
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
            // Khởi tạo biến đếm $i = 0
            $i = 0;
            // Lặp dữ liệu lấy data từ cơ sở dữ liệu
            while ( $data = mysqli_fetch_array($query) ) {
                // Nếu biến đếm $i = 4, tức là vòng lặp chạy tới bài viết thứ tư thì ta thực hiện xuống hàng cho bài viết kế tiếp
                // Vì mỗi dòng hiển thị, ta chỉ hiển thị 4 bài viết
                if ($i == 4) {
                    echo "</tr>";
                    $i = 0;
                }
        ?>
            <td>
                <b>Class Name: <?php echo $data["classname"];// In ra title bài viết ?></b><br>
                <b>Description: <?php echo substr($data["description"], 0, 100);// In ra nội dung bài viết lấy chỉ 100 ký tự ?></b><br>
                <b>Room: <?php echo $data["room"];// In ra title bài viết ?></b><br>
                <b>Instructor: <?php echo $data["instructor"];// In ra title bài viết ?></b><br>
                <b>Own: <?php echo $data["own"];// In ra title bài viết ?></b><br>
                <b><?php echo "<img src='images/".$data['image_class']."' >"; ?></b><br>
                <a href="indexeditClassAdmin.php?id=<?php echo $data["id"];  ?>">Edit</a>
                <a href="indexdeleteClassAdmin.php?id=<?php echo $data["id"]; ?>">Delete</a>
                <a href="displayClass.php?code=<?php echo $data["code"];?>"> Xem thêm</a>
            </td>

        <?php
                $i++;
            }
        ?>
    </table>
</div>

		
