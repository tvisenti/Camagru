<?php
session_start();
if (!$_SESSION["log_user"])
header("location: index.html");
?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="jpeg_camera/jpeg_camera_with_dependencies.min.js" type="text/javascript"></script>

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
            <div id="camera_info">
            </div>
            <div id="camera">
            </div>
            <button id="take_snapshots" class="btn btn-success btn-sm">Take Snapshots</button>
            <!-- <form>
                <input type="button" value="Take Snapshot" onClick="take_snapshot()">
            </form> -->
        </div>
        <footer>
            <div id="footer">
                <p>&copy; tvisenti</p>
            </div>
        </footer>
    </div>
</body>
</html>
