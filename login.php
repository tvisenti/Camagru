<?php
session_start();
include 'auth.php';
include 'initdata.php';
if ($_POST["login"] && $_POST["password"])
{
	if (auth($_POST["login"], $_POST["password"]) === TRUE)
	{
		$_SESSION["log_user"] = $_POST["login"];
		$_SESSION["user_lvl"] = getall("user", $_POST["login"], "userlvl");
		header("location: frontPage.php");
	}
	else
	{
		$_SESSION["log_user"] = "";
		header("location: index.html");
		echo "ERROR\n";
	}
}
else
{
	$_SESSION["log_user"] = "";
	header("location: index.html");
	echo "ERROR\n";
}
?>
