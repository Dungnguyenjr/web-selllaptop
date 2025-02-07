<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>website bán hàng</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
<link href="all.min.css" rel="stylesheet" type="text/css" />
</head>
<style>
.action {
    width: 100%; /* Đảm bảo các nút hành động luôn chiếm 100% chiều rộng của khung sản phẩm */
    display: flex; /* Sắp xếp các nút hành động theo hàng ngang */
    justify-content: space-between; /* Đặt khoảng cách đều giữa các nút hành động */
}
.product {
    width: auto;
    border: 1px solid #ddd;
    padding: 10px;
    margin: 10px auto;
    text-align: center;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
    border-radius: 10px;
    transition: all 0.3s ease;
    background-color: #f8f8f8;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
}

.product:hover {
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
    transform: scale(1.02);
    background-color: #e8e8e8;
}

.product img {
    width: 55%;
    height: auto;
    object-fit: cover;
    border-radius: 10px;
    transition: transform 0.3s ease;
}

.product img:hover {
    transform: scale(1.1);
}

.product h2, .product p {
    margin: 0;
    padding: 0;
}

.product h2 {
    margin-bottom: 20px;
    color: #333;
    font-size: 14px;
}

.product p {
    color: #777;
    font-size: 12px;
}
</style>
<body>
 <label class="logo">MINISO VIETNAM</label>
 <div class="main">
    <!-- code header -->
    <?php require_once("header.php")?>
    <!-- code content -->
    <div class="content">
    <div class="featuredProducts">
        <h1>Sản phẩm nổi bật</h1>
    </div>
  <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MINISO VIETNAM</title>
</head>

<body>
<?php

// Kiểm tra xem giỏ hàng đã được khởi tạo trong phiên chưa
if (!isset($_SESSION['cartCount'])) {
    $_SESSION['cartCount'] = 0; // Nếu chưa, khởi tạo giỏ hàng với 0 sản phẩm
}

// Kiểm tra xem người dùng có nhấn nút "Thêm vào giỏ hàng" không
if (isset($_GET['id'])) {
    $_SESSION['cartCount'] += 1; // Tăng số lượng sản phẩm trong giỏ hàng lên 1
    $_SESSION['success_message'] = 'Thêm sản phẩm vào giỏ hàng thành công!'; // Thêm thông báo thành công vào phiên
    header('Location: index.php'); // Chuyển hướng người dùng trở lại trang chủ
    exit();
}

require_once("connect.php");
$sql = "SELECT * FROM adproduct";
$rel = mysqli_query($conn, $sql);

if (mysqli_num_rows($rel) > 0) {
    echo '<div class="product-container">';
    while ($r = mysqli_fetch_assoc($rel)) {
        $hinhanh = $r['hinhanh'];
        $masp = $r['ma_sp'];
        $tensp = $r['tensp'];
        $khuyenmai = $r['khuyenmai'];
        $giaxuat = $r['giaxuat'];
		$ketqua = $giaxuat - $r['khuyenmai'];
?>
        <div class="product">
    <img src="images/<?php echo $hinhanh ?>" alt="<?php echo $tensp ?>">
    <br />
    <?php
    echo $tensp . "<br>";
    echo "Giá bán: $ketqua <br>";
    echo "Giá khuyến mãi: $khuyenmai <br>";
    ?>
    <div class="action">
        <a class="cart" href="cart.php?id=<?= $masp; ?>">Thêm vào giỏ hàng</a>
        <a class="detail" href="detail.php?ma_sp=<?= $masp ?>">Xem chi tiết</a>
    </div>
</div>
<?php
    }
    echo '</div>';
}
?>
<?php if (isset($_SESSION['success_message'])): ?>
    <script>
        alert('<?php echo $_SESSION['success_message']; ?>');
    </script>
    <?php unset($_SESSION['success_message']); // Xóa thông báo thành công khỏi phiên sau khi hiển thị ?>
<?php endif; ?>
    </div>
</body>

</html>
        <div class="content_left"></div>
        <div class="content_center"></div>
        <div class="content_right"></div>
    </div>
 
    <!-- code footer -->
  
  </div>
</body>
</html>