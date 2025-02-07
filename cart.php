<?php

require_once("connect.php");
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$sql = "SELECT * FROM adproduct WHERE ma_sp='$id'";
$rel = mysqli_query($conn, $sql);
if (mysqli_num_rows($rel) > 0) {
    $row = mysqli_fetch_assoc($rel);
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
        $_SESSION['cart'][$product_id]['qty'] += 1;
    }
    
    // Update quantity in cart table
    $new_qty = $_SESSION['cart'][$product_id]['qty'];
    $sql_insert_update = "INSERT INTO cart (ma_sp, tensp, giaxuat, khuyenmai, hinhanh, qty) VALUES ('$product_id', '$product_name', '$product_price', '$product_discount', '$product_image', '$new_qty') ON DUPLICATE KEY UPDATE qty = '$new_qty'";
    if (mysqli_query($conn, $sql_insert_update)) {
        echo "<script>
            alert('Cập nhật số lượng sản phẩm trong giỏ hàng thành công!');
            window.location.href = 'index.php';
        </script>";
        exit();
    } else {
        echo "Lỗi: " . $sql_insert_update . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Không có sản phẩm nào";
}

?>
