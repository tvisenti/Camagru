<?php
session_start();
if (!$_SESSION["log_user"])
	header("location: index.html");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
    </style>
    <link rel="stylesheet" type="text/css" href="page.css">
    <title>Camagru</title>
</head>
<body>
    <div id="container">
        <?php require_once('header.php');?>
        <div id="page">
            <div class="body_row">

            </div>
        </div>
        <footer>
            <div id="footer">
                <p>&copy; tvisenti</p>
            </div>
        </footer>
    </div>
</body>
</html>
