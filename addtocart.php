<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Details</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <style>
        .content {
            display: flex;
            justify-content: center;
        }

        .combined-table {
            display: flex;
            width: 60%;
        }

        .left-table,
        .right-table {
            flex: 1;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 0 10px 20px 10px;
        }
    </style>
</head>

<body>
    <div class="main">
         <?php
        require_once("header.php");
		require_once("connect.php");?>
		<?php

if (isset($_POST["btn_submit"])) {
    if ($_POST["btn_submit"] == "Xác nhận đặt hàng") {
		$makh = "KH" . mt_rand(0, 1000000);
        $mahd = "HD" . mt_rand(0, 1000000);

        $txt_tenkh = isset($_POST["txt_tenkhachhang"]) ? $_POST["txt_tenkhachhang"] : "";
        $txt_sdt = isset($_POST["txt_phone"]) ? $_POST["txt_phone"] : "";
        $txt_email = isset($_POST["txt_email"]) ? $_POST["txt_email"] : "";
        $txt_tinhthanhpho = isset($_POST["txt_tinhthanhpho"]) ? $_POST["txt_tinhthanhpho"] : "";
        $txt_quanhuyen = isset($_POST["txt_quanhuyen"]) ? $_POST["txt_quanhuyen"] : "";
        $txt_diachigiaohang = isset($_POST["txt_diachigiaohang"]) ? $_POST["txt_diachigiaohang"] : "";
        $createdate = isset($_POST["createdate"]) ? $_POST["createdate"] : "";
		$tongtien = 0;
        foreach ($_SESSION['giohang'] as $k => $v) {
            $tongtien += $v['tongtien'];
        }

        $sql2 = "INSERT INTO `customer`(`ma_khachhang`, `tenkhachhang`, `phone`, `email`, `tinhthanhpho`, `quanhuyen`, `diachigiaohang`) VALUES ('$makh', '$txt_tenkh', '$txt_sdt', '$txt_email', '$txt_tinhthanhpho', '$txt_quanhuyen','$txt_diachigiaohang')";
        $rel2 = mysqli_query($conn, $sql2);

        $sql1 = "INSERT INTO `order`(`ma_hoadon`, `ma_khachhang`, `tenkhachhang`, `tongtien`, `createdate`) VALUES ('$mahd','$makh','$txt_tenkh','$tongtien','$createdate')";
        $rel1 = mysqli_query($conn, $sql1);

        foreach ($_SESSION['giohang'] as $k => $v) {
            $masp = $v['masp'];
            $tensp = $v['tensp'];
            $soluong = $v['soluong'];
            $giaxuat = $v['giaxuat'];
            $khuyenmai = $v['khuyenmai'];
			$hinhanh = $v['hinhanh'];

            $sql3 = "INSERT INTO `oderdetail`(`ma_hoadon`, `masp`, `tensp`, `soluong`, `giaxuat`, `khuyenmai`, `hinhanh`) VALUES ('$mahd', '$masp','$tensp','$soluong','$giaxuat','$khuyenmai','$hinhanh')";
            $rel3 = mysqli_query($conn, $sql3);
			
        }
     if ($rel1 && $rel2 && $rel3) {
    // Lấy giá trị của $id từ đơn hàng đã đặt
    $ma_sp_khoa_chinh = // Lấy giá trị của khóa chính từ đơn hàng đã đặt

    // Thực hiện câu lệnh SQL để xóa dữ liệu từ bảng "cart"
    $sql_delete_cart = "DELETE FROM cart";
    $result_delete_cart = $conn->query($sql_delete_cart);

    // Kiểm tra và xử lý lỗi nếu có
    if (!$result_delete_cart) {
        echo "Lỗi khi xóa dữ liệu từ bảng cart: " . $conn->error;
        mysqli_close($conn);
        exit();
    }

    }
    echo "<script>alert('Bạn đã đặt hàng thành công!'); window.location = 'index.php';</script>";
} else {
    echo "Đặt hàng thất bại. Vui lòng thử lại.";
}
exit();
	}
?>
        <div class="content">
            <div class="combined-table">
                <div class="left-table">
                    <h2 align="center">Thông tin khách hàng</h2>
                    <form method="post" action="">
                            <table width="100%">
                                <tr>
                                    <td>Tên khách hàng</td>
                                    <td><input name="txt_tenkhachhang" type="text" placeholder="Tên khách hàng"></td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td><input name="txt_phone" type="text" placeholder="Phone"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input name="txt_email" type="text" placeholder="Email"></td>
                                </tr>
                                <tr>
                                    <td>Tỉnh/Thành phố</td>
                                    <td><input name="txt_tinhthanhpho" type="text" placeholder="Tỉnh/Thành phố"></td>
                                </tr>
                                <tr>
                                    <td>Quận/huyện</td>
                                    <td><input name="txt_quanhuyen" type="text" placeholder="Quận/Huyện"></td>
                                </tr>
                                <tr>
                                   <td>Địa chỉ giao hàng</td>
                                   <td><input name="txt_diachigiaohang" type="text" placeholder="Địa chỉ giao hàng"></td>
                                </tr>
                                <tr>
                            	<td >Ngày đặt hàng</td>
                                      <td><input name="createdate" type="date" /></td>
                                  </tr>
                            </table>
                </div>

                <div class="right-table">
                    <!-- Your right table content goes here -->
                    <h2 align="center">Thông tin đơn hàng</h2>
                    <table width="100%">
                        <tr>
                            <th>Mã Sản Phẩm</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Giá Tiền</th>
                        </tr>
      <?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$tongtien = 0; // Khởi tạo tổng số tiền

if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
    // Lặp qua mỗi sản phẩm trong giỏ hàng
    foreach ($_SESSION['giohang'] as $k => $v) {
        ?>
        <tr>
            <td><?php echo $v['masp']; ?></td>
            <td><?php echo $v['tensp']; ?></td>
            <td><?php echo $v['soluong']; ?></td>
            <td><?php echo $v['tongtien']; ?></td>
        </tr>
        <?php
        // Tính tổng số tiền
        $tongtien += $v['tongtien'] ;
    }
} else {
    // Nếu không có dữ liệu trong giỏ hàng
    echo "Không có dữ liệu trong giỏ hàng.";
}
?>
<tr>
    <th colspan="3">Tổng Tiền</th>
    <td><?php echo number_format($tongtien); ?></td>
</tr>
<tr>
            <td colspan="2">Chọn Phương thức thanh toán</td>
            <td colspan="2">

                <select name="">
                    <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
                    <option value="Thanh toán bằng thẻ tín dụng">Thanh toán bằng thẻ tín dụng</option>
                </select>
            </td>

                    </table>
                    <tr>
         	<td><input type="submit" name="btn_submit" value="Xác nhận đặt hàng"></td>
         </tr>
          </form>
                </div>
            </div>
        </div>
    </div>
    <?php #session_destroy(); ?>
</body>

</html>