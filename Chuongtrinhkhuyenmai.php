<form action="apdungchuongtrinhkhuyenmai.php" method="post">
    <label for="ma_sp">Chọn mã sản phẩm:</label>
    <select id="ma_sp" name="ma_sp">
        <?php
            $sql = "SELECT ma_sp FROM adproduct";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row["ma_sp"] . "'>" . $row["ma_sp"] . "</option>";
            }
        ?>
    </select>
    <label for="discount">Nhập số tiền giảm giá:</label>
    <input type="number" id="discount" name="discount" min="0">
    <label for="start_date">Ngày bắt đầu khuyến mãi:</label>
    <input type="date" id="start_date" name="start_date">
    <label for="end_date">Ngày kết thúc khuyến mãi:</label>
    <input type="date" id="end_date" name="end_date">
    <input type="submit" value="Áp dụng khuyến mãi">
</form>
