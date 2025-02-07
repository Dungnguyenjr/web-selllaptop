<?PHP
$hostname='localhost';
$username='root';
$password='';
$dbname='miniso';
$conn=mysqli_connect($hostname,$username,$password,$dbname);
mysqli_set_charset($conn,"utf8");
if (!$conn){
	die("Không thể kết nối ".mysqli_error($conn));
	exit();
	}
?>