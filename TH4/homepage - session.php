<?php
// BẮT BUỘC: Phải khởi động session ở dòng đầu tiên của file
session_start();
?>
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	.w3-sidebar a {
		font-family: "Roboto", sans-serif
	}

	body,
	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	.w3-wide {
		font-family: "Montserrat", sans-serif;
	}
</style>

<body class="w3-content" style="max-width:1200px">

	<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
		<div class="w3-container w3-display-container w3-padding-16">
			<i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
			<h3 class="w3-wide"><b>
					<?php
					// Kiểm tra xem người dùng đã đăng nhập chưa (có session chưa)
					if (isset($_SESSION['fullname']) && isset($_SESSION['id'])) {

						echo 'Chao ban ' . $_SESSION['fullname'];

						// Ket noi CSDL
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "qlbanhang";

						$conn = new mysqli($servername, $username, $password, $dbname);

						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}

						// SỬA: Dùng $_SESSION['id'] thay vì cookie
						$id = $_SESSION['id'];
						$sql = "SELECT img_profile FROM customers WHERE id = '$id'";

						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							$row = $result->fetch_assoc();
							// Hien thi anh (Them style de anh nho lai va tron cho dep)
							echo '<br><img src="./uploads/' . $row['img_profile'] . '" alt="Anh profile" style="width:80px; height:80px; border-radius:50%; margin-top:10px;">';
						}
						$conn->close();
					} else {
						// Nếu chưa đăng nhập
						echo 'Chao ban (Khach)';
						echo '<br><a href="login.php" class="w3-button w3-black w3-small w3-margin-top">Dang nhap</a>';
					}
					?>

				</b></h3>
		</div>
		<div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
			<a href="#" class="w3-bar-item w3-button">Shirts</a>
			<a href="#" class="w3-bar-item w3-button">Dresses</a>

			<div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
				<a href="#" class="w3-bar-item w3-button w3-light-grey"><i
						class="fa fa-caret-right w3-margin-right"></i>Skinny</a>
				<a href="#" class="w3-bar-item w3-button">Relaxed</a>
				<a href="#" class="w3-bar-item w3-button">Bootcut</a>
				<a href="#" class="w3-bar-item w3-button">Straight</a>
			</div>
			<a href="#" class="w3-bar-item w3-button">Jackets</a>
			<a href="#" class="w3-bar-item w3-button">Gymwear</a>
			<a href="#" class="w3-bar-item w3-button">Blazers</a>
			<a href="#" class="w3-bar-item w3-button">Shoes</a>
		</div>
		<a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a>
		<a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding"
			onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a>
		<a href="#footer" class="w3-bar-item w3-button w3-padding">Subscribe</a>
	</nav>

	<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
		<div class="w3-bar-item w3-padding-24 w3-wide">LOGO</div>
		<a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i
				class="fa fa-bars"></i></a>
	</header>

	<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu"
		id="myOverlay"></div>

	<div class="w3-main" style="margin-left:250px">

		<div class="w3-hide-large" style="margin-top:83px"></div>