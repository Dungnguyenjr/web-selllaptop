<?php
require_once("connect.php");
$ma_loaisp =isset($_POST["ma_loaisp"])?$_POST["ma_loaisp"]:"";
$ma_sp =isset($_POST["ma_sp"])?$_POST["ma_sp"]:"";
$ten_sp =isset($_POST["ten_sp"])?$_POST["ten_sp"]:"";
$hinhanh =isset($_FILES["hinhanh"])?$_FILES["hinhanh"]["name"]:"";
$gianhap =isset($_POST["gianhap"])?$_POST["gianhap"]:"";
$giaxuat =isset($_POST["giaxuat"])?$_POST["giaxuat"]:"";
$khuyenmai =isset($_POST["khuyenmai"])?$_POST["khuyenmai"]:"";
$soluong =isset($_POST["soluong"])?$_POST["soluong"]:"";
$mota_sp =isset($_POST["mota_sp"])?$_POST["mota_sp"]:"";
$create_date =isset($_POST["create_date"])?$_POST["create_date"]:"";
    if(isset($_POST["btn_save"])) {
        $sql="SELECT * FROM adproduct where ma_sp='$ma_sp'";
        $rel=mysqli_query($conn, $sql);
        if(mysqli_num_rows($rel)>0){
		echo "đã tồn tại mã sản phẩm này";
	}else{
		$sql2="INSERT INTO adproduct VALUE('$ma_loaisp','$ma_sp','$ten_sp','$hinhanh','$gianhap','$giaxuat','$khuyenmai','$soluong','$mota_sp','$create_date')";
		$rel2=mysqli_query($conn,$sql2);
	echo "<script>alert('Bạn đã nhập thành công!');</script>";
    header("Refresh: 2; url=adproduct.php");
	}
}
?>
<form action="" method="post" enctype="multipart/form-data" >
<table width="600" border="1">
  <tr>
     <td colspan="2" style="text-align:center">Thêm mới sản phẩm</td>
    </tr>
    <tr>
    <td width="183" >Mã loại sản phẩm</td>
    <td width="428" >
    <?php
		$sql="SELECT * FROM adproducttype ";
		$rel=mysqli_query($conn,$sql);
	?>
    	<select name="ma_loaisp">
      <?php
  if(mysqli_num_rows($rel)>0){
	while ($r=mysqli_fetch_assoc($rel)){
?>
    <option value="<?php echo $r["ma_loaisp"]?>">
    <?php echo $r["ma_loaisp"]?>
    </option>
  <?php
	}	
}
?>

        </select>
    </td>
  </tr>
  <tr>
     <td>Mã sản phẩm</td>
     <td><input name="ma_sp" type="text"></td>
     </tr>
    <tr>
    <td>Tên sản phẩm</td>
     <td><input name="ten_sp" type="text"></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    	<?php
                    if (isset($_FILES["hinhanh"])) {
                        $file_name = $_FILES["hinhanh"]["name"]; //tên file
                        $file_tmp = $_FILES["hinhanh"]["tmp_name"];
                        if (empty($errors) == true) {
                            move_uploaded_file($file_tmp, "images/" . $file_name);
                        }
                    }
                    ?>
     <td><input type="file" name="hinhanh"></td>
      </tr>
    <tr>
    <td>Giá nhập</td>
     <td><input name="gianhap" type="text"></td>
      </tr>
    <tr>
    <td>Giá xuất</td>
     <td><input name="giaxuat" type="text"></td>
      </tr>
    <tr>
    <td>Khuyến mại</td>
     <td><input name="khuyenmai" type="text"></td>
     </tr>
     <tr>
    <td>Số lượng</td>
     <td><input name="soluong" type="text"></td>
     </tr>
     <tr>
    <td>Mô tả sản phẩm</td>
     <td><textarea name="mota_sp" cols="40" rows="5">
     </textarea></td>
     </tr>
 <tr>
    <td>Ngày tạo</td>
    <td><input name="create_date" type="date"></td>
  </tr>
  <tr>
  <td colspan="2" style="text-align:center;">
    <input name="btn_save" type="submit" value="Cập nhật">
  </td>
</tr>
</table>
</form>