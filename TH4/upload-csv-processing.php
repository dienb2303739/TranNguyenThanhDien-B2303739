<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanhang";

// 1. Kết nối CSDL
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra người dùng có bấm nút submit chưa
if (isset($_POST["submit"])) {

	// Tạo thư mục uploads nếu chưa có
	$target_dir = "uploads/";
	if (!file_exists($target_dir)) {
		mkdir($target_dir, 0777, true);
	}

	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	// 2. KIỂM TRA ĐỊNH DẠNG FILE
	// Chỉ cho phép file .csv
	if ($fileType != "csv") {
		echo "<div class='w3-panel w3-red'><h3>Lỗi!</h3><p>Chỉ chấp nhận file định dạng CSV.</p></div>";
		$uploadOk = 0;
	}

	// 3. XỬ LÝ UPLOAD VÀ IMPORT
	if ($uploadOk == 0) {
		echo "Xin lỗi, tập tin của bạn không được upload.";
	} else {
		// Di chuyển file từ bộ nhớ tạm vào thư mục uploads
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "<p>File " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " đã được upload.</p>";

			// --- BẮT ĐẦU ĐỌC FILE CSV VÀ INSERT VÀO DATABASE ---

			// Mở file ở chế độ Read (r)
			if (($handle = fopen($target_file, "r")) !== FALSE) {

				$row_count = 0; // Đếm số dòng thêm thành công

				// Đọc từng dòng: fgetcsv(file, độ dài tối đa, dấu phân cách)
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

					// Gán biến cho dễ nhìn (Dựa vào thứ tự cột trong file CSV ở Bước 1)
					// $data[0] là Fullname
					// $data[1] là Email
					// $data[2] là Birthday
					// $data[3] là Password

					$fullname = $data[0];
					$email = $data[1];
					// Chuyển định dạng ngày tháng sang Y-m-d chuẩn MySQL (đề phòng file csv viết sai format)
					$birthday = date("Y-m-d", strtotime($data[2]));
					$pass_md5 = md5($data[3]); // Mã hóa mật khẩu MD5

					// Câu lệnh SQL Insert
					$sql = "INSERT INTO customers (fullname, email, Birthday, password) 
                            VALUES ('$fullname', '$email', '$birthday', '$pass_md5')";

					if ($conn->query($sql) === TRUE) {
						$row_count++;
					} else {
						echo "Lỗi dòng ($fullname): " . $conn->error . "<br>";
					}
				}

				fclose($handle); // Đóng file sau khi đọc xong
				echo "<div class='w3-panel w3-green'><h3>Thành công!</h3><p>Đã thêm $row_count khách hàng vào CSDL.</p></div>";

				// Nút quay về
				echo "<a href='upload-csv.php' class='w3-button w3-black'>Quay lại trang upload</a>";

			} else {
				echo "Không thể mở file CSV để đọc.";
			}

		} else {
			echo "Có lỗi xảy ra khi upload file.";
		}
	}
}

$conn->close();
?>