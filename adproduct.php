<!--Đoạn mã trên sử dụng Font Awesome, một thư viện biểu tượng.-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px auto;
    font-family: Arial, sans-serif;
}

td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

a {
    color: #333;
    text-decoration: none;
}
</style>
<?php
require_once("connect.php");

// Lấy từ khóa tìm kiếm từ biến GET nếu có
$tensp = isset($_GET['tensp']) ? $_GET['tensp'] : '';

?>
<form method="get" action="quantri.php">
    <input type="hidden" name="action" value="adproduct">
    <input type="text" name="tensp" class="search-bar" placeholder="Tìm kiếm sản phẩm..." value="<?php echo $tensp; ?>">
    <input type="submit" name="search" value="Tìm kiếm">
</form>
<table width="1000" height="300" border="2" align="center">
    <tr>
        <td colspan="30" style="text-align:center;">Quản lý danh sách sản phẩm</td>
    </tr>
    <tr>
         <td colspan="30" style="text-align:center;"><a href="quantri.php?action=themsp" style="color: #000"" ><i class="fas fa-pen">Thêm Mới</a></td>
    </tr>
    <tr>
        <td>Mã Loại sản phẩm</td>
        <td>Mã sản phẩm</td>
        <td>Tên sản phẩm</td>
        <td>Hình ảnh</td>
        <td>Giá Nhập</td>
        <td>Giá xuất</td>
        <td>Khuyến mại</td>
        <td>Số lượng</td>
        <td>Môt tả sản phẩm</td>
        <td>Ngày tạo</td>
        <td>Xóa</td>
        <td>Sửa</td>
  	</tr>
    <?php
        // Thay đổi điều kiện tìm kiếm trong câu lệnh SQL để tìm theo tensp
        $sql = "SELECT * FROM adproduct";
        if ($tensp) {
            $sql .= " WHERE tensp LIKE '%$tensp%'";
        }
        $rel=mysqli_query($conn,$sql);
        while($r=mysqli_fetch_assoc($rel)){
    ?>
    <tr>
        <td><?php echo $r['ma_loaisp']?></td>
        <td><?php echo $r['ma_sp']?></td>
        <td><?php echo $r['tensp']?></td>
        <td><img src="images/<?php echo $r['hinhanh']?>" width="80"></td>
        <td><?php echo $r['gianhap']?></td>
        <td><?php echo $r['giaxuat']?></td>
        <td><?php echo $r['khuyenmai']?></td>
        <td><?php echo $r['soluong']?></td>
        <td><?php echo $r['mota_sp']?></td>
        <td><?php echo $r['create_date']?></td>
        <td><a href="delete_sp.php?id=<?php echo $r['ma_sp']?>"style="color:#333"><i class="fas fa-trash-alt"></i>xóa</td>
        <td><a href="quantri.php?action=updatesp&id=<?php echo $r['ma_sp']?>" style="color:#333""><i class="fas fa-edit"></i>Sửa</td>
  	</tr>
  <?php }?>
</table>

