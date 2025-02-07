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

$id = $_GET["id"];
$sql = "SELECT * FROM customer WHERE ma_khachhang = '$id'";
$rel = mysqli_query($conn, $sql);
$khachhang = mysqli_fetch_assoc($rel);

if (!$khachhang) {
    echo "Không tìm thấy khách hàng";
    exit();
}

$ma_khachhang = isset($_POST["ma_khachhang"]) ? $_POST["ma_khachhang"] : $khachhang["ma_khachhang"];
$tenkhachhang = isset($_POST["tenkhachhang"]) ? $_POST["tenkhachhang"] : $khachhang["tenkhachhang"];
$email = isset($_POST["email"]) ? $_POST["email"] : $khachhang["email"];
$phone = isset($_POST["phone"]) ? $_POST["phone"] : $khachhang["phone"];
$tinhthanhpho = isset($_POST["tinhthanhpho"]) ? $_POST["tinhthanhpho"] : $khachhang["tinhthanhpho"];
$quanhuyen = isset($_POST["quanhuyen"]) ? $_POST["quanhuyen"] : $khachhang["quanhuyen"];
$diachigiaohang = isset($_POST["diachigiaohang"]) ? $_POST["diachigiaohang"] : $khachhang["diachigiaohang"];


if (isset($_POST["btn_update"])) {
    $sql1 = "UPDATE customer SET ma_khachhang='$ma_khachhang', tenkhachhang='$tenkhachhang', email='$email', phone='$phone', tinhthanhpho='$tinhthanhpho', quanhuyen='$quanhuyen', diachigiaohang='$diachigiaohang' WHERE ma_khachhang='$id'";
    $rel1 = mysqli_query($conn, $sql1);

    if ($rel1) {
        echo "<script>alert('Bạn đã sửa thông tin thành công!');</script>";
        header("Refresh: 2; url=quantri.php?action=customer");
        exit();
    } else {
        echo "Có lỗi xảy ra khi sửa thông tin: " . mysqli_error($conn);
        exit();
    }
}
?>

<form action="" method="post">
    <table class="center" width="500" border="1">
        <tr>
            <td colspan="2">Thông tin khách hàng</td>
        </tr>
        <tr>
            <td>Mã khách hàng</td>
            <td><?php echo $khachhang["ma_khachhang"]; ?></td>
        </tr>
        <tr>
            <td>Tên khách hàng</td>
            <td><input name="tenkhachhang" type="text" value="<?php echo $tenkhachhang; ?>"></td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input name="phone" value="<?php echo $phone; ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input name="email" value="<?php echo $email; ?>"></td>
        </tr>
        <tr>
            <td>Tỉnh Thành Phố</td>
            <td><input name="tinhthanhpho" value="<?php echo $tinhthanhpho; ?>"></td>
        </tr>
        <tr>
            <td>Quận Huyện</td>
            <td><input name="quanhuyen" value="<?php echo $quanhuyen; ?>"></td>
        </tr>
        <tr>
            <td>Địa chỉ giao hàng</td>
            <td><input name="diachigiaohang" value="<?php echo $diachigiaohang; ?>"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center; font-size:30px; font-weight:bold">
                <input name="btn_update" type="submit" value="Sửa">
            </td>
        </tr>
    </table>
</form>
</div>
</body>
</html>