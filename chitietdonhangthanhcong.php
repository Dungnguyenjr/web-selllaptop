<?php require_once("connect.php"); ?>

<?php
$sql = "SELECT * FROM detailedpurchasehistory";
$result = mysqli_query($conn, $sql);
$totalQuantity = 0; // Biến để tính tổng số lượng của các sản phẩm
$totalAmount = 0; // Biến để tính tổng giá trị của các sản phẩm
?>

<?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <?php
    // Tính tổng số lượng và tổng giá trị
    $totalQuantity += $row['soluong'];
    $totalAmount += $row['giaxuat'] * $row['soluong'];
    ?>
<?php endwhile; ?>

<div style="text-align:center;">
    <h3>Đơn hàng đã bán thành công</h3>
    <p><strong>Tổng Số Lượng:</strong> <?php echo $totalQuantity; ?></p>
    <p><strong>Tổng Tiền:</strong> <?php echo number_format($totalAmount, 0, '', ' ') . " VND"; ?></p>
</div>

<!-- Hiển thị biểu đồ cột -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Tổng Tiền');
        data.addColumn('number', 'Số tiền');

        <?php
        // Truy vấn dữ liệu
        $sql = "SELECT SUM(giaxuat * soluong) as total_amount FROM detailedpurchasehistory";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        echo "data.addRow(['Tổng Tiền', " . $row['total_amount'] . "]);";
        ?>

        var options = {
            title: 'Tổng người mua hàng thành công',
            vAxis: { title: 'Tổng Tiền (VND)' },
            width: 800,
            height: 600,
            colors: ['#4285F4'] // Chọn một màu nào đó hoặc để trống để không sử dụng màu
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>

<!-- Không hiển thị bảng dữ liệu, chỉ giữ lại biểu đồ và các phần khác -->
<div id="chart_div" style="width: 800px; height: 600px; margin: 0 auto;"></div>
<style>
        #button_div {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px; /* Khoảng cách giữa hai dòng nút */
        }

        #button_div a {
            margin-bottom: 20px; /* Khoảng cách giữa các nút trong cùng một dòng */
            text-decoration: none;
        }

        #button_div button {
            padding: 10px;
        }
		button {
			padding: 10px;
			background-color: #FFF;
			color: #000;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			display: block;
			margin: auto;
			}
    	button:hover {
        	background-color: #F0F;
    }
    </style>
<div id="button_div">
    <a href="quantri.php?action=cacdonhangthanhcongtheongaythangnam"><button>Xem chi tiết các đơn hàng thành công theo ngày</button></a>
     <a href="quantri.php?action=cacdonhangthanhcongtheonam"><button>Xem chi tiết các đơn hàng thành công theo năm</button></a>
</div>