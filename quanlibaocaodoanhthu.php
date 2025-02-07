<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'miniso';
$conn = mysqli_connect($hostname, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");

if (!$conn) {
    die("Không thể kết nối " . mysqli_error($conn));
    exit();
}

$query = "SELECT masp, tensp, SUM(soluong) as totalQuantity, SUM((giaxuat) * soluong) as totalRevenue FROM detailedpurchasehistory GROUP BY masp";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$totalQuantity = 0;
$totalRevenue = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $totalQuantity += $row["totalQuantity"];
        $totalRevenue += $row["totalRevenue"];
    }
}
// Truy vấn để lấy số lượng đơn hàng đang được giao
$query = "SELECT COUNT(*) as totalOrders FROM `order`";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$CountOrder = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $CountOrder = $row["totalOrders"];
    }
}
// Truy vấn để lấy số lượng đơn hàng bị hủy
$query = "SELECT COUNT(*) as totalOrders FROM `canceledgoods`";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$CountOrder1 = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $CountOrder1 = $row["totalOrders"];
    }
}
mysqli_close($conn);
?>

<style>
.center-button {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .center-button a button {
            padding: 20px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    .info-box {
        width: 45%;
        padding: 20px;
        margin: 2%;
        box-sizing: border-box;
        float: left;
        text-align: center;
        color: #000;
        border-radius: 5px;
        box-shadow: 2px 2px 10px rgba(255, 255, 255, 0.1);
        background-color: #FFF;
    }

.info-box {
    transition: background-color 0.5s ease; /* Thêm hiệu ứng chuyển đổi màu sắc */
}

.info-box:nth-child(1) {
    background-color: #4169E1; /* cột thành công, màu xanh dương */
}

.info-box:nth-child(2) {
    background-color: #3CB371; /* cột đang xử lí, màu xanh lá cây */
}

.info-box:nth-child(3) {
    background-color: #FF6347; /* cột doanh số, màu đỏ cam */
}

.info-box:nth-child(4) {
    background-color: #FFB6C1; /* cột hủy hàng, màu hồng */
}
.info-box:hover {
    background-color: #0F9; /* Khi di chuột qua, hộp sẽ chuyển sang màu vàng */
}

    h2 {
        color: #333;
    }

    p {
        margin: 10px 0;
    }

    button {
    padding: 10px;
    background-color: #FFF;
    color: #000;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    display: block;
    margin: 10px auto;
	
}

    button:hover {
        background-color: #0F9;
    }
</style>

<div class="container">
    <div class="info-box">
        <h2>ĐƠN HÀNG THÀNH CÔNG</h2>
        <p><?php echo $totalQuantity; ?></p>
        <p>Đơn hàng giao dịch thành công</p>
    </div>

    <div class="info-box">
        <h2>ĐANG XỬ LÝ</h2>
        <p><?php echo $CountOrder; ?></p>
        <p>Số lượng đơn hàng đang xử lý</p>
    </div>

    <div class="info-box">
        <h2>DOANH SỐ</h2>
        <p><?php echo number_format($totalRevenue, 0, ',', '.') . " VNĐ"; ?></p>
        <p>Doanh số hệ thống</p>
    </div>

    <div class="info-box">
        <h2>ĐƠN HÀNG HỦY</h2>
        <p><?php echo $CountOrder1; ?></p>
        <p>Số đơn bị hủy trong hệ thống</p>
    </div>

    <div>
        <h2 align="center">Tổng đơn hàng đã bán thành công</h2>
        <a href="quantri.php?action=chitietdonhangthanhcong"><button>Xem chi tiết</button></a>
        <a href="quantri.php?action=lichsudonhangthanhcong"><button>Xem Lịch sử thành công</button></a>
    </div>

    <div>
        <h2 align="center">Tổng số hàng đã hủy</h2>
        <a href="quantri.php?action=chitietdonhangbihuy"><button>Xem chi tiết</button></a>
        <a href="quantri.php?action=lichsudonhangbihuy"><button>Xem Lịch sử đơn hàng bị hủy</button></a>
    </div>
</div>
