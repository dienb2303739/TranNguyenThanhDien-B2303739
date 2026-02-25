<?php
session_start();

session_unset();

session_destroy();

setcookie("user", "", time() - 3600, "/");
setcookie("fullname", "", time() - 3600, "/");
setcookie("id", "", time() - 3600, "/");

header('Location: login.php');
exit();
?>