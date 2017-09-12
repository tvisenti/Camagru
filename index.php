<?php
session_start();
if (!$_SESSION["log_user"])
	header("location: index.html");
else
	header("location: frontPage.php");

?>
