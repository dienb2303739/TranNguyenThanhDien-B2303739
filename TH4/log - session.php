<?php
// 1. Khởi động Session (Bắt buộc phải có ở dòng đầu tiên)
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanhang";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "select id, fullname, email from customers where email = '" . $_POST["email"] . "' and password = '" . md5($_POST["pass"]) . "'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();

	// 2. Lưu dữ liệu vào SESSION thay vì Cookie
	$_SESSION['user'] = $row['email'];
	$_SESSION['fullname'] = $row['fullname'];
	$_SESSION['id'] = $row['id'];

	// Chuyển hướng sang trang chủ
	header('Location: homepage.php');

} else {
	echo "Đăng nhập thất bại! Email hoặc mật khẩu không đúng.";
	// Tro ve trang dang nhap sau 3 giay
	header('Refresh: 3;url=login.php');
}

$conn->close();
?>