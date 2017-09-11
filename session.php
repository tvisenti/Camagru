<?php
session_start();
include 'initdata.php';
if ($_POST["Logout"] == "Logout")
{
	session_destroy ();
	header("location: index.html");
}
if ($_POST["Delete"] == "Delete")
{
	header("location: index.html");
	delete_user("user", $_SESSION["log_user"]);
	delete_user("passwd", $_SESSION["log_user"]);
}
?>
