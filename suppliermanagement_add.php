<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link href="stylequantri.css" rel="stylesheet">
</head>

<body>
    <div class="admin">
        <!--Nội dung-->
<?php
require_once("connect.php");

$email =isset($_POST["email"])?$_POST["email"]:"";
$tennhacungcap=isset($_POST["tennhacungcap"])?$_POST["tennhacungcap"]:"";
$phone =isset($_POST["phone"])?$_POST["phone"]:"";
$diachinhacungcap=isset($_POST["diachinhacungcap"])?$_POST["diachinhacungcap"]:"";

if(isset($_POST["btn_save"])) {
    $sql="SELECT * FROM suppliermanagement where tennhacungcap='$tennhacungcap'";
    $rel=mysqli_query($conn, $sql);
    if(mysqli_num_rows($rel)>0){
        echo "đã tồn tại mã sản phẩm này";
    }else{
        $sql="INSERT INTO suppliermanagement (`tennhacungcap`, `phone`, `email`, `diachinhacungcap`) VALUES ( '$tennhacungcap', '$phone', '$email', '$diachinhacungcap')";
        $rel5=mysqli_query($conn,$sql);
         echo "<script>alert('Bạn đã thêm thông tin thành công!');</script>";
        header("Refresh: 2; url=quantri.php?action=suppliermanagement");
        exit();
    }
}
?>
<form action="" method="post" enctype="multipart/form-data" >
<table width="600" border="1">
  <tr>
     <td colspan="2" style="text-align:center">Thêm mới nhà cung cấp</td>
    </tr>
       <tr>
    <td>Tên nhà cung cấp</td>
     <td><input name="tennhacungcap" type="text"></td>
  </tr>
    <tr>
    <td>Số điện thoại</td>
     <td><input name="phone" type="text"></td>
      </tr>
       <tr>
        <td>Email </td>
        <td><input name="email" type="text"></td>
      </tr>
    <tr>
    <td>địa chỉ</td>
     <td><input name="diachinhacungcap" type="text"></td>
      </tr>
  <tr align="center">
 <td colspan="2" style="text-align: center;"><input name="btn_save" type="submit" value="Thêm mới"></td>
  </tr>
</table>
</form>
 </div>
</body>
</html>