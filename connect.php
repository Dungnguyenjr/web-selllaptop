<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'webbanlaptop';

// Kết nối cơ sở dữ liệu
$conn = mysqli_connect($hostname, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Không thể kết nối: " . mysqli_connect_error());
} else {
    // Đặt bộ mã ký tự UTF-8 khi kết nối thành công
    mysqli_set_charset($conn, "utf8");
}
?>
