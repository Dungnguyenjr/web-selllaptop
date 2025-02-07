<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link href="stylequantri.css" rel="stylesheet">
</head>
<style>
		.admin-table {
            width: 80%;
            border-collapse: collapse;
			margin-left: auto;
    margin-right: auto;
        }

        .admin-table th, .admin-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
		.admin-table td {
			text-align: center;
		}
        .admin-table th {
            color: white;
        } 
        </style>
<body>
    <div class="admin">
        <!--Nội dung-->
        <div class="admin-header">
            <h2 align="center">Quản Lý Đơn Đặt Hàng</h2>
        </div>

        <!-- Hiển thị danh sách đơn hàng -->
        <table class="admin-table">
            <tr align="center">
                <th>Mã Hóa Đơn</th>
                <th>Mã Khách Hàng</th>
                <th>Tên Khách Hàng</th>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Số Điện Thoại</th>
                <th>Địa Chỉ Giao Hàng</th>
                <th>Tổng Tiền</th>
                <th>Ngày Đặt</th>
                <th>Trạng Thái</th>
                <th>Chi tiết đơn hàng</th>
                <th>Chỉnh Sửa</th>
            </tr>
           <?php
    // Kết nối đến cơ sở dữ liệu
    require_once("connect.php");

    // Truy vấn danh sách đơn hàng
    $sql = "SELECT DISTINCT `order`.ma_hoadon, customer.ma_khachhang, customer.tenkhachhang, oderdetail.tensp, oderdetail.soluong, customer.phone, customer.diachigiaohang, `order`.tongtien,`order`.createdate, `order`.trangthai
    FROM `order`
    INNER JOIN customer ON `order`.ma_khachhang = customer.ma_khachhang
    INNER JOIN oderdetail ON `order`.ma_hoadon = oderdetail.ma_hoadon";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr align='center'>";
            echo "<td>" . $row['ma_hoadon'] . "</td>";
            echo "<td>" . $row['ma_khachhang'] . "</td>";
            echo "<td>" . $row['tenkhachhang'] . "</td>";
			echo "<td>" . $row['tensp'] . "</td>";
			echo "<td>" . $row['soluong'] . "</td>";
			echo "<td>" . $row['phone'] . "</td>";
			echo "<td>" . $row['diachigiaohang'] . "</td>";
			echo "<td>" . $row['tongtien'] . "</td>";
            echo "<td>" . $row['createdate'] . "</td>"; 
            echo "<td>" . $row['trangthai'] . "</td>";
			 echo "<td><a href='chitietdonhangxemadmin.php?ma_hoadon=" . $row['ma_hoadon'] . "' style='color: black;'>Xem chi tiết</a></td>"; 
           echo "<td><a href='thaydoitrangthaidonhang.php?ma_hoadon=" . $row['ma_hoadon'] . "' style='color: black;'>Chỉnh sửa</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='9'>Không có đơn đặt hàng nào.</td></tr>";
    }

    // Đóng kết nối cơ sở dữ liệu
    mysqli_close($conn);
?>
        </table>