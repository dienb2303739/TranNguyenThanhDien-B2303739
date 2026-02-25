<!DOCTYPE html>
<html>

<head>
	<title>Upload File CSV</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>

	<div class="w3-container w3-card-4 w3-content w3-margin-top" style="max-width:600px">
		<div class="w3-center w3-padding-16">
			<h2>Import Dữ Liệu Khách Hàng (CSV)</h2>
		</div>

		<form action="upload-csv-processing.php" method="post" enctype="multipart/form-data" class="w3-container">

			<label class="w3-text-blue"><b>Chọn file CSV để import:</b></label>
			<input class="w3-input w3-border" type="file" name="fileToUpload" id="fileToUpload" required accept=".csv">
			<br>

			<button class="w3-btn w3-blue w3-block w3-margin-bottom" type="submit" name="submit">Upload &
				Import</button>
		</form>
	</div>

</body>

</html>