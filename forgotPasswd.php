<?php
include 'initdata.php';

if ($_POST["forgotPasswd"])
{
	if ($_POST["submit"] === "OK" && file_exists("./private/passwd"))
	{
		$x = 0;
		$fp = fopen("./private/passwd", "r+");
		flock($fp, LOCK_EX | LOCK_SH);
		$contents = file_get_contents("./private/passwd");
		$tab = unserialize($contents);
		foreach ($tab as $key => $value)
		{
			if ($_POST["login"] == $key && $value == hash("haval224,3", $_POST["oldpw"]))
			{
				$tab[$_POST["login"]] = hash("haval224,3", $_POST["newpw"]);
				$data = serialize($tab);
				file_put_contents("./private/passwd", $data);
				$x = 1;
				?>
				<script language="javascript">
				alert("Valid: New password is valid.");
				document.location.href = '/camagru/index.html';
				</script>
				<?php
			}
		}
		if ($x == 0)
		{
			?>
			<script language="javascript">
			alert("Error: One field is wrong.");
			document.location.href = '/camagru/modifUser.html';
			</script>
			<?php
		}
		flock($fp, LOCK_UN);
		fclose($fp);
	}
	else
	{
		?>
		<script language="javascript">
		alert("Error: An error occured.");
		document.location.href = '/camagru/modifUser.html';
		</script>
		<?php
	}
}
else
{
	?>
	<script language="javascript">
	alert("Error: One field is empty.");
	document.location.href = '/camagru/modifUser.html';
	</script>
	<?php
}
?>
