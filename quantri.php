<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link href="stylequantri.css" rel="stylesheet" type="text/css"/>
    <style>
    /* Thêm mũi tên bên cạnh các mục có menu con */
    .admin_col1_left > a:after {
      content: " ▶";
    }

    /* Ẩn menu con */
    .admin_col1_left ul {
      display: none;
    }

    /* Hiển thị menu con khi chọn mục cha */
    .admin_col1_left.show-sub > ul {
      display: block;
    }
    </style>
</head>

<body>
    <h2 class="sidebar-brand-icon">MENU ADMIN</h2>
    <div class="sidebar-brand-icon rotate-n-15">
        <div class="sidebar-brand-text mx-3">VietNam Miniso <sup>Shop</sup></div>
    </div>
    <hr class="sidebar-divider my-0">
    <ul class="menu">
        <li class="menu-item">
            <a href="quantri.php?action=adproducttype">Quản lý loại sản phẩm</a>
        </li>
        <li class="menu-item">
            <a href="quantri.php?action=adproduct">Quản lý sản phẩm</a>
        </li>
        <li class="menu-item">
            <a href="quantri.php?action=customer">Quản lý thông tin khách hàng</a>
        </li>
        <li class="menu-item">
            <a href="quantri.php?action=suppliermanagement">Quản lý nhà cung cấp</a>
        </li>
        <li class="menu-item">
            <a href="quantri.php?action=quanlitrangthaidonhang">Quản lý trạng thái đơn hàng</a>
        </li>
        <li class="menu-item">
            <a href="quantri.php?action=quanlibaocaodoanhthu">Quản lý báo cáo doanh thu</a>
        </li>
        <li class="menu-item">
            <a href="quantri.php?action=khoton">Quản lý báo cáo kho tồn</a>
        </li>
        <li class="menu-item">
            <a href="quantri.php?action=Chuongtrinhkhuyenmai">Chương trình khuyến mại</a>
        </li>
        <li class="menu-item">
            <a href="logout.php">Đăng Xuất</a>
        </li>
    </ul>
    <div class="admin_col2">
    <!--Nội dung-->
     <?php
  require_once "connect.php";
  ?>
		<?php
			if(isset($_GET["action"])){
				$action=$_GET["action"];
				switch($action){
					case 'adproducttype':
						require_once('adproducttype.php');
						break;
					case 'adproduct':
						require_once('adproduct.php');
						break;
					case 'themsp':
						require_once('themsp.php');
						break;
					case 'customer': // Changed this line
						require_once('customer.php');
						break;
					case 'suppliermanagement':
						require_once('suppliermanagement.php');
						break;
					case 'suppliermanagement_add':
						require_once('suppliermanagement_add.php');
						break;
					case 'update_suppliermanagement':
						require_once('update_suppliermanagement.php');
						break;
					case 'updateloaisp': // Changed this line
						require_once('updateloaisp.php');
						break;
					case 'updatesp': // Changed this line
						require_once('updatesp.php');
						break;
					case 'update_customer': // Changed this line
						require_once('update_customer.php');
						break;
					case 'quanlitrangthaidonhang': // Changed this line
						require_once('quanlitrangthaidonhang.php');
						break;
					case 'quanlibaocaodoanhthu': // Changed this line
						require_once('quanlibaocaodoanhthu.php');
						break;
					case 'chitietdonhangthanhcong': // Changed this line
						require_once('chitietdonhangthanhcong.php');
						break;
					case 'chitietdonhangbihuy': // Changed this line
						require_once('chitietdonhangbihuy.php');
						break;
					case 'cacdonhangthanhcongtheongaythangnam': // Changed this line
						require_once('cacdonhangthanhcongtheongaythangnam.php');
						break;
					case 'cacdonhangbihuy': // Changed this line
						require_once('cacdonhangbihuy.php');
						break;
					case 'khoton': // Changed this line
						require_once('khoton.php');
						break;
					case 'cacdonhangthanhcongtheonam': // Changed this line
						require_once('cacdonhangthanhcongtheonam.php');
						break;
					case 'Chuongtrinhkhuyenmai': // Changed this line
						require_once('Chuongtrinhkhuyenmai.php');
						break;
					case 'lichsudonhangthanhcong': // Changed this line
						require_once('lichsudonhangthanhcong.php');
						break;
					case 'lichsudonhangbihuy': // Changed this line
						require_once('lichsudonhangbihuy.php');
						break;
					case 'chitietxemhangcuaquantri': // Changed this line
						require_once('chitietxemhangcuaquantri.php');
						break;
					case 'danhgia': // Changed this line
						require_once('danhgia.php');
						break;
					case 'chitietdonhangxemadmin': // Changed this line
						require_once('chitietdonhangxemadmin.php');
						break;
					case 'index': // Changed this line
						require_once('index.php');
						break;
					default:
						echo "";
						break;
				}
			}
		?>
  	 </div>
    </div>
</body>
</html>