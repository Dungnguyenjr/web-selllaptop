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
        <h1 style="color:#FFF">Chỉnh sửa Hồ sơ cá nhân</h1>
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
        echo "      <td>Họ và tên</td>";
        echo "      <td><input name='txt_fullname' type='text' placeholder='Nhập đầy đủ họ tên' value='" . $row['fullname'] . "'/></td>";
        echo "  </tr>";
        echo "  <tr>";
        echo "      <td>Email</td>";
        echo "      <td><input name='txt_email' type='text' placeholder='email' value='" . $row['email'] . "'/></td>";
        echo "  </tr>";
        echo "  <tr>";
        echo "      <td>Phone</td>";
        echo "      <td><input name='txt_phone' type='text' placeholder='phone' value='" . $row['phone'] . "'/></td>";
        echo "  </tr>";
        echo "  <tr>";
        echo "      <td>Giới tính</td>";
        echo "      <td>";
        echo " 			<input type='radio' name='txt_gioitinh' value='Nam' " . ($row['gioitinh'] == 'Nam' ? 'checked' : '') . "/><label>Nam</label>";
        echo "          <input type='radio' name='txt_gioitinh' value='Nữ' " . ($row['gioitinh'] == 'Nữ' ? 'checked' : '') . "/><label>Nữ</label>";
        echo "          <input type='radio' name='txt_gioitinh' value='Khác' " . ($row['gioitinh'] == 'Khác' ? 'checked' : '') . "/><label>Khác</label>";
        echo "      </td>";
        echo "  </tr>";


        echo "  <tr>";
        echo "      <td>Quốc tịch</td>";
        echo "      <td>";
        echo "          <select name='quoctich'>";
        echo " <option value='Việt Nam' " . ($row['quoctich'] == 'Việt Nam' ? 'selected' : '') . ">Việt Nam</option>";
        echo " <option value='Mỹ' " . ($row['quoctich'] == 'Mỹ' ? 'selected' : '') . ">Mỹ</option>";
        echo " <option value='Hàn Quốc' " . ($row['quoctich'] == 'Hàn Quốc' ? 'selected' : '') . ">Hàn Quốc</option>";
        echo "          </select>";
        echo "      </td>";
        echo "  </tr>";
        echo "  <tr>";
        echo "      <td>Địa chỉ</td>";
        echo "      <td><textarea name='txt_address' placeholder='nhập địa chỉ' cols='30' rows='5'>" . $row['address'] . "</textarea></td>";
        	echo "  </tr>";
            echo "</table>";
			            echo "<input type='submit' name='update' value='lưu'>";
            echo "<div style='margin-left: 20px;'>";
            echo "<div style='width:100px;height:0px;border-radius:50%;overflow:hidden;'>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
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
    $fullname = $_POST['txt_fullname'];
    $email = $_POST['txt_email'];
    $phone = $_POST['txt_phone'];
    $gioitinh = $_POST['txt_gioitinh'];
    $quoctich = $_POST['quoctich'];
    $address = $_POST['txt_address'];

    $sql = "UPDATE dangkithanhvien SET fullname = '$fullname', email = '$email', phone = '$phone', gioitinh = '$gioitinh', quoctich = '$quoctich', address = '$address' WHERE username = '$username'";
 if ($conn->query($sql) === TRUE) {
		echo "<script>alert('Cập nhật thông tin thành công!');</script>";
    } else {
        echo "Lỗi cập nhật thông tin: " . $conn->error;
    }
}
exit();
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