<?php
require_once("connect.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Product Display</title>
</head>
<style>
.menu-item {
    border: 0.2px solid #F0F; /* Giảm độ dày viền */
    border-color: #ff8cad; /* Thêm màu cho viền */
	background-color: #ff8cad;
    padding: 0px; /* Giảm padding */
    display: inline-block;
    width: 300px; /* Thêm kích thước khung hình */
    height: 80px; /* Thêm kích thước khung hình */
}
    .menu1 {
        display: none;
        width: 100%;
        padding: 0px;
        margin: 0px;
    }
	
    .menu1>li {
		display:block;
        list-style-type: none;
        padding: 10px;
        margin: 0px;
		 margin-bottom: 2px; /* Khoảng cách giữa các mục menu */
    }
    li:hover .menu1 {
        display: block;
        position: absolute;
        margin-top: 0px;/* Đặt giá trị này thành 0 để danh sách con hiển thị ngay bên dưới mục cha */
        margin-left: 0px;
        opacity: 1;
        transition: opacity 5s ease; /* Thời gian hiển thị menu là 5 giây, có thể điều chỉnh */
    }

    .menu1>li {
        
        opacity: 0; /* Bắt đầu với độ mờ là 0 */
        transition: opacity 5s ease; /* Thời gian xuất hiện là 5 giây, có thể điều chỉnh */
    }

    li:hover .menu1>li {
        opacity: 1; /* Hiển thị menu con với độ mờ là 1 khi hover vào mục cha */
    }
</style>
<body>
    <div class="header">
        <div class="header1">
            <nav>
                <label class="logo">MINISO VIETNAM</label>
                    <ul>
    <li><a href="index.php" style="color: #FFF"><strong>Trang chủ</strong></a></li>
    <li><a href="sanpham.php" style="color: #FFF"><strong>Sản phẩm</strong></a></li>
    <ul>
        <li><a href="order.php" style="color: #FFF"><strong>Đơn hàng</strong></a></li>
        <?php
        if (isset($_SESSION['username'])) {
            echo "<li><a href='' style='color: #FFF'><strong>Tài Khoản Của (" . $_SESSION['username'] . ")</strong></a>";
            echo "<ul class='menu1'>
                   <li class='menu-item'><a href='account.php' style='color: #FFF'><strong>Thông tin khách hàng</strong></a></li>
                    <li class='menu-item'><a href='doimatkhau.php' style='color: #FFF'><strong>Đổi mật khẩu</strong></a></li>
                    <li class='menu-item'><a href='purchasehistory.php' style='color: #FFF'><strong>Lịch sử mua hàng</strong></a></li>
                    <li class='menu-item'><a href='logout.php' style='color: #FFF'><strong>Đăng Xuất</strong></a></li>
                  </ul></li>";
        } else {
            echo "<li><a href='dangkithanhvien.php' style='color: #FFF'><strong>Đăng ký</strong></a></li>";
            echo "<li><a href='login.php' style='color: #FFF'><strong>Đăng nhập</strong></a></li>";
        }
        ?>
        <li>
            <a href="giohang.php?id">
    <i class="fas fa-shopping-cart"></i>
    <span id="count_shopping_cart_store">
      <?php
$sql = "SELECT COUNT(*) as cart_count FROM cart";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $cart_count = $row['cart_count'];
} else {
    $cart_count = 0;
}

echo "Giỏ hàng: " . $cart_count;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $check_sql = "SELECT * FROM cart WHERE ma_sp = '$product_id'";
        $check_result = mysqli_query($conn, $check_sql);
        if (mysqli_num_rows($check_result) > 0) {
            // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
            $update_sql = "UPDATE cart SET quantity = quantity + '$quantity' WHERE ma_sp = '$product_id'";
            $update_result = mysqli_query($conn, $update_sql);
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
            $insert_sql = "INSERT INTO cart (ma_sp, quantity) VALUES ('$product_id', '$quantity')";
            $insert_result = mysqli_query($conn, $insert_sql);
        }

        if ($insert_result || $update_result) {
            $cart_count++;
            echo "sản phẩm trong giỏ hàng: " . $cart_count;
        } else {
            echo "Lỗi khi thêm sản phẩm vào giỏ hàng: " . mysqli_error($conn);
        }
    }
}
?>
    </span>
</a>
                        </li>
                    </ul>
            </nav>
             <div id="slide">
            	<a href=""><img src="images/slidegiaodien1.jpg" alt="" ></a>
            </div>
                    <div class="header2">
            <?php
            // đếm số lượt truy cập
            if (isset($_SESSION['counter'])) {
                $_SESSION['counter'] += 1;
            } else {
                $_SESSION['counter'] = 1;
            }
            echo "Số lần truy cập:<span style='color:red'>" . $_SESSION['counter'] . "</span>";
            ?>
        </div>
        </div>
    </div>
    
</body>

</html>

<style>
#slide {
    position: relative;
    width: 100vw; /* Chiều rộng 100% của màn hình */
    overflow: hidden;
    background: #f2accc;
}

#slide a {
    display: block;
    width: 100%;
    height: 100%;
}

#slide img {
    width: 100%;
    height: 100%;
    object-fit: contain; /* Hiển thị ảnh toàn bộ mà không cắt mất phần nào */
}
</style>