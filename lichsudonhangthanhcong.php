<style>
table {
			width: 100%; /* Giảm chiều rộng của bảng xuống 60% */
			border-collapse: collapse;
			margin: 0 auto; /* Căn giữa bảng theo chiều ngang */
			display: block;
			overflow-x: auto; /* Cho phép kéo ngang */
}
        th, td {
    border: 1px solid #EEE; /* Màu viền nhẹ hơn */
    padding: 5px; /* Giảm padding */
    text-align: center;
}
</style>
<?php
require_once 'connect.php';

$sql = "SELECT * FROM detailedpurchasehistory GROUP BY ma_hoadon";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
        <tr>
            <th>Mã Hóa Đơn</th>
            <th>Mã Khách Hàng</th>
            <th>Tên Khách Hàng</th>
            <th>Số Lượng</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Tỉnh thành phố</th>
            <th>Quận huyện</th>
            <th>Địa chỉ giao hàng</th>
            <th>Thành Tiền</th>
            <th>Ngày Mua Hàng</th>
            <th>Trạng thái </th>
            <th>Xem chi tiết</th>
            <th>Đánh giá</th>
        </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$row["ma_hoadon"]."</td>
            <td>".$row["ma_khachhang"]."</td>
            <td>".$row["tenkhachhang"]."</td>
            <td>".$row["soluong"]."</td>
            <td>".$row["phone"]."</td>
            <td>".$row["email"]."</td>
            <td>".$row["tinhthanhpho"]."</td>
            <td>".$row["quanhuyen"]."</td>
            <td>".$row["diachigiaohang"]."</td>
            <td>".$row["giaxuat"]."</td>
            <td>".$row["createdate"]."</td>
            <td>".$row["trangthai"]."</td>
            <td><a href='chitietxemhangthanhcongcuaquantri.php?ma_hoadon=".$row["ma_hoadon"]."'><button>Xem Chi tiết</button></a></td>
            <td><a href='danhgia.php?ma_hoadon=".$row["ma_hoadon"]."'><button>Xem Đánh giá</button></a></td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
