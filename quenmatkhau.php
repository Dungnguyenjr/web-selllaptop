<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>website bán hàng</title>
    <link href="style12.css" rel="stylesheet" type="text/css" />
    <link href="all.min.css" rel="stylesheet" type="text/css" />
</head>
  
<body>
 <nav>
<label class="logo">MINISO VIETNAM</label>
				 <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="#" >Sản phẩm</a></li>
                    <li><a href="#" >Đơn hàng</a></li>
                    <li><a href='dangkithanhvien.php' >Đăng ký</a></li>
                    <li><a href='login.php' >Đăng nhập</a></li>
                </ul>
            </nav>

    <div class="container-single">
        <div class="login">
            <form action="login.php" method="post" class="form-login">
    <div class="main">

<?php
require_once("connect.php");

// Quên mật khẩu
if (isset($_POST["btn_forgot"])) {
    $txt_username = $_POST["txt_username"];
    $sql = "SELECT * FROM dangkithanhvien WHERE username='$txt_username'";
    $rel = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rel) > 0) {
        $row = mysqli_fetch_assoc($rel);
        echo "<script>alert('Mật khẩu của bạn là: " . $row['password'] . "');</script>";
    } else {
        echo "<script>alert('Tên đăng nhập không tồn tại!');</script>";
    }
}
?>
<!-- Đoạn mã HTML cho form quên mật khẩu -->
<form action="" method="post">
    <table width="500" border="1" style="text-align:center" >
        <tr>
            <td colspan="2" style="color:black"> QUÊN MẬT KHẨU  </td>
        </tr>
        <tr>
            <td style="color:black">Tên đăng nhập</td>
            <td><input name="txt_username" type="text"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input name="btn_forgot" type="submit" value="Lấy lại mật khẩu">
            </td>
        </tr>
    </table>
</form>
</div>
</body>
</html>