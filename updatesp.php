<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link href="stylequantri.css" rel="stylesheet" type="text/css" />
	<link href="all.min.css" rel="stylesheet" type="text/css" />
    
</head>

<body>
    <div class="admin">
        <!--Nội dung-->
<?php
require_once("connect.php");
$id = $_GET["id"];
$sql = "SELECT * FROM adproduct WHERE ma_sp = '$id'";
$rel = mysqli_query($conn,$sql);
$sanpham = mysqli_fetch_assoc($rel);
if(!$sanpham)
{
	echo "Không tìm thấy sản phẩm";
	exit();
}
		$txt_maloaisp = isset($_POST["dropdown"]) ? $_POST["dropdown"] : $sanpham['ma_loaisp'];
        $txt_ma_sp = isset($_POST["txt_ma_sp"]) ? $_POST["txt_ma_sp"] : $sanpham['ma_sp'];
        $txt_tensp = isset($_POST["txt_tensp"]) ? $_POST["txt_tensp"] : $sanpham['tensp'];
        $txt_hinhanh = isset($_FILES["hinhanh"]) ? $_FILES["hinhanh"]["name"] : $sanpham['hinhanh'];
        $txt_gianhap = isset($_POST["txt_gianhap"]) ? $_POST["txt_gianhap"] : $sanpham['gianhap'];
        $txt_giaxuat = isset($_POST["txt_giaxuat"]) ? $_POST["txt_giaxuat"] : $sanpham['giaxuat'];
        $txt_soluong = isset($_POST["txt_soluong"]) ? $_POST["txt_soluong"] : $sanpham['soluong'];
        $txt_khuyenmai = isset($_POST["txt_khuyenmai"]) ? $_POST["txt_khuyenmai"] : $sanpham['khuyenmai'];
        $txt_mota_sp = isset($_POST["txt_mota_sp"]) ? $_POST["txt_mota_sp"] : $sanpham['mota_sp'];
        $txt_create_date = isset($_POST["txt_create_date"]) ? $_POST["txt_create_date"] : $sanpham['create_date'];
if(isset($_POST["btn_update"]))
{
	$sql1 = "UPDATE adproduct SET ma_loaisp = '$txt_maloaisp',  tensp = '$txt_tensp', hinhanh = '$txt_hinhanh', gianhap = '$txt_gianhap', giaxuat = '$txt_giaxuat', soluong = '$txt_soluong', khuyenmai = '$txt_khuyenmai', mota_sp = '$txt_mota_sp', create_date = '$txt_create_date' WHERE ma_sp = '$id'";
	$rel1 = mysqli_query($conn,$sql1);
	echo "Bạn đã cập nhật thành công";
}
?>
<form action="" method="post" enctype="multipart/form-data">
            <table width="800"table border="1">
                <?php
                ?>
                <tr>
                    <td>
                        Mã loại sản phẩm
                    </td>
                    <td>
                        <?php
                        echo '<select name="dropdown">';
                        echo '<option ';
                        echo 'value="' . $txt_maloaisp . '">' . $txt_maloaisp . '</option>';
                        echo '</select>';
                        ?>

                    </td>
                </tr>

                <tr>
                    <td>
                        Mã sản phẩm
                    </td>
                    <td>
                        <?php echo $txt_ma_sp; ?><input type="text" name="txt_masp" value="<?php echo $txt_ma_sp; ?>" style="border:none ; width:0 ;">
                    </td>
                </tr>
                <tr>
                    <td>
                        Tên sản phẩm
                    </td>
                    <td>
                        <input type="text" name="txt_tensp" value="<?php echo $txt_tensp; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Hình ảnh
                    </td>
                    <?php
                    if (isset($_FILES["hinhanh"])) {
                        $file_name = $_FILES["hinhanh"]["name"]; //tên file
                        $file_tmp = $_FILES["hinhanh"]["tmp_name"];
                        if (empty($errors) == true) {
                            move_uploaded_file($file_tmp, "images/" . $file_name);
                        }
                    }
                    ?>
                    <td>
                        <input type="file" name="hinhanh" value="<?php echo $txt_hinhanh; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Giá nhập
                    </td>
                    <td>
                        <input type="text" name="txt_gianhap" value="<?php echo $txt_gianhap; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Giá xuất
                    </td>
                    <td>
                        <input type="text" name="txt_giaxuat" value="<?php echo $txt_giaxuat; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Số lượng
                    </td>
                    <td>
                        <input type="text" name="txt_soluong" value="<?php echo $txt_soluong; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Khuyến mãi
                    </td>
                    <td>
                        <input type="text" name="txt_khuyenmai" value="<?php echo $txt_khuyenmai; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Mô tả sản phẩm
                    </td>
                    <td>
                        <input type="text" name="txt_mota_sp" value="<?php echo $txt_mota_sp; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Ngày tạo
                    </td>
                    <td>
                        <input type="date" name="txt_ngaytao" value="<?php echo $txt_create_date; ?>">
                    </td>
                </tr>
                <tr>
    <th colspan="2" style="text-align:center;">
        <input type="submit" style="text-align:center" value="Sửa" name="btn_update">
    </th>
</tr>

            </table>

        </form>
    