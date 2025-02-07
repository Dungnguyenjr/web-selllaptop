<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>website bán hàng</title>
    <link href="style1.css" rel="stylesheet" type="text/css" />
    <link href="all.min.css" rel="stylesheet" type="text/css" />
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        input[type='submit'] {
            background-color: #FFF;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type='submit']:hover {
            background-color: #ff8cad;
        }
    </style>
</head>
<body>
    <label class="logo">MINISO VIETNAM</label>
    <div class="main">
        <!-- code header -->
        <?php require_once("header.php")?>
        <!-- code content -->
        <div class="content">
            <div class="featuredProducts">
                <h1 style="color:#FFF">Chỉnh sửa Hồ sơ cá nhân</h1>
            </div>
            <?php
            require_once("connect.php");

            $hostname = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'miniso';

            $conn = mysqli_connect($hostname, $username, $password, $dbname);

            if (!$conn) {
                die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
            }

            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $sql = "SELECT * FROM dangkithanhvien WHERE username = '$username'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<div style='width: 30%; margin: auto; border: 1px solid #ddd; padding: 20px; border-radius: 5px;'>";
                    echo "<h2 style='text-align: center;'>Thông tin cá nhân</h2>";
                    while ($row = $result->fetch_assoc()) {
                        echo <<<EOT
                        <form method='get' action='chinhsuathongtincanhan.php'>
                            <table>
                                <tr>
                                    <td>Họ và tên</td>
                                    <td>{$row['fullname']}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{$row['email']}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{$row['phone']}</td>
                                </tr>
                                <tr>
                                    <td>Giới tính</td>
                                    <td>{$row['gioitinh']}</td>
                                </tr>
                                <tr>
                                    <td>Quốc tịch</td>
                                    <td>{$row['quoctich']}</td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>{$row['address']}</td>
                                </tr>
                            </table>
                            <input type='submit' name='edit' value='Chỉnh sửa' style='color: black;'>
                        </form>
EOT;
                    }
                    echo "</div>";
                } else {
                    echo "Không tìm thấy thông tin đăng nhập cho username '$username'";
                }
            } else {
                echo "Session 'username' is not set.";
            }
            ?>
        </div>
    </div>
</body>
</html>