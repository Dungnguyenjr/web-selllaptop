<?php 
require_once("connect.php");

function insertDataIntoTable($table, $data) {
    global $conn;
    $columns = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
    $sql = "INSERT INTO `$table` ($columns) VALUES ($values)";
    return mysqli_query($conn, $sql);
}

$ma_hoadon = isset($_GET["ma_hoadon"]) ? $_GET["ma_hoadon"] : "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trangthai = $_POST["trangthai"];
    $updateOrderStatusSql = "UPDATE `order` SET trangthai = '$trangthai' WHERE ma_hoadon = '$ma_hoadon'";
    if (mysqli_query($conn, $updateOrderStatusSql)) {
        if ($trangthai == "Đã thanh toán" || $trangthai == "Hủy đơn hàng") {
            $selectOrderInfoSql = "SELECT * 
                FROM `order`
                INNER JOIN `oderdetail` ON `order`.ma_hoadon = `oderdetail`.ma_hoadon
                INNER JOIN `customer` ON `order`.ma_khachhang = `customer`.ma_khachhang
                WHERE `order`.ma_hoadon = '$ma_hoadon'";
            $result_order = mysqli_query($conn, $selectOrderInfoSql);
            if ($result_order && mysqli_num_rows($result_order) > 0) {
                $ma_khachhang = null;
                while ($order_info = mysqli_fetch_assoc($result_order)) {
                    $ma_khachhang = $order_info['ma_khachhang'];
                    $insertTable = ($trangthai == "Đã thanh toán") ? "detailedpurchasehistory" : "canceledgoods";
                    $data = array(
                        'ma_hoadon' => $order_info['ma_hoadon'],
                        'ma_khachhang' => $order_info['ma_khachhang'],
                        'tenkhachhang' => $order_info['tenkhachhang'],
                        'masp' => $order_info['masp'],
                        'tensp' => $order_info['tensp'],
                        'soluong' => $order_info['soluong'],
                        'phone' => $order_info['phone'],
                        'email' => $order_info['email'],
                        'tinhthanhpho' => $order_info['tinhthanhpho'],
                        'quanhuyen' => $order_info['quanhuyen'],
                        'diachigiaohang' => $order_info['diachigiaohang'],
                        'giaxuat' => $order_info['giaxuat'],
                        'createdate' => $order_info['createdate'],
                        'trangthai' => $trangthai,
                    );
                    if (!insertDataIntoTable($insertTable, $data)) {
                        echo "Lỗi khi thêm vào bảng $insertTable: " . mysqli_error($conn);
                    }
                    // Giảm số lượng sản phẩm trong bảng `adproduct`
                    $ma_sp = $order_info['masp'];
                    $soluong = $order_info['soluong'];
                    $updateProductQuantitySql = "UPDATE `adproduct` SET soluong = soluong - $soluong WHERE ma_sp = '$ma_sp'";
                    if (!mysqli_query($conn, $updateProductQuantitySql)) {
                        echo "Lỗi khi cập nhật số lượng sản phẩm: " . mysqli_error($conn);
                    }
                }
                $delete_order = "DELETE FROM `order` WHERE `order`.ma_hoadon = '$ma_hoadon'";
                $result_delete_order = mysqli_query($conn, $delete_order);
                if (!is_null($ma_khachhang)) {
                    $delete_customer = "DELETE FROM `customer` WHERE `customer`.ma_khachhang  = '$ma_khachhang'";
                    $result_delete_customer = mysqli_query($conn, $delete_customer);
                    if (!$result_delete_customer) {
                        echo "Lỗi khi xóa từ bảng customer: " . mysqli_error($conn);
                    }
                } else {
                    echo "Không có thông tin khách hàng để xóa.";
                }
                if (!$result_delete_order || !$result_delete_customer) {
                    echo "Lỗi khi xóa từ bảng order hoặc customer: " . mysqli_error($conn);
                }
            }
        }
        echo "<script>alert('Cập nhật trạng thái đơn hàng thành công!');</script>";
        header("Refresh: 2; url=quantri.php?action=quanlithangthaidonhang");
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link href="stylequantri.css" rel="stylesheet">
</head>
    <title>Cập Nhật Trạng Thái Đơn Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .admin-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .admin-header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #ddd;
        }

        form {
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }
    </style>
<body>
    <div class="admin">
        <!--Nội dung-->
    <div class="admin-container">
        <div class="admin-header">
            <h2>Cập Nhật Trạng Thái Đơn Hàng</h2>
        </div>

        <!-- Biểu mẫu cập nhật trạng thái -->
        <form method="POST">
            <label for="ma_hoadon">Mã Hóa Đơn:</label>
            <input value="<?php echo $ma_hoadon; ?>" type="text" name="ma_hoadon" required readonly>
            <label for="trangthai">Trạng Thái Mới:</label>
            <input type="radio" name="trangthai" value="Chưa thanh toán" checked> Chưa thanh toán
             <input type="radio" name="trangthai" value="Hủy đơn hàng"> Hủy đơn hàng
            <input type="radio" name="trangthai" value="Đang giao hàng"> Đang giao hàng
            <input type="radio" name="trangthai" value="Đã thanh toán"> Đã thanh toán
            <br> 
            <input type="submit" value="Cập Nhật Trạng Thái">
        </form>
    </div>
</body>
</html>
