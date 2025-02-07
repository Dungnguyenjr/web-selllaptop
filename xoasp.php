<?php
require_once("connect.php");
if(isset($_GET["id"])){
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$sql="DELETE FROM adproducttype WHERE ma_loaisp ='$id'";
	mysqli_query($conn,$sql);
	echo "<script>alert('Bạn đã xóa thành công!');</script>";
	header('location: quantri.php?action=adproducttype');
}
?>