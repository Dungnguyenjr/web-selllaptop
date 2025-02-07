<?php
session_start();
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['filter_specific'])) {
        $_SESSION['start_date'] = $_POST['start_date'];
        $_SESSION['end_date'] = $_POST['end_date'];
    } elseif (isset($_POST['filter_all'])) {
        unset($_SESSION['start_date']);
        unset($_SESSION['end_date']);
    }
}

$start_date = isset($_SESSION['start_date']) ? $_SESSION['start_date'] : '';
$end_date = isset($_SESSION['end_date']) ? $_SESSION['end_date'] : '';

$sql = "SELECT DATE_FORMAT(createdate, '%Y-%m-%d') AS formatted_date, SUM(soluong) AS soluong FROM canceledgoods";
if ($start_date && $end_date) {
    $sql .= " WHERE DATE(createdate) BETWEEN '$start_date' AND '$end_date'";
}
$sql .= " GROUP BY formatted_date ORDER BY formatted_date";
$result = mysqli_query($conn, $sql);
?>

<form method="post" action="">
    <label for="start_date">Từ ngày:</label>
    <input type="date" id="start_date" name="start_date" value="<?= $start_date; ?>">

    <label for="end_date">Đến ngày:</label>
    <input type="date" id="end_date" name="end_date" value="<?= $end_date; ?>">

    <input type="submit" name="filter_specific" value="Lọc từng ngày">
    <input type="submit" name="filter_all" value="Lọc Tất Cả">
</form>

<table align="center" width="30%" border="1">
    <tr>
        <td colspan="2">
            <h3 style="text-align:center;">Số lượng</h3>
        </td>
    </tr>
    <tr>
        <th>Ngày</th>
        <th>Số lượng</th>
    </tr>

    <?php
    $total = 0;
    while ($row = mysqli_fetch_assoc($result)):
        $total += $row['soluong'];
    ?>
        <tr>
            <td><?= $row['formatted_date']; ?></td>
            <td><?= number_format($row['soluong'], 0, '', ' '); ?></td>
        </tr>
    <?php endwhile; ?>
    <tr>
        <td>Tổng</td>
        <td><?= number_format($total, 0, '', ' '); ?></td>
    </tr>
</table>

<!-- Google Charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(function () {
        drawChart();
    });

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Ngày');
        data.addColumn('number', 'Số lượng');

        <?php
        // Reset the data pointer back to the beginning of the result set
        mysqli_data_seek($result, 0);

        // Loop through the result set to populate the chart data
        while ($row = mysqli_fetch_assoc($result)):
        ?>
            data.addRow(['<?= $row['formatted_date']; ?>', <?= $row['soluong']; ?>]);
        <?php endwhile; ?>

        var options = {
            title: 'Số lượng bị hủy',
            vAxis: { title: 'Số lượng' },
            width: 800,
            height: 600,
            colors: ['#FF0000']
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
<div id="chart_div" style="width: 800px; height: 600px; margin: 0 auto;"></div>
<!-- Chart Container -->
