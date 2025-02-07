<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Website bán hàng</title>
    <link href="style1.css" rel="stylesheet" type="text/css" />
    <link href="all.min.css" rel="stylesheet" type="text/css" />
        <style>
        .add-cart-single {
    background: #ff8cad;
    color: white;
    border-bottom-left-radius: 10px;
    cursor: pointer;
    transition: 0.4s;
    padding: 15px; /* Thêm padding để tạo khoảng trắng xung quanh nút */
}

.add-cart-single:hover {
    transition: 0.5s;
    background-color: #90F;
    cursor: pointer;
    transform: scale(1.1); /* Phóng to 110% khi rê chuột vào */
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); /* Thêm đổ bóng */
}
		.product {
			width: 400px;
			border: 1px solid #000;
			padding: 10px;
			margin: 0 auto;
		}
		.product img {
			width: 100%;
			height: auto;
		}
		.product h2 {
			font-size: 20px;
			font-weight: bold;
		}
		.product .price-single {
			color: green;
			font-size: 18px;
			font-weight: bold;
		}
		.product .product-description {
			color: red;
			font-size: 16px;
		}
		</style>
</head>

<body>
    <label class="logo">REPUBLIC OF GAMER</label>
    <div class="main">
        <!-- code header -->
        <?php require_once("header.php") ?>
        <!-- code content -->
        <div class="content">
            <div class="featuredProducts">
                <h1>Chi tiết sản phẩm</h1>  
                </div>
<?php
include("connect.php");

if (isset($_GET['ma_sp'])) {
    $masp = $_GET['ma_sp'];
    $sql = "SELECT ma_sp, hinhanh, tensp, gianhap, giaxuat, khuyenmai, mota_sp FROM adproduct WHERE ma_sp = '$masp'";
    $rel = mysqli_query($conn, $sql);

    if (mysqli_num_rows($rel) > 0) {
        while ($r = mysqli_fetch_assoc($rel)) {
            $masp = $r['ma_sp'];
            $hinhanh = $r['hinhanh'];
            $tensp = $r['tensp'];
            $gianhap = $r['gianhap'];
            $giaxuat = $r['giaxuat'];
            $khuyenmai = $r['khuyenmai'];
            $mota_sp = $r['mota_sp'];
			$ketqua = $giaxuat - $r['khuyenmai'];
        }
    } else {
        echo "Không tìm thấy sản phẩm";
    }
    ?>
    <div class="container-single">
        <div class="product">
            <img src="images/<?php echo $hinhanh ?>" alt="<?php echo $tensp ?>">
            <br />
            <div class="info">
                <div class="name">
                    <h2><?php echo $tensp ?></h2>
                </div>
                <div class="price-single">
                    Giá bán: <b><?php echo number_format($ketqua, 0, '', ',') ?>VND</b>
                </div>
                <?php
                if ($khuyenmai < $giaxuat) { ?>
                    <div>
                        Giá khuyến mãi: <b><?php echo number_format($khuyenmai, 0, '', ',') ?>VND</b>
                        <br><?php echo "Chi tiết sản phẩm: " . $mota_sp . "<br>"; ?>
                    </div>
                <?php } ?>
                <div class="add-cart-single">
                   <a class="cart" href="cart.php?id=<?= $masp; ?>">Thêm vào giỏ hàng</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>	
<div class="content_left"></div>
        <div class="content_center"></div>
        <div class="content_right"></div>
    </div>

    <!-- code footer -->

</body>

</html>