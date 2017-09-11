<?php
	include 'initdata.php';
?>

<header>
	<div id="header">
		<img id="logo" src="http://img15.hostingpics.net/pics/660371kwamashoplogo2.png" width="50%" height="auto">
		<div id="login">
			<form action="session.php" method="POST">
				<input type="submit" name="LOGOUT" value="LOGOUT">
				<input type="submit" name="DELETE_ACCOUNT" value="DELETE_ACCOUNT">
			</form>
				<?php
				session_start();
				if ($_SESSION["user_lvl"] == 2)
				{
				?>
				<form action="admin.php" method="POST">
					<input type="submit" name="ADMIN" value="ADMIN">
				</form>
				<?php
				}
				?>
		</div>
</div>
</header>
