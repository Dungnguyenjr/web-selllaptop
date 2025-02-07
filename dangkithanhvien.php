<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>website bán hàng</title>
    <link href="style12.css" rel="stylesheet" type="text/css" />
    <link href="all.min.css" rel="stylesheet" type="text/css" />
    <style>
        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
        
<body>
 <nav>
<label class="logo">MINISO VIETNAM</label>
     <ul>
                    <li><a href="index.php" >Trang chủ</a></li>
                    <li><a href="#" >Sản phẩm</a></li>
                    <li><a href="#" >Đơn hàng</a></li>
                    <li><a href='dangkithanhvien.php' >Đăng ký</a></li>
                    <li><a href='login.php'>Đăng nhập</a></li>
                </ul>
            </nav>
    <div class="featuredProducts">
        <h1>Đăng ký</h1>
    </div>
    <div class="container-single">
        <div class="login">
            <form style="color:black" action="dangkithanhvien.php" method="post" class="form-login">
    <div class="main">
<?php
session_start();
require_once("connect.php");
if(isset($_POST["btn_dangkithanhvien"])){
	$txt_fullname = $_POST['txt_fullname'];
	$txt_username = $_POST['txt_username'];
	$txt_password = $_POST['txt_password'];
	$txt_email = $_POST['txt_email'];
	$txt_phone = $_POST['txt_phone']; 
	$txt_gioitinh = isset($_POST['txt_gioitinh'])?$_POST["txt_gioitinh"]:"";
	$quoctich = $_POST['quoctich']; 
	$txt_address = $_POST['txt_address'];
	
	//sở thích
	$txt_xemphim=isset($_POST["txt_xemphim"])?$_POST["txt_xemphim"]:"";
	$txt_thethao=isset($_POST["txt_thethao"])?$_POST["txt_thethao"]:"";
	$txt_web=$_POST["txt_web"];
	$sothich=array($txt_xemphim,$txt_thethao,$txt_web);
	$sothichCD=implode(",",$sothich);
	$mucdotruycap=isset($_POST["mucdotruycap"])?$_POST["mucdotruycap"]:"";
	$sql="SELECT * FROM dangkithanhvien WHERE username='$txt_username'";
	$rel=mysqli_query($conn,$sql);
	if(mysqli_num_rows($rel)>0){
		echo"đã tồn tại tên đăng nhâp này";
	}else{
		$sql1="INSERT INTO dangkithanhvien VALUE('$txt_fullname','$txt_username','$txt_password','$txt_email','$txt_phone','$txt_gioitinh','$quoctich','$txt_address','sothichCD','$mucdotruycap')";
		$rel1=mysqli_query($conn,$sql1);
		if ($rel1) {
			echo "Bạn đã lưu thành công";
		} else {
			echo "Lỗi: " . mysqli_error($conn);
		}
	}
}
?>
<form action="" method="post" enctype="multipart/form-data">
 <section class="ban.jpn"></section>
            <table style="text-align:center; width: 110%;">	
    <tr > 
    <table width="1000%" class="dangkithanhvien">
    </tr>
        <tr>
            <td colspan="2" class="white-text" style="text-align:center; color:black; font-size:30px; font-weight:bold">ĐĂNG KÝ </td>
        </tr>
        <tr>
            <td style="color:black">Fullname</td>
            <td><input name="txt_fullname" type="text" placeholder="Nhập đầy đủ họ tên"/></td>
        </tr>
        <tr>
            <td style="color:black">Username</td>
            <td><input name="txt_username" type="text" placeholder="Nhập tên đăng nhập"/></td>
        </tr>
        <tr>
            <td style="color:black">Password</td>
            <td><input name="txt_password" type="password" placeholder="Nhập mật khẩu"/></td>
        </tr>
        <tr>
            <td style="color:black">Email</td>
            <td><input name="txt_email" type="text"/></td>
        </tr>
        <tr>
            <td style="color:black">Phone</td>
            <td><input name="txt_phone" type="text"/></td>
        </tr>
        <tr>
            <td style="color:black">Giới tính</td>
            <td style="color:black">
            	<input type="radio" name="txt_gioitinh" value="Nam" checked="checked"/>Nam
                <input type="radio" name="txt_gioitinh" value="Nũ"/>Nữ
            </td>
        </tr>
        <tr>
            <td style="color:black">Quốc tịch</td>
            <td>

                <select name="quoctich">
                    <option value="Mỹ">Mỹ</option>
                    <option value="Việt Nam" selected="selected">Việt Nam</option>
                    <option value="Hàn Quốc">Hàn Quốc</option>
                </select>
            </td>
        </tr>

        <tr>
            <td style="color:black">Địa chỉ</td>
            <td>
                <textarea name="txt_address" placeholder="nhập địa chỉ" cols="30" rows="5"></textarea>
            </td>
        </tr>
        <tr>
            <td style="color:black">Sở thích</td>
            <td style="color:black">
                <input type="checkbox" name="txt_xemphim" value="Xem phim"/>Xem Phim <br/>
                <input name="txt_thethao" type="checkbox" value="Thể thao"/>Thể thao<br/>
                <input name="txt_web" type="checkbox" value="Web" checked="checked"/>Web
            </td>
        </tr>

        <tr>
            <td style="color:black">Mức độ truy cập</td>
            <td>
                <select name="mucdotruycap">
                    <option value="Nguoidung" selected="selected">Người dùng</option>
                </select>
            </td>
        </tr>

        <tr>
            <td colspan="2" style="text-align:center">
                <input type="submit" name="btn_dangkithanhvien" value="ĐĂNG KÝ THÀNH VIÊN"/>
                <input type="reset" name="Reset" value="Reset"/>
            </td>
        </tr>

    </table>
</form>