<?php
require_once('connect.php');


// Lấy giá trị "mahd" từ URL
$mahd = isset($_GET["ma_hoadon"]) ? $_GET["ma_hoadon"] : "";

// Kiểm tra nếu mahd không tồn tại
if (empty($mahd)) {
    echo "Mã hóa đơn không hợp lệ.";
    exit;
}

// Truy vấn thông tin đơn hàng từ bảng lichsumuahang
$sql_order = "SELECT * FROM canceledgoods WHERE ma_hoadon  = '$mahd '";
$result_order = mysqli_query($conn, $sql_order);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title>Lịch sử mua hàng</title>
<link href="style1.css" rel="stylesheet" type="text/css"/>
</head>
    <style>
        /* Thêm CSS cho bảng nếu cần */
           body {
                        font-family: Arial, sans-serif;
                        background-color: #f5f5f5;
                    }
                    table {
						max-width: 2000px;
						margin: 20px auto;
						padding: 20px;
						background-color: #fff;
						border: 1px solid darkviolet; /* Thay #ccc bằng blue */
						border-radius: 5px;
					}
                    h1 {
                        text-align: center;
                        color: #FFF;
                    }
                    th, td {
                        padding: 10px;
                        text-align: left;
                        border-bottom: 1px solid #ddd;
                    }
                    th {
                        background-color: #90F;
                        color: #fff;
                    }
    </style>
 </head>
         <body>
	<div class="main">
        <!-- code header -->
        <?php require_once("header.php") ?>
        <!-- code content -->
        <div class="content">
            <div class="featuredProducts">
                <h1>Chi Tiết lịch sử Đơn Hàng</h1>
            </div>  
    

    <?php
    if ($result_order && mysqli_num_rows($result_order) > 0) {
        ?>
<table style="width:100%; border: 1px solid black; border-collapse: collapse;">
    <tr style="background-color: #f2f2f2;">
        <th>Mã Hóa Đơn</th>
        <th>Mã Khách Hàng</th>
        <th>Tên Khách Hàng</th>
        <th>Mã sản phẩm</th>
        <th>Tên Sản Phẩm</th>
        <th>Số Lượng</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Tỉnh thành phố</th>
        <th>Quận huyện</th>
        <th>Địa chỉ giao hàng</th>
        <th>Thành Tiền</th>
        <th>Ngày Mua Hàng</th>
        <th>Tình trạng</th>
    </tr>
    <?php
        // Hiển thị tất cả các mục trong đơn hàng có cùng mã hóa đơn
       

        while ($order_info = mysqli_fetch_assoc($result_order)) {
            ?>
            <tr>
                <td><?php echo $order_info['ma_hoadon']; ?></td>
                <td><?php echo $order_info['ma_khachhang']; ?></td>
                <td><?php echo $order_info['tenkhachhang']; ?></td>
                <td><?php echo $order_info['masp']; ?></td>
                <td><?php echo $order_info['tensp']; ?></td>
                <td><?php echo $order_info['soluong']; ?></td>
                <td><?php echo $order_info['phone']; ?></td>
                <td><?php echo $order_info['email']; ?></td>
                <td><?php echo $order_info['tinhthanhpho']; ?></td>
                <td><?php echo $order_info['quanhuyen']; ?></td>
                <td><?php echo $order_info['diachigiaohang']; ?></td>
                <td><?php echo $order_info['giaxuat']; ?></td>
                <td><?php echo $order_info['createdate']; ?></td>
                <td><?php echo $order_info['trangthai']; ?></td>
             </tr>
                    <?php
                    }
                    ?>
                </table>
            <?php
            } else {
                echo "Không có thông tin chi tiết đơn hàng.";
            }

            // Đóng kết nối cơ sở dữ liệu
            mysqli_close($conn);
            ?>
        </div>
    </div>
</body>
</html>