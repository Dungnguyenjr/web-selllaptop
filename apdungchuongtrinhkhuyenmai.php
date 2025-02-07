<?php
$hostname='localhost';
$username='root';
$password='';
$dbname='miniso';

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli($hostname, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");

if ($conn->connect_error) {
    die("Không thể kết nối: " . $conn->connect_error);
}

// Lấy ma_sp, số tiền giảm giá, và ngày bắt đầu và kết thúc khuyến mãi từ form
$ma_sp = $_POST['ma_sp'];
$discountAmount = $_POST['discount'];
$startDate = $_POST['start_date'];
$endDate = $_POST['end_date'];

// Ngày hiện tại
$currentDate = date('Y-m-d');

// Kiểm tra xem ngày hiện tại có nằm trong khoảng thời gian khuyến mãi không
if ($currentDate >= $startDate && $currentDate <= $endDate) {
    // Nếu có, áp dụng khuyến mãi
    $sql = "UPDATE adproduct SET khuyenmai = '$discountAmount' WHERE ma_sp = '$ma_sp'";
} else {
    // Hiển thị thông báo
    echo"<script>alert('Ngày không hợp lệ vui!');</script>";
}

// Thực hiện câu truy vấn
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Bạn đã áp dụng mã giảm giá thành công!');</script>";
    header("Refresh: 2; url=quantri.php");
} else {
    echo "Lỗi: " . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
