<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title>website bán hàng</title>
<link href="style1.css" rel="stylesheet" type="text/css"/>
</head>
<style>
.center {
  margin-left: auto;
  margin-right: auto;
}
.margin-bottom {
  margin-bottom: 30px; /* Thay đổi giá trị này để điều chỉnh khoảng cách */
}
table {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  box-shadow: 0 0 20px rgba(0,0,0,0.15);
}
th, td {
  text-align: center;
  padding: 16px;
}
th {
  background-color: #f2f2f2;
}
tr:nth-child(even) {
  background-color: #f2f2f2;
}
button {
    background-color: #f2f2f2; /* Chỉnh màu ở đây*/
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    transition-duration: 0.4s;
}
button:hover {
    background-color: #F6C;
}
</style>

<body>
	<div class="main">
        <!-- code header -->
        <?php require_once("header.php") ?>
        <!-- code content -->
        <div class="content">
            <div class="featuredProducts">
                <h1>Danh sách Đơn hàng</h1>
            </div>  
<?php
  // Tạo kết nối
  $conn=mysqli_connect($hostname,$username,$password,$dbname);

  // Kiểm tra kết nối
  if ($conn->connect_error) {
      die("Kết nối thất bại: " . $conn->connect_error);
  }

  // Đặt bộ mã hóa ký tự cho kết nối
  mysqli_set_charset($conn, 'utf8');

  // Kiểm tra xem người dùng đã đăng nhập chưa
  if (isset($_SESSION['username'])) {
      $username = $_SESSION['username'];

      // Lệnh truy vấn để lấy thông tin người dùng từ bảng dangkithanhvien
      $stmt = $conn->prepare("SELECT * FROM dangkithanhvien WHERE username = ?");
      $stmt->bind_param("s", $username);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
          // Người dùng đã đăng nhập và thông tin có trong cơ sở dữ liệu
          $username = $result->fetch_assoc();
      } else {
          echo "Không tìm thấy thông tin người dùng.";
          exit();
      }
  } else {
      // Hiển thị thông báo đăng nhập và chuyển hướng đến trang đăng nhập
      echo "<script>alert('Vui lòng đăng nhập để mua hàng!'); window.location = 'login.php';</script>";
      exit();
  }

  //quản lý danh mục khách hàng

  if(isset($_GET["ma_hoadon"], $_GET["ma_khachhang"])) {
      $ma_hoadon = $_GET["ma_hoadon"];
      $ma_khachhang = $_GET["ma_khachhang"];

      $cancel_order = "UPDATE `order` SET `trangthai` = 'Hủy đơn hàng' WHERE `order`.ma_hoadon = '$ma_hoadon'";
      $result_cancel_order = mysqli_query($conn, $cancel_order);

      if($result_cancel_order){
          echo "<script>alert('Đã hủy đơn hàng!'); setTimeout(function(){ window.location = 'order.php'; }, 2000);</script>";
      }
  }
  else {
      $sql = "SELECT * FROM `order`";
      $rel = mysqli_query($conn, $sql);
     $res = mysqli_fetch_all($rel, MYSQLI_ASSOC);
        

    // Đóng kết nối
    $conn->close();
?>

    <table class="center margin-bottom">
       <tr>
    <td width="100px" style="text-align: center; font-size: 20px">Mã hóa đơn</td>
    <td width="200px" style="text-align: center; font-size: 20px">Mã khách hàng</td>
    <td width="200px" style="text-align: center; font-size: 20px">Tên khách hàng</td>
    <td width="100px" style="text-align: center; font-size: 20px">Tổng tiền</td>
    <td width="200px" style="text-align: center; font-size: 20px">Ngày</td>
    <td width="200px" style="text-align: center; font-size: 20px">Trạng thái</td>
    <td width="200px" style="text-align: center; font-size: 20px">Chi tiết</td>
    <td width="200px" style="text-align: center; font-size: 20px">Hủy đơn hàng</td>

  </tr>
    <?php
        for( $i = 0; $i < count($res); $i++ ) {
            ?>
     <tr>
    <td><strong><?= $res[$i]['ma_hoadon'] ?></strong></td>
    <td><strong><?= $res[$i]['ma_khachhang'] ?></strong></td>
    <td><strong><?= $res[$i]['tenkhachhang'] ?></strong></td>
    <td><strong><?= number_format($res[$i]['tongtien']) ?></strong></td> <!-- Sửa lỗi ở đây -->
    <td><strong><?= $res[$i]['createdate'] ?></strong></td>
   <td><strong><?= isset($res[$i]['trangthai']) ? $res[$i]['trangthai'] : "Chưa hoàn thành"; ?></strong></td> <!-- Thêm dòng này để hiển thị trạng thái -->
   <td>
    <button>
    <a href="order_detail.php?ma_hoadon=<?php echo $res[$i]['ma_hoadon']; ?>">Chi tiết đơn hàng</a>
</button></td>
 <td>
        <button>
            <a href="?ma_hoadon=<?php echo $res[$i]['ma_hoadon']; ?>&ma_khachhang=<?php echo $res[$i]['ma_khachhang']; ?>">Hủy đơn hàng</a>
        </button>
    </td>
            <?php   
        }
  }

?>

    
    </table>
    

  </div>
      <footer class="footer">
  </footer>
  <?php #session_destroy(); ?>
</body>

</html>
