<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style1.css" rel="stylesheet" type="text/css"/>
</head>
<style>
    table {
        margin: 0 auto; /* Để căn giữa bảng */
        border-collapse: collapse; /* Để loại bỏ khoảng cách giữa các ô */
        width: 80%; /* Kích thước của bảng */
    }

    th, td {
        border: 1px solid #ddd; /* Đường biên cho từng ô */
        padding: 8px; /* Khoảng cách giữa nội dung và biên của ô */
        text-align: center; /* Căn giữa nội dung trong ô */
    }

    th {
        background-color: #f2f2f2; /* Màu nền cho dòng tiêu đề */
    }

    img {
        max-width: 100%; /* Để đảm bảo hình ảnh không vượt quá kích thước ô */
        height: auto;
    }

</style>
<body>

<div class="main">

<?php
// Khởi tạo phiên làm việc
session_start();

// Kết nối cơ sở dữ liệu
require_once("connect.php");

// Xử lý giỏ hàng và chuyển hướng người dùng ở đây
if (isset($_POST["btn_submit"]) && $_POST["btn_submit"] == "Tiến hành đặt hàng") {
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        // Lệnh truy vấn để lấy thông tin người dùng từ bảng dangkithanhvien
        $sql = "SELECT * FROM dangkithanhvien WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Người dùng đã đăng nhập và thông tin có trong cơ sở dữ liệu
            $username = $result->fetch_assoc();
            // Xử lý thông tin người dùng tại đây
            // Clear existing giohang session
            $_SESSION['giohang'] = [];

            // Loop through cart items
            foreach ($_SESSION["cart"] as $k => $v) {
                $masp = $v['masp'];
                $tensp = $v['tensp'];
                $giaxuat = $v['giaxuat'];
                $khuyenmai = $v['khuyenmai'];
                $hinhanh = $v['hinhanh'];
                $soluong = $v['qty'];
                $tongtien = $soluong * ($giaxuat - $khuyenmai);

                // Insert into giohang session
                $_SESSION['giohang'][] = array(
                    'masp' => $masp,
                    'tensp' => $tensp,
                    'giaxuat' => $giaxuat,
                    'khuyenmai' => $khuyenmai,
                    'hinhanh' => $hinhanh,
                    'soluong' => $soluong,
                    'tongtien' => $tongtien
                );
            }

            // Xóa phiên giỏ hàng sau khi xử lý
            unset($_SESSION['cart']);

            // Chuyển hướng đến trang thành công hoặc thực hiện các hành động cần thiết khác
            header("Location: addtocart.php");
            exit();
        } else {
            // Không tìm thấy thông tin người dùng trong cơ sở dữ liệu
            echo "Không tìm thấy thông tin người dùng.";
        }
    } else {
        // Hiển thị thông báo đăng nhập và chuyển hướng đến trang đăng nhập
        echo "<script>alert('Vui lòng đăng nhập để mua hàng!'); window.location = 'login.php';</script>";
        exit();
    }
}

// Sau đó, bắt đầu gửi output
require_once("header.php");

$sql = "SELECT * FROM cart";
$rel = mysqli_query($conn, $sql);
if (mysqli_num_rows($rel) > 0) {
    while($row = mysqli_fetch_assoc($rel)) {
        $product_id = $row['ma_sp'];
        $product_name = $row['tensp'];
        $product_price = $row['giaxuat'];
        $product_discount = $row['khuyenmai'];
        $product_image = $row['hinhanh'];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (!isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] = [
                'masp' => $product_id,
                'tensp' => $product_name,
                'giaxuat' => $product_price,
                'khuyenmai' => $product_discount,
                'hinhanh' => $product_image,
                'qty' => 1,
            ];
        } else {
            $_SESSION['cart'][$product_id]['qty'];
        }
    }
} else {
	 echo "<script>alert('Không có sản phẩm nào vui lòng thêm sản phẩm vào giỏ hàng!'); window.location = 'index.php';</script>";
}

if (isset($_POST["btn_submit"])) {
    if ($_POST["btn_submit"] == "Cập nhật giỏ hàng") {
        if (isset($_POST['qty'])) {
            foreach ($_POST['qty'] as $key => $value) {
                $_SESSION['cart'][$key]['qty'] = $value;
            }
        }
        echo "<script>alert('Cập nhật giỏ hàng thành công!');</script>";
    }
}

    // Đóng kết nối
    $conn->close();
?>


  <div class="content">
    <?php
    if (isset($_SESSION['cart'])) 
    ?>
    <form action="" method="post">
      <table width="1120" border="1">
        <tr>
          <td colspan="10" style="text-align:center; font-weight: bold;">DANH SÁCH SẢN PHẨM CỦA GIỎ HÀNG</td>
        </tr>
        <tr class="indam">
          <td width="40";>STT</td>
          <td width="92">Mã sản phẩm</td>
          <td width="161">Tên sản phẩm</td>
          <td width="102">Hình ảnh</td>
          <td width="200">Số lượng</td>
          <td width="139">Giá tiền</td>
          <td width="124">Khuyến mãi</td>
          <td width="126">Thành tiền</td>
          <td width="110">Xóa</td>
        </tr>
        <?php
        $i = 0;$tongtien = 0;$tt = 0;
        foreach ($_SESSION["cart"] as $k => $v) {
            if ($v['khuyenmai'] > 0) {
                $tt = $v['qty'] * ($v['giaxuat'] - $v['khuyenmai']);
            } else {
                $tt = $v['qty'] * $v['giaxuat'];
            }
            $tongtien += $tt;
            $i++;
        ?>
        <tr>
          <td height="57"><?php echo $i; ?></td>
          <td><?php echo $v['masp']; ?></td>
          <td><?php echo $v['tensp']; ?></td>
          <td>
            <img src="images/<?php echo $v['hinhanh']; ?>" width="70">
          </td>
          <td> <input type="text" value="<?php echo $v['qty']; ?>" name="qty[<?php echo $k; ?>]"/></td>
          <td><?php echo $v['giaxuat']; ?></td>
           <td><?php echo $v['khuyenmai'] > 0 ? "<s>" . $v['khuyenmai'] . "</s>" : $v['khuyenmai']; ?></td>
          <td><?php echo $tt; ?></td>
            <td><a href="delete_cart.php?id=<?php echo $k; ?>" style="color: black">Xóa sản phẩm</a>
        </tr>
        <?php } ?>
        <tr>
          <td colspan="8">
            <?php
            echo "<strong>Tổng tiền cần thanh toán là:</strong> " . $tongtien;
            ?>
          </td>
        </tr>
        <td height="53" colspan="9">
        <input name="btn_submit" type="submit" value="Cập nhật giỏ hàng" style="color: black;">
        <input name="btn_submit" type="submit" value="Tiến hành đặt hàng" style="color: black;">
    </form>
</td>
<?php #session_destroy(); ?>
        </div>
    </div>
</body>
</html>