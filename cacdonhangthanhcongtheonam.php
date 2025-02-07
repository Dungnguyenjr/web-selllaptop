<?php
session_start();
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['filter_specific'])) {
        $start_month = $_POST['start_month'];
        $end_month = $_POST['end_month'];

        if ($start_month && $end_month) {
            $_SESSION['start_date'] = $start_month . "-01";
            $_SESSION['end_date'] = date("Y-m-t", strtotime($end_month . "-01"));
        }
    } elseif (isset($_POST['filter_all'])) {
        unset($_SESSION['start_date']);
        unset($_SESSION['end_date']);
    }
}

$start_date = isset($_SESSION['start_date']) ? $_SESSION['start_date'] : '';
$end_date = isset($_SESSION['end_date']) ? $_SESSION['end_date'] : '';

$sql = "SELECT DATE_FORMAT(createdate, '%Y-%m') AS formatted_date, SUM(giaxuat * soluong) AS revenue FROM detailedpurchasehistory";
if ($start_date && $end_date) {
    $sql .= " WHERE YEAR(createdate) * 100 + MONTH(createdate) BETWEEN YEAR('$start_date') * 100 + MONTH('$start_date') AND YEAR('$end_date') * 100 + MONTH('$end_date')";
}
$sql .= " GROUP BY formatted_date ORDER BY formatted_date";
$result = mysqli_query($conn, $sql);
?>

<form method="post" action="">
    <label for="start_month">Từ tháng:</label>
    <input type="month" id="start_month" name="start_month" value="<?= $start_date; ?>">

    <label for="end_month">Đến tháng:</label>
    <input type="month" id="end_month" name="end_month" value="<?= $end_date; ?>">

    <input type="submit" name="filter_specific" value="Lọc từng tháng">
    <input type="submit" name="filter_all" value="Lọc Tất Cả">
</form>

<table align="center" width="30%" border="1">
    <tr>
        <td colspan="2">
            <h3 style="text-align:center;">Doanh Thu</h3>
        </td>
    </tr>
    <tr>
        <th>Tháng</th>
        <th>Doanh Thu</th>
    </tr>

    <?php
    $total = 0;
    while ($row = mysqli_fetch_assoc($result)):
        $total += $row['revenue'];
    ?>
        <tr>
            <td><?= $row['formatted_date']; ?></td>
            <td><?= number_format($row['revenue'], 0, '', ' ') . " VND"; ?></td>
        </tr>
    <?php endwhile; ?>
    <tr>
        <td>Tổng</td>
        <td><?= number_format($total, 0, '', ' ') . " VND"; ?></td>
    </tr>
</table>

<?php if ($start_date && $end_date): ?>
    <p>Từ tháng: <?= date("m-Y", strtotime($start_date)); ?>
        Đến tháng: <?= date("m-Y", strtotime($end_date)); ?></p>
<?php endif; ?>

<!-- Google Charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(function () {
        drawChart();
    });

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Tháng');
        data.addColumn('number', 'Doanh Thu');

        <?php
        // Reset the data pointer back to the beginning of the result set
        mysqli_data_seek($result, 0);

        // Loop through the result set to populate the chart data
        while ($row = mysqli_fetch_assoc($result)):
        ?>
            data.addRow(['<?= $row['formatted_date']; ?>', <?= $row['revenue']; ?>]);
        <?php endwhile; ?>

        var options = {
            title: 'Doanh Thu',
            vAxis: { title: 'Doanh Thu (VND)' },
            width: 800,
            height: 600,
            colors: ['#4285F4']
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
<div id="chart_div" style="width: 800px; height: 600px; margin: 0 auto;"></div>
<!-- Chart Container -->