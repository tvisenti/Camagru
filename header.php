<?php
	include 'initdata.php';
?>

<header>
	<div id="header">
		<img id="logo" src="https://img11.hostingpics.net/thumbs/mini_907215text2imageT7649520170911131234.png" width="50%" height="auto">
		<div id="login">
			<form action="session.php" method="POST">
				<input type="submit" name="Logout" value="Logout">
				<input type="submit" name="Delete" value="Delete">
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
