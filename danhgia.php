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
/* Thêm CSS này để căn giữa form */
td form {
    display: flex;
    justify-content: center;
    align-items: center;
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
$sql = "SELECT * FROM productreviews WHERE ma_hoadon = '$mahd'";

$result = mysqli_query($conn, $sql);
?>

<h1 align="center">Chi Tiết Đánh giá của khách</h1>
<link href="stylequantri.css" rel="stylesheet" type="text/css"/>

<?php
if (mysqli_num_rows($result) > 0) {
        ?>
        <table>
    <tr style="background-color: #f2f2f2;">
        <th>Mã Hóa Đơn</th>
        <th>Mã Khách Hàng</th>
        <th>Tên Khách Hàng</th>
        <th>Thành Tiền</th>
        <th>Ngày Mua Hàng</th>
        <th>Mức độ đánh giá của khách hàng</th>
        <th>Bình luật của khách hàng</th>
        <th>Xóa đánh giá khách hàng</th>
    </tr>
  <?php
    // xóa đánh giá + xóa lịch sử thành công
    if (isset($_POST['delete'])) {
        $ma_khachhang = $_POST['ma_khachhang']; // Lấy mã khách hàng từ form
        $sql1 = "DELETE FROM detailedpurchasehistory WHERE ma_khachhang = '$ma_khachhang'";
        $sql2 = "DELETE FROM productreviews WHERE ma_khachhang = '$ma_khachhang'";
        if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
            echo "<script>alert('Xóa thành công!');</script>";
            header("Refresh: 2; url=quantri.php?action=lichsudonhangthanhcong");
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    }
    // Hiển thị tất cả các mục trong cmt
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
            <td>'.$row['ma_hoadon'].'</td>
            <td>'.$row['ma_khachhang'].'</td>
            <td>'.$row['tenkhachhang'].'</td>
            <td>'.$row['tong_giaxuat'].'</td>
            <td>'.$row['createdate'].'</td>
            <td>'.$row['rating'].'</td>
            <td>'.$row['comment'].'</td>
            <td>
                <form method="post">
                    <input type="hidden" name="mahd" value="'.$row['ma_hoadon'].'">
                    <input type="hidden" name="ma_khachhang" value="'.$row['ma_khachhang'].'">
                    <input type="submit" name="delete" value="Xóa">
                </form>
            </td>
        </tr>';
    }
    echo '</table>';
} else {
    echo "<script>alert('khách hàng chưa đánh giá!');</script>";
}
?>
