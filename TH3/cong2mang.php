<!DOCTYPE html>
<html>
<body>

<?php
function cong2mang($a, $b) {
    if (count($a) != count($b)) {
        return "Lỗi: Hai mảng không cùng độ dài";
    }

    $ketQua = [];
    for ($i = 0; $i < count($a); $i++) {
        $ketQua[] = $a[$i] + $b[$i];
    }

    return $ketQua;
}

$a = [344, 224, 223, 7737, 9922, -828];
$b = [-344, -324, 123, 773, -9922, 828];

$kq = cong2mang($a, $b);

if (is_array($kq)) {
    echo "Kết quả cộng hai mảng là:<br>";
    print_r($kq);
} else {
    echo $kq;
}
?>


</body>
</html>
