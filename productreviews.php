<!DOCTYPE html>
<html>
<head>
    <title>Đánh Giá sản phẩm</title>
    <link href="style1.css" rel="stylesheet" type="text/css" />
    <style>
        .container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 27vh;
            margin: 0;
        }
        form {
            max-width: 500px;
            width: 100%;
        }
        h2 {
            text-align: center;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        textarea {
            width: 100%;
            box-sizing: border-box;
        }
        input[type="submit"] {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<?php
require_once('connect.php');

if (!isset($_GET['ma_hoadon'])) {
    echo "Không tìm thấy 'ma_hoadon' trong URL.";
    exit;
}

$ma_hoadon = $_GET['ma_hoadon'];

if (empty($ma_hoadon)) {
    echo "Mã hóa đơn không hợp lệ.";
    exit;
}

$hostname="localhost";
$username="root";
$password='';
$dbname="miniso";
$conn=mysqli_connect($hostname,$username,$password,$dbname);
mysqli_set_charset($conn,"utf8");

if(!$conn){
	die ("Không thể kết nối: " . mysqli_connect_error());
	exit();
}

require_once("header.php"); 

$sql = "SELECT * FROM `detailedpurchasehistory` WHERE ma_hoadon = '$ma_hoadon'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Lỗi truy vấn SQL: " . mysqli_error($conn);
    exit;
}

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $trangthai = $row["trangthai"];
    
    // Kiểm tra xem người dùng đã đánh giá sản phẩm này chưa
    $sql = "SELECT * FROM `productreviews` WHERE ma_hoadon = '$ma_hoadon'";
    $checkReview = mysqli_query($conn, $sql);

    if (mysqli_num_rows($checkReview) > 0) {
		 echo "<script>alert('Bạn đã đánh giá đơn hàng này!'); window.location = 'purchasehistory.php';</script>";
        exit;
    } else if ($trangthai == 'Đã thanh toán') {
        // Xử lý form khi nó được gửi
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $rating = $_POST["rating"];
            $comment = $_POST["comment"];

            // Lấy makh và tenkh từ bảng `purchasehistory`
            $ma_khachhang = $row["ma_khachhang"];
            $tenkhachhang = $row["tenkhachhang"];
            $giaxuat = $row["giaxuat"];
            $createdate = $row["createdate"];

            // Thêm đánh giá vào cơ sở dữ liệu
            $sql = "INSERT INTO productreviews  VALUES ('$ma_hoadon','$ma_khachhang', '$tenkhachhang', '$giaxuat',' $createdate', '$rating', '$comment')";

            if (mysqli_query($conn, $sql)) { 
				echo "<script>alert('Bạn đã đánh giá thành công!'); window.location = 'purchasehistory.php';</script>";
            } else {
                echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            // Hiển thị form đánh giá
        }
    } else if ($trangthai == 'Đã hủy') {
        echo "<script>alert('Không thể đánh giá đơn hàng này vì bạn đã hủy');</script>";
        header("Refresh: 2; url=purchasehistory.php");
        exit;
    }
} else {
	 echo "<script>alert('Không tìm thấy đơn hàng!'); window.location = 'purchasehistory.php';</script>";
    exit;
}
?>
<div class="container">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?ma_hoadon=' . $ma_hoadon; ?>" method="post">
    <h2>Đánh giá sản phẩm</h2>
    <label for="rating">Chọn mức đánh giá:</label><br>
    <input type="radio" id="good" name="rating" value="good">
    <label for="good">Tốt</label><br>
    <input type="radio" id="average" name="rating" value="average">
    <label for="average">Bình thường</label><br>
    <input type="radio" id="bad" name="rating" value="bad">
    <label for="bad">Tệ</label><br>
    <label for="comment">Nhập đánh giá của bạn:</label><br>
    <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br>
    <input type="submit" value="Gửi đánh giá">
</form>
</div>
</body>
</html>