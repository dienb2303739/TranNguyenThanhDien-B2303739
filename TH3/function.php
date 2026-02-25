<!DOCTYPE html>
<html>
<body>

<?php
declare(strict_types=0);

function addNumbers(int $a, int $b) {
    return $a + $b;
}

echo addNumbers(5, 10);   // 15
echo "<br>";
echo addNumbers(6, "10"); // 16
?>

</body>
</html>
