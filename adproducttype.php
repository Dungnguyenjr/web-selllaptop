<?php
require_once("connect.php");
$txt_maloaisp=isset($_POST["txt_maloaisp"])?$_POST["txt_maloaisp"]:"";
$txt_tenloaisp=isset($_POST["txt_tenloaisp"])?$_POST["txt_tenloaisp"]:"";
$txt_motaloaisp=isset($_POST["txt_motaloaisp"])?$_POST["txt_motaloaisp"]:"";
if(isset($_POST["btn_save"])){
	$sql="SELECT * FROM adproducttype where ma_loaisp = '$txt_maloaisp'";
	$rel= mysqli_query($conn,$sql);
	if(mysqli_num_rows($rel)>0){
		echo "đã tồn tại sản phẩm này";
	}else{
		$sql1="INSERT INTO adproducttype VALUE ('$txt_maloaisp','$txt_tenloaisp','$txt_motaloaisp')";
		$rel1=mysqli_query($conn,$sql1);
		echo"bạn đã thêm thành công";
	}
}
?>
<form action="" method="post">
<table width="700" border="1">
  <tr>
    <td><input name="txt_maloaisp" type="text" placeholder="mã sản phẩm"></td>
    <td><input name="txt_tenloaisp" type="text" placeholder="tên sản phảm"></td>
    <td><input name="txt_motaloaisp" type="text" placeholder="mô tả sản phẩm"></td>
    <td><input name="btn_save" type="submit" value="Lưu"></td>
  </tr>
</table>
<table>
  <tr>
  	<td colspan="5">Quản lý danh mục loại sản phẩm</td>
  </tr>
  <tr>
    <td>Mã loại sản phẩm</td>
    <td>Tên loại sản phẩm</td>
    <td>Mô tả loại sản phẩm</td>
    <td>xóa</td>
    <td>sửa</td>
  </tr>
  <?php
  	$sql2="SELECT * FROM adproducttype ";
	$rel2=mysqli_query($conn,$sql2);
	while ($r=mysqli_fetch_assoc($rel2)){
		?>
    <tr>
    	<td><?php echo $r['ma_loaisp'] ?></td>
    	<td><?php echo $r['ten_loaisp'] ?></td>
    	<td><?php echo $r['mota_loaisp'] ?></td>
		<td>
        <a href="xoasp.php?id=<?php echo $r['ma_loaisp'];?>" style="color: #333" >Xóa</a>
        </td>
        <td>
         <a href="quantri.php?action=updateloaisp&id=<?php echo $r['ma_loaisp']; ?>" style="color: #333"">Sửa</a>
</td>
  	</tr>
    <?php
	}
  ?>
</table>
</form>