<!DOCTYPE html>
<html>
<head>
    <style>
       table {
			width: 26%; /* Giảm chiều rộng của bảng xuống 60% */
			border-collapse: collapse;
			margin: 0 auto; /* Căn giữa bảng theo chiều ngang */
			display: block;
			overflow-x: auto; /* Cho phép kéo ngang */
}
        th, td {
    border: 2px solid #EEE; /* Màu viền nhẹ hơn */
    padding: 5px; /* Giảm padding */
    text-align: center;
}
    </style>
</head>
<body>
 <table>
    <tr>
        <td colspan="3">
            <h3 style="text-align:center;">Kho tồn</h3>
        </td>
    </tr>
    <tr>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng tồn kho</th>
    </tr>
    <form method="get" action="quantri.php">
        <input type="hidden" name="action" value="khoton">
        <input type="text" name="ma_sp" class="search-bar" placeholder="Tìm kiếm sản phẩm..." value="<?php echo isset($_GET['ma_sp']) ? $_GET['ma_sp'] : ''; ?>">
        <input type="submit" name="search" value="Tìm kiếm">
    </form>
    <?php
    require_once("connect.php");

    // Lấy từ khóa tìm kiếm từ biến GET nếu có
    $ma_sp = isset($_GET['ma_sp']) ? $_GET['ma_sp'] : '';

    $sql = "SELECT * FROM adproduct";
    if ($ma_sp) {
        $sql .= " WHERE ma_sp LIKE '%$ma_sp%'";
    }
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>" . $row['ma_sp'] . "</td>";
        echo "<td>" . $row['tensp'] . "</td>";
        echo "<td>" . $row['soluong'] . "</td>";
        echo "</tr>";
    }

    mysqli_close($conn);
    ?>
</table>
</body>
</html>
