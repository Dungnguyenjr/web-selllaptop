<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>website bán hàng</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
<link href="all.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
 <label class="logo">REBUBLIC OF GAMER</label>
 <div class="main">
    <!-- code header -->
    <?php require_once("header.php")?>
    <!-- code content -->
    <div class="content">
    <div class="featuredProducts">
        <h1 style="color:#FFF">Đổi mất khẩu</h1>
    </div>
  <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Product Display</title>
</head>

<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
            background-color: #fff;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }
		 .radio-inline {
            display: inline-block;
            margin-right: 20px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #ff8cad;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #90F;
        }
    </style>
<body>
<?php

require_once("connect.php");

// Kết nối đến cơ sở dữ liệu (điều chỉnh thông tin kết nối của bạn)
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'miniso';

$conn = mysqli_connect($hostname, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

// Lấy thông tin đăng nhập từ cơ sở dữ liệu dựa trên username
// Giả sử rằng username được lưu trong biến $_SESSION['username'] sau khi người dùng đăng nhập
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM dangkithanhvien WHERE username = '$username'";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Hiển thị thông tin lên màn hình
    while ($row = $result->fetch_assoc()) {
			echo "<form method='post' action='' enctype='multipart/form-data'>";
			echo "<table style='width: 100%;'>";
			echo "  <tr>";
			echo "      <td>Mật khẩu cũ</td>";
			echo "      <td><input name='old_password' type='password' placeholder='Nhập mật khẩu cũ' /></td>";
			echo "  </tr>";
			echo "  <tr>";
			echo "      <td>Mật khẩu mới</td>";
			echo "      <td><input name='new_password' type='password' placeholder='Nhập mật khẩu mới' /></td>";
			echo "  </tr>";
			echo "  <tr>";
			echo "      <td>Nhập lại mật khẩu mới</td>";
			echo "      <td><input name='confirm_new_password' type='password' placeholder='Nhập lại mật khẩu mới' /></td>";
			echo "  </tr>";
			echo "</table>";
			echo "      <td><input type='submit' name='update' value='lưu'></td>";
			echo "</form>";
    }
} else {
    echo "Không tìm thấy thông tin đăng nhập cho username '$username'";
}
} else {
    echo "Session 'username' is not set.";
}

// Nếu người dùng nhấn nút 'lưu', cập nhật thông tin trong cơ sở dữ liệu
if (isset($_POST['update'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    if ($new_password != $confirm_new_password) {
        echo"<script>alert('Mật khẩu mới và mật khẩu xác nhận không đúng vui lòng thử lại');</script>";
        return;
    }

    $check_password = "SELECT password FROM dangkithanhvien WHERE username = '$username'";
    $result = $conn->query($check_password);
    $row = $result->fetch_assoc();
    if ($row['password'] != $old_password) {
       echo"<script>alert('Mật khẩu cũ không đúng');</script>";
        return;
    }

    $sql = "UPDATE dangkithanhvien SET password = '$new_password' WHERE username = '$username'";
    if ($conn->query($sql) === TRUE) {
        echo"<script>alert('Đổi mật khẩu thành công');</script>";
    } else {
      echo"<script>alert('Lỗi đổi mật khẩu vui lòng thử lại');</script>" . $conn->error;
    }
}
    
// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>
  </div>
</body>

</html>
        <div class="content_left"></div>
        <div class="content_center"></div>
        <div class="content_right"></div>
    </div>
 
    <!-- code footer -->
  
  </div>
</body>
</html>