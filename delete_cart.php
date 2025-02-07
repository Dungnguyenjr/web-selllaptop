<?php
require_once("connect.php");
session_start(); // Khởi tạo phiên làm việc nếu chưa có
if(isset($_GET["id"])){
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$sql ="DELETE FROM cart WHERE ma_sp='$id'";
	$rel = mysqli_query($conn,$sql);
	if (mysqli_affected_rows($conn) > 0) {
		// Xóa sản phẩm khỏi giỏ hàng trong phiên làm việc
		if(isset($_SESSION['cart'][$id])) {
			unset($_SESSION['cart'][$id]);
		}
		echo "<script>alert('Đã xóa sản phẩm khỏi giỏ hàng thành công!');</script>";
		header('location: giohang.php');
	} else {
		echo "<script>alert('Có lỗi xảy ra khi xóa sản phẩm khỏi giỏ hàng.');</script>";
	}
}
?>
