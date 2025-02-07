<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Website bán hàng</title>
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
        <?php require_once("header.php") ?>
        <!-- code content -->
        <div class="content">
            <div class="featuredProducts">
                <h1>Danh mục sản phẩm</h1>
            </div>
<div class="category">
    <form action="sanpham.php" method="get">
    <div class="admin_col1" style="text-align:center";>
        Danh mục sản phẩm </div>
    <select onchange="window.location.href = window.location.pathname + '?danhmuc=' + this.value;">
        <?php
        include("connect.php");
        $sql = "SELECT DISTINCT ma_loaisp FROM adproduct";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $selected = '';
                if(isset($_GET['danhmuc']) && $_GET['danhmuc'] == $row["ma_loaisp"]){
                    $selected = 'selected';
                }
                echo "<option value='" . $row["ma_loaisp"] . "' " . $selected . ">" . $row["ma_loaisp"] . "</option>";
            }
        }
        else {
            echo "Không có sản phẩm nào";
        }
        mysqli_close($conn);
        ?>      
    </select>

    <input type="text" name="tensp" class="search-bar" placeholder="Tìm kiếm sản phẩm...">
    <input type="submit" name="search" value="Tìm kiếm">
</form>
</div>
<?php
if (isset($_GET['tensp'])) {
    $tensp = $_GET['tensp'];
    include("connect.php");
    $sql = "SELECT * FROM adproduct WHERE tensp LIKE '%$tensp%'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="product-container">';
        while ($row = mysqli_fetch_assoc($result)) {
            $hinhanh = $row["hinhanh"];
            $tensp = $row["tensp"];
            $gianhap = $row["giaxuat"];
            $giaxuat = $row["giaxuat"] - $row["khuyenmai"];
            $masp = $row["ma_sp"];

            echo '<div class="product">';
            echo '<img src="images/' . $hinhanh . '" alt="' . $tensp . '">';
            echo "<br />";
            echo $tensp . "<br>";
            echo "Giá gốc: <del>$gianhap.</del>"."<br>";
            echo "Giá bán:  $giaxuat, <br>";
            echo '<div class="action">';
            echo "<a class='cart' href='cart.php?id=" . $masp . "'>Thêm vào giỏ hàng</a>";
            echo "<a class='detail' href='detail.php?ma_sp=" . $masp . "'>Xem chi tiết</a>";
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo "Không tìm thấy sản phẩm nào";
    }
    mysqli_close($conn);
}
?>
<?php
           include("connect.php");
			$danhmuc = "";
			if (isset($_GET['danhmuc'])) 
				$danhmuc = $_GET['danhmuc'];
				$sql = "SELECT * FROM adproduct WHERE ma_loaisp = '$danhmuc'";
				$rel = mysqli_query($conn, $sql);

            if (mysqli_num_rows($rel) > 0) {
                echo '<div class="product-container">';
                while ($r = mysqli_fetch_assoc($rel)) {
                    $hinhanh = $r['hinhanh'];
                    $masp = $r['ma_sp'];
                    $tensp = $r['tensp'];
                    $giatien = $r['giaxuat'];
                    $khuyenmai = $r['khuyenmai'];
            ?>
                    <div class="product">
                        <img src="images/<?php echo $hinhanh ?>" alt="<?php echo $tensp ?>">
                        <br />
                        <?php
                        echo $tensp . "<br>";
                        echo "<del>$khuyenmai</del>" . "<br>";
                        echo $giatien, "<br>";
                        ?>
                        <div class="action">
                            <a class="cart" href="cart.php?id=<?= $masp; ?>" onclick="addToCart()">Thêm vào giỏ hàng</a>
                            <a class="detail" href="detail.php?ma_sp=<?= $masp ?>">Xem chi tiết</a>
                        </div>
                    </div>
            <?php
                }
                echo '</div>';
            }
            ?>
        </div>
        <div class="content_left"></div>
        <div class="content_center"></div>
        <div class="content_right"></div>
    </div>

    <!-- code footer -->

</body>

</html>