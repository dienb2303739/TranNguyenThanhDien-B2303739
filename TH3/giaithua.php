<!DOCTYPE html>
<html>
<body>

<?php
function giaiThua($n) {
    if ($n < 0) {
        return "Không tính được giai thừa số âm";
    }

    $ketQua = 1;
    for ($i = 1; $i <= $n; $i++) {
        $ketQua *= $i;
    }
    return $ketQua;
}

// Chạy thử với 10!
$n = 5;
echo $n . "! = " . giaiThua($n);
?>


</body>
</html>
