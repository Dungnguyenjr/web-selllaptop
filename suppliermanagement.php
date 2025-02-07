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
?>
<table width="1000" height="300" border="2">
    <tr align="center">
        <td colspan="30" style=" text-align:center">Nhà Cung Cấp</td>
    </tr>
    <tr align="center">
        <td colspan="30" style="text-align:center"><a href="quantri.php?action=suppliermanagement_add" style="color:#333" >Thêm Nhà Cung Cấp</a></td>
    </tr>
    <tr>

        <td>Nhà cung cấp</td>
        <td>Điện thoại</td>
        <td>Email</td>
        <td>Địa chỉ</td>
        <td>xóa</td>
        <td>sửa</td>
    </tr>
    <?php
        $sql="SELECT * FROM suppliermanagement";
        $rel=mysqli_query($conn,$sql);
        while($r=mysqli_fetch_assoc($rel)){
    ?>
    <tr>
        <td><?php echo $r['tennhacungcap']?></td>
        <td><?php echo $r['phone']?></td>
        <td><?php echo $r['email']?></td>
        <td><?php echo $r['diachinhacungcap']?></td>
        <td><a href="delete_suppliermanagement.php?id=<?php echo $r['tennhacungcap']?>" style="color:#333"><i class="fas fa-trash-alt"></i> xóa</a></td><!-- biểu tượng “thùng rác” (<i class="fas fa-trash-alt"></i>)-->
<td><a href="quantri.php?action=update_suppliermanagement&id=<?php echo $r['tennhacungcap']?>" style="color:#333"><i class="fas fa-edit"></i> sửa</a></td><!-- “bút chỉnh sửa” (<i class="fas fa-edit"></i>))-->
    </tr>
    <?php } ?>
</table>
