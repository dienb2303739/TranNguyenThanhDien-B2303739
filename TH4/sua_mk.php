<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlbanhang";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];


    if ($new_pass !== $confirm_pass) {
        $message = "<div class='w3-panel w3-red'><h3>Lỗi!</h3><p>Mật khẩu mới và nhập lại không khớp nhau.</p></div>";
    } elseif ($new_pass === $old_pass) {
        $message = "<div class='w3-panel w3-yellow'><h3>Cảnh báo!</h3><p>Mật khẩu mới không được trùng với mật khẩu cũ.</p></div>";
    } else {

        $id = $_SESSION['id'];
        $sql = "SELECT password FROM customers WHERE id = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $current_db_pass = $row['password'];

            if (md5($old_pass) === $current_db_pass) {

                $new_pass_md5 = md5($new_pass);

                $sql_update = "UPDATE customers SET password = '$new_pass_md5' WHERE id = '$id'";

                if ($conn->query($sql_update) === TRUE) {
                    $message = "<div class='w3-panel w3-green'><h3>Thành công!</h3><p>Đổi mật khẩu thành công.</p></div>";
                } else {
                    $message = "<div class='w3-panel w3-red'><h3>Lỗi!</h3><p>Không thể cập nhật: " . $conn->error . "</p></div>";
                }

            } else {
                $message = "<div class='w3-panel w3-red'><h3>Lỗi!</h3><p>Mật khẩu cũ không chính xác.</p></div>";
            }
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<title>Đổi Mật Khẩu</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>

    <div class="w3-bar w3-black">
        <a href="homepage.php" class="w3-bar-item w3-button">Trang chủ</a>
        <a href="thoat.php" class="w3-bar-item w3-button w3-right">Đăng xuất</a>
    </div>

    <div class="w3-container w3-half w3-display-middle w3-card-4 w3-padding-16">

        <div class="w3-center">
            <h2>Đổi Mật Khẩu</h2>
        </div>

        <?php echo $message; ?>

        <form action="sua_mk.php" method="post" class="w3-container">

            <label class="w3-text-blue"><b>Mật khẩu cũ</b></label>
            <input class="w3-input w3-border" type="password" name="old_pass" required>

            <label class="w3-text-blue"><b>Mật khẩu mới</b></label>
            <input class="w3-input w3-border" type="password" name="new_pass" required>

            <label class="w3-text-blue"><b>Nhập lại mật khẩu mới</b></label>
            <input class="w3-input w3-border" type="password" name="confirm_pass" required>

            <br>
            <button class="w3-btn w3-blue w3-block" type="submit">Lưu thay đổi</button>
            <br>
            <a href="homepage.php" class="w3-button w3-block w3-light-grey">Hủy bỏ</a>

        </form>

    </div>

</body>

</html>