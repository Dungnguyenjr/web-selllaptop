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
						max-width: 1000px;
						margin: 20px auto;
						padding: 20px;
						background-color: #fff;
						border: 1px solid #d1568b; /* Thay #ccc bằng blue */
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
                        background-color: #d1568b;
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
                <h1>Lịch Sử Mua Hàng</h1>
            </div> 
           <?php
require_once('connect.php');
if (isset($_POST['delete'])) {
    $sql1 = "DELETE FROM detailedpurchasehistory";
    $sql2 = "DELETE FROM canceledgoods";
    if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
        echo "Lịch sử mua hàng và hàng hủy đã được xóa thành công.";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}

// Truy vấn lịch sử mua hàng từ bảng lichsumuahang
$sql = "(SELECT * FROM detailedpurchasehistory) UNION (SELECT * FROM canceledgoods)";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    ?>
    <table>
        <tr>
            <th>Mã Khách Hàng</th>
            <th>Tên Khách Hàng</th>
            <th>Thành Tiền</th>
            <th>Ngày Mua Hàng</th>
            <th>Chi Tiết Đơn Hàng</th>
            <th>Đánh Giá Sản Phẩm</th>
        </tr>
        <?php
        $displayed_customers = array(); // Mảng để theo dõi những khách hàng đã hiển thị
        while ($order = mysqli_fetch_assoc($result)) {
            // Kiểm tra xem mã khách hàng đã được hiển thị chưa
            if (!in_array($order['ma_khachhang'], $displayed_customers)) {
                // Query để lấy tổng giá xuất từ bảng detailedpurchasehistory
                $ma_hoadon = $order['ma_hoadon'];
                $query = "SELECT SUM(giaxuat) AS tong_giaxuat FROM detailedpurchasehistory WHERE ma_hoadon = '$ma_hoadon'";
                $result_tong_giaxuat = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result_tong_giaxuat);
                $tong_giaxuat = $row['tong_giaxuat'];

                // Kiểm tra xem khách hàng đã đánh giá chưa
                $sql = "SELECT * FROM `productreviews` WHERE ma_hoadon = '$ma_hoadon'";
                $check = mysqli_query($conn, $sql);
                $productreviews = mysqli_num_rows($check) > 0 ? 'Đã đánh giá' : 'Đánh giá sản phẩm';
                ?>
                <tr align="center">
                    <td><?php echo $order['ma_khachhang']; ?></td>
                    <td><?php echo $order['tenkhachhang']; ?></td>
                    <td><?php echo number_format($tong_giaxuat, 0, '', ' ') . " VND"; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($order['createdate'])); ?></td>
                    <td><a href="detailedpurchasehistory.php?ma_hoadon=<?php echo $order['ma_hoadon']; ?>"> Xem Chi tiết</a></td>
                    <td><a href="productreviews.php?ma_hoadon=<?php echo $order['ma_hoadon']; ?>"> Đánh giá sản phẩm</a></td>
                   
                </tr>
                <?php
                // Thêm mã khách hàng vào mảng đã hiển thị
                $displayed_customers[] = $order['ma_khachhang'];
            }
        }
        ?>
    </table>
    <?php
} else {
    echo "Không có lịch sử mua hàng.";
}

// Đóng kết nối cơ sở dữ liệu
mysqli_close($conn);
?>
<form method="post">
    <input type="submit" name="delete" value="Xóa lịch sử mua hàng">
</form>
</body>
</html>
