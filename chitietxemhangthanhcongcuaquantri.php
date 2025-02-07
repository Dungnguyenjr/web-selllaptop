<style>
table {
			width: 26%; /* Giảm chiều rộng của bảng xuống 60% */
			border-collapse: collapse;
			margin: 0 auto; /* Căn giữa bảng theo chiều ngang */
			display: block;
			overflow-x: auto; /* Cho phép kéo ngang */
}
        th, td {
    border: 2px solid #EEE; /* Màu viền nhẹ hơn */
    padding: 5px; /* Giảm padding */
    text-align: center;
}
</style>
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
$sql_order = "SELECT * FROM detailedpurchasehistory WHERE ma_hoadon = '$mahd'";

$result_order = mysqli_query($conn, $sql_order);
?>
<h1 align="center">Chi Tiết lịch sử Đơn Hàng của khách</h1>
<link href="stylequantri.css" rel="stylesheet" type="text/css"/>
 <?php
   if ($result_order && mysqli_num_rows($result_order) > 0) {
        ?>
<table>
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
        $totalAmount = 0; // Biến để tính tổng giá trị của các sản phẩm

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
            // Kiểm tra nếu sản phẩm không bị hủy
            if ($order_info['trangthai'] != 'Hủy đơn hàng') {
                $totalAmount += $order_info['giaxuat'] * $order_info['soluong'];
            }
        }
    ?>
    <tr style="background-color: #f2f2f2;">
        <td colspan="11" style="text-align: right;"><strong>Tổng Tiền:</strong></td>
        <td colspan="3"><strong><?php echo number_format($totalAmount, 0, '', ' ') . " VND"; ?></strong></td>
    </tr>
</table>
        <?php
    } else {
        echo "Không có thông tin chi tiết đơn hàng.";
    }

    mysqli_close($conn);
?>