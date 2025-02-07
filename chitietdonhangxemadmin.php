<?php
require_once("connect.php");

if (isset($_GET['ma_hoadon'])) {
    $ma_hoadon = $_GET['ma_hoadon'];

    // Lấy thông tin đơn hàng
    $sql_order = "SELECT * FROM `order` WHERE ma_hoadon = '$ma_hoadon'";
    $result_order = mysqli_query($conn, $sql_order);

    if ($result_order && mysqli_num_rows($result_order) > 0) {
        $order = mysqli_fetch_assoc($result_order);
        $ma_khachhang = $order['ma_khachhang'];

        // Lấy thông tin khách hàng
        $sql_customer = "SELECT * FROM customer WHERE ma_khachhang = '$ma_khachhang'";
        $result_customer = mysqli_query($conn, $sql_customer);

        if ($result_customer && mysqli_num_rows($result_customer) > 0) {
            $customer = mysqli_fetch_assoc($result_customer);

            // Lấy thông tin chi tiết đơn hàng
            $sql_order_detail = "SELECT * FROM oderdetail  WHERE oderdetail.ma_hoadon = '$ma_hoadon'";
			
            $result_oderdetail = mysqli_query($conn, $sql_order_detail);
            ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link href="stylequantri.css" rel="stylesheet">
    <style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    border: 3px solid white;
}

th, td {
    padding: 20px;
    text-align: center;
}

        </style>
</head>
	<div class="main">
        <!-- code content -->
        <div class="content">
            <div class="featuredProducts">
                <h1 align="center">Chi Tiết Đơn Hàng</h1>
            </div>  

                <h2 align="center">Thông Tin Khách Hàng</h2>
                <table>
                    <tr>
                         <th>Mã Khách Hàng</th>
        <th>Tên Khách Hàng</th>
        <th>Số Điện Thoại</th>
        <th>Email</th>
        <th>Tỉnh thành phố</th>
        <th>Quận huyện</th>
        <th>Địa chỉ giao hàng</th>
                    </tr>
                    <tr>
                        <td><?php echo $customer['ma_khachhang']; ?></td>
                        <td><?php echo $customer['tenkhachhang']; ?></td>
                        <td><?php echo $customer['phone']; ?></td>
                        <td><?php echo $customer['email']; ?></td>
						<td><?php echo $customer['tinhthanhpho']; ?></td>
                        <td><?php echo $customer['quanhuyen']; ?></td>
                        <td><?php echo $customer['diachigiaohang']; ?></td>
                    </tr>
                </table>

                <h2 align="center">Chi Tiết Sản Phẩm</h2>
                <table>
                    <tr>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá Bán</th>
                        <th>Hình Ảnh</th>
                    </tr>
                 <?php
    // Kiểm tra xem kết quả truy vấn có tồn tại và có ít nhất một hàng hay không
    if (isset($result_oderdetail) && mysqli_num_rows($result_oderdetail) > 0) {
        // Lặp qua từng hàng trong kết quả truy vấn
        while ($adproduct = mysqli_fetch_assoc($result_oderdetail)) {
            ?>
            <tr>
                <td><?php echo $adproduct['masp']; ?></td>
                <td><?php echo $adproduct['tensp']; ?></td>
                <td><?php echo $adproduct['soluong']; ?></td>
                <td><?php echo $adproduct['giaxuat'] . " VND"; ?></td>
                <td><img src="images/<?php echo $adproduct['hinhanh']?>" width="80"></td>
            </tr>
            <?php
        }
    } else {
        // Nếu không có hàng nào, hiển thị thông báo lỗi
        echo "Không tìm thấy dữ liệu.";
    }
?>
                </table>

                <h2 align="center" >Thông Tin Đơn Hàng</h2>
                <table>
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Tên Khách Hàng</th>
                        <th>Tổng Tiền</th>
                        <th>Ngày Đặt Hàng</th>
                    </tr>
                    <tr>
                        <td><?php echo $order['ma_hoadon']; ?></td>
                        <td><?php echo $order['tenkhachhang']; ?></td>
                        <td><?php echo number_format($order['tongtien'], 0, '', ' ') . " VND"; ?></td>
                        <td><?php echo $order['createdate']; ?></td>
                    </tr>
                </table>
            </body>
            </html>
            <?php
        }
    }
}
?>