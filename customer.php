<?php

require_once("connect.php");


//quản lý danh mục khách hàng
$ma_khachhang = isset($_POST["ma_khachhang"])?$_POST["ma_khachhang"]:"";
$tenkhachhang = isset($_POST["tenkhachhang"])?$_POST["tenkhachhang"]:"";
$dienthoai = isset($_POST["dienthoai"])?$_POST["dienthoai"]:"";
$email = isset($_POST["email"])?$_POST["email"]:"";
$tinhthanhpho = isset($_POST["tinhthanhpho"])?$_POST["tinhthanhpho"]:"";
$quanhuyen = isset($_POST["quanhuyen"])?$_POST["quanhuyen"]:"";
$diachigiaohang = isset($_POST["diachigiaohang"])?$_POST["diachigiaohang"]:"";
if(isset($_POST["btn_submit"]))
{
	$sql = "SELECT * FROM customer WHERE ma_khachhang ='$ma_khachhang'";
	$rel = mysqli_query($conn,$sql);
	if(mysqli_num_rows($rel)>0)
	{
		echo "Đã tồn tại mã khách hàng này";
	}
	else
	{
		$sql1 = "INSERT INTO customer VALUE(`ma_khachhang`, `tenkhachhang`, `email`, `phone`, `tinhthanhpho`, `quanhuyen`,`diachigiaohang`)";
		$rel1 = mysqli_query($conn,$sql1);
		echo "Bạn đã lưu thành công";
	}
}
?>
    <table class="center" width="1000" border="1">
    	<tr>
        	<td>Mã khách hàng</td>
            <td>Tên khách hàng</td>
            <td>Số điện thoại</td>
            <td>Email</td>
            <td>Tỉnh thành phố</td>
            <td>Quận huyện</td>
            <td>Địa chỉ giao hàng</td>
            <td>Xóa</td>
            <td>Sửa</td>
        </tr>
        <?php
		$sql2 = "SELECT * FROM customer";
		$rel2 = mysqli_query($conn,$sql2);
		while($r = mysqli_fetch_assoc($rel2))
		{
			//var_dump($r);
		?>
            <tr>
            	<td>
                	<?php echo $r["ma_khachhang"];?>
                </td>
                <td>
                	<?php echo $r["tenkhachhang"];?>
                </td>
                <td>
                	<?php echo $r["phone"];?>
                </td>
                <td>
                	<?php echo $r["email"];?>
                </td>
                <td>
                	<?php echo $r["tinhthanhpho"];?>
                </td>
                <td>
                	<?php echo $r["quanhuyen"];?>
                </td>
                <td>
                	<?php echo $r["diachigiaohang"];?>
                </td>
                <td>
                	<a href="delete_customer.php?id=<?php echo $r["ma_khachhang"] ?>" style="color: #333">
                    	Xóa
                    </a>
                </td>
                <td>
                	<a href="update_customer.php?id=<?php echo $r["ma_khachhang"] ?>"style="color: #333">
                    	Sửa
                    </a>
                </td>
            </tr>
        <?php
		}
		?>
    </table>
</form>
 