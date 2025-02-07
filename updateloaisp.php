<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link href="stylequantri.css" rel="stylesheet">
</head>

<body>
    <div class="admin">
        <!--Nội dung-->
        <?php
        require_once("connect.php");
        $id = $_GET["id"];
        $sql = "SELECT * FROM adproducttype WHERE ma_loaisp = '$id'";
        $rel = mysqli_query($conn, $sql);
        $sanpham = mysqli_fetch_assoc($rel);
        if (!$sanpham) {
            echo "Không tìm thấy sản phẩm";
            exit();
        }
        $txt_maloaisp = isset($_POST["txt_maloaisp"]) ? $_POST["txt_maloaisp"] : "";
        $txt_tenloaisp = isset($_POST["txt_tenloaisp"]) ? $_POST["txt_tenloaisp"] : "";
        $txt_motaloaisp = isset($_POST["txt_motaloaisp"]) ? $_POST["txt_motaloaisp"] : "";
        if (isset($_POST["btn_update"])) {
            $sql1 = "UPDATE adproducttype SET ma_loaisp = '$txt_maloaisp', ten_loaisp = '$txt_tenloaisp', mota_loaisp = '$txt_motaloaisp' WHERE ma_loaisp = '$id'";
            $rel1 = mysqli_query($conn, $sql1);
            echo "Bạn đã cập nhật thành công";
        }
        ?>
        <form action="" method="post">
            <table width="700" border="1">
                <tr>
                    <td colspan="2">Danh sách loại sản phẩm</td>
                </tr>
                <tr>
                    <td>Mã loại sản phẩm</td>
                    <td><input name="txt_maloaisp" type="text" value="<?php echo $txt_maloaisp; ?>"></td>
                </tr>
                <tr>
                    <td>Tên loại sản phẩm</td>
                    <td><input name="txt_tenloaisp" type="text" value="<?php echo $txt_tenloaisp; ?>"></td>
                </tr>
                <tr>
                    <td>Mô tả loại sản phẩm</td>
                    <td><textarea name="txt_motaloaisp" cols="20" rows="5"><?php echo $txt_motaloaisp; ?></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center">
                        <input name="btn_update" type="submit" value="Sửa">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>