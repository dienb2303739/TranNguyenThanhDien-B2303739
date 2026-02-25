<!DOCTYPE html>
<html>
	<body>
		<!-- Hello 
	<?php echo $_POST["name"]; ?><br>
	Your email address is: <?php $_POST["email"];?> -->
	<form action="welcome.php" method="post">
		Name: <input type="text" name="name"> <br>
		E-mail <input type="text" name="email"> <br>
		Password <input type="Password" name="password" > <br>
		Birthday <input type="date" id="birthday" name="birthday"> <br>
		<input type="submit">
	</form>
	</body>
</html>
