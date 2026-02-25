<?php
$csv = array();
$name_file = 'cus.csv';
$lines = file($name_file, FILE_IGNORE_NEW_LINES);
foreach ($lines as $key => $value) {
	$csv[$key] = str_getcsv($value);
}
echo '<pre>';
print_r($csv);
echo '</pre>';
?>