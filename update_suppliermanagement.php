<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link href="stylequantri.css" rel="stylesheet" type="text/css" />
    
</head>

<body>
    <div class="admin">
        <!--Nội dung-->
<?php
require_once("connect.php");

$tennhacungcap = $_GET["id"];
$sql = "SELECT * FROM suppliermanagement WHERE tennhacungcap = '$tennhacungcap'";
$rel = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($rel);

if (!$row) {
    echo "Không tìm thấy nhà cung cấp";
    exit();
}

$tennhacungcap = $row['tennhacungcap'];
$phone = $row['phone'];
$email = $row['email'];
$diachinhacungcap = $row['diachinhacungcap'];
$date = $row['date'];

if (isset($_POST["btn_load"])) {
    $tennhacungcap_post = isset($_POST["tennhacungcap"]) ? $_POST["tennhacungcap"] : "";
    $phone_post = isset($_POST["phone"]) ? $_POST["phone"] : "";
    $email_post = isset($_POST["email"]) ? $_POST["email"] : "";
    $diachinhacungcap_post = isset($_POST["diachinhacungcap"]) ? $_POST["diachinhacungcap"] : "";

    $sql1 = "UPDATE suppliermanagement SET tennhacungcap='$tennhacungcap_post', phone='$phone_post', email='$email_post', diachinhacungcap='$diachinhacungcap_post' WHERE tennhacungcap='$tennhacungcap'";
    $rel1 = mysqli_query($conn, $sql1);

		if ($rel1) {
			echo "<script>alert('Bạn đã sửa thông tin thành công!'); window.location = 'quantri.php?action=suppliermanagement';</script>";
			exit();
			} else {
				echo "Có lỗi xảy ra khi sửa thông tin: " . mysqli_error($conn);
				exit();
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <table align="center" width="600" border="1">
  <tr align="center">
     <td colspan="2">Sửa nhà cung cấp</td>
    </tr>
       <tr>
    <td>Tên nhà cung cấp</td>
     <td><input name="tennhacungcap" type="text" value="<?php echo $tennhacungcap; ?>"></td>
  </tr>
    <tr>
            <td>Số điện thoại</td>
            <td><input name="phone" value="<?php echo $phone; ?>"></td>
        </tr>
       <tr>
        <td>Email </td>
        <td><input name="email" type="text" value="<?php echo $email; ?>"></td>
      </tr>
    <tr>
    <td>Địa chỉ</td>
     <td><input name="diachinhacungcap" type="text" value="<?php echo $diachinhacungcap; ?>"></td>
      </tr>
  <tr>
            <td colspan="2" style="text-align: center;"><input name="btn_load" type="submit" value="sửa"></td>
        </tr>
    </table>
</form>
</div>
</body>
</html>