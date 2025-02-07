<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>website bán hàng</title>
    <link href="style12.css" rel="stylesheet" type="text/css" />
    <link href="all.min.css" rel="stylesheet" type="text/css" />
</head>
<style> 
	.element.style {
    color: white;
}</style> 
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
session_start();
require_once("connect.php");
if (isset($_POST["btn_login"])) {
    $txt_username = $_POST["txt_username"];
    $txt_password = $_POST["txt_password"];
    $sql = "SELECT * FROM dangkithanhvien WHERE username='$txt_username' AND password='$txt_password'";
    $rel = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rel) > 0) {
        $row = mysqli_fetch_assoc($rel);
        $_SESSION['username'] = $txt_username;
        $_SESSION['level'] = $row['level'];
        if ($row['level'] == "Quantri") {
            header("location: quantri.php");
        } else if ($row['level'] == "Nguoidung") {
            header("location: index.php");
        }
    } else {
        echo "<script>alert('Bạn đã nhập sai tên đăng nhập hoặc mật khẩu vui lòng Đăng nhập lại');</script>";
    }
}

?>
<form action="" method="post">
    <section class="ban.jpn"></section>
    <table width="500" border="1" style="text-align:center" >
        <tr>
            <td colspan="2" style="text-align:center; color:black; font-size:30px; font-weight:bold"> ĐĂNG NHẬP  </td>
        </tr>
        <tr>
            <td>Tên đăng nhập</td>
            <td><input name="txt_username" type="text"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input name="txt_password" type="password"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input name="btn_login" type="submit" value="Đăng nhập">
                 <p><a href="quenmatkhau.php" style="color:#FFF">Quên mật khẩu?</a></p>
            </td>
        </tr>
    </table>
</form>
</div>
</body>
</html>