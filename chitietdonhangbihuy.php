<?php
require_once("connect.php");

$sql = "SELECT * FROM canceledgoods";
$result = mysqli_query($conn, $sql);
$totalQuantity = 0; // Biến để tính tổng số lượng của các sản phẩm
$totalAmount = 0; // Biến để tính tổng giá trị của các sản phẩm
?>

<?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <?php
    // Tính tổng số lượng và tổng giá trị
    $totalQuantity += $row['soluong'];
    ?>
<?php endwhile; ?>

<div style="text-align:center;">
    <h3>Tổng số hàng đá bị hủy</h3>
    <p><strong>Tổng Số Lượng:</strong> <?php echo $totalQuantity; ?></p>
</div>

<!-- Hiển thị biểu đồ cột -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Tổng Số Lượng');
        data.addColumn('number', 'Số Lượng');

        <?php
        // Truy vấn dữ liệu
        $sql = "SELECT SUM(soluong) as total_quantity FROM canceledgoods";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $totalQuantity = $row['total_quantity'];
        echo "data.addRow(['', " . $totalQuantity . "]);";
        ?>

        var options = {
            title: 'Tổng Số Lượng Hủy Hàng',
            vAxis: { title: 'Số Lượng' },
            width: 800,
            height: 500,
            colors: ['#FF0000'] // Chọn một màu nào đó hoặc để trống để không sử dụng màu
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>

<!-- Hiển thị biểu đồ -->
<div id="chart_div" style="width: 800px; height: 600px; margin: 0 auto;"></div>
<div id="button_div">
<style>
button {
    padding: 10px;
    background-color: #FFF;
    color: #000;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    display: block;
    margin: auto; position: relative; /* Cho phép di chuyển nút */
    top: -50px; /* Di chuyển nút lên trên 20px */
}
</style>
    <a href="quantri.php?action=cacdonhangbihuy"><button>Xem chi tiết các đơn hàng bị hủy</button></a>
</div>
