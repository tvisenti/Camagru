<?php
include 'initdata.php';
if ($_POST["login"] && $_POST["email"] && $_POST["passwd"] && $_POST["submit"])
{
	if ($_POST["submit"] === "OK")
	{
		if (preg_match("#^([\w])+$#", html_entity_decode($_POST["login"])) != 1)
		{
			?>
			<script language="javascript">
			alert("Error: Wrong format username.");
			document.location.href = '/camagru/createUser.html';
			</script>
			<?php
			exit();
		}
		if (preg_match("#^([\w.])+@(([\w]+).([\w])+)+$#", html_entity_decode($_POST["email"])) != 1)
		{
			?>
			<script language="javascript">
			alert("Error: Wrong format email.");
			document.location.href = '/camagru/createUser.html';
			</script>
			<?php
			exit();
		}

		if (!file_exists("./private"))
		mkdir("./private");
		$x = 0;
		if (file_exists("./private/passwd"))
		{
			$fp = fopen("./private/passwd", "r+");
			flock($fp, LOCK_EX | LOCK_SH);
			$contents = file_get_contents("./private/passwd");
			$tab = unserialize($contents);
			foreach ($tab as $key => $value)
			{
				if ($_POST["login"] == $key)
				$x = 1;
			}
		}
		if ($x == 0)
		{
			$tab[$_POST["login"]] = hash("haval224,3", html_entity_decode($_POST["login"]));
			$data = serialize($tab);
			initdata(html_entity_decode($_POST["login"]), html_entity_decode($_POST["email"]));
			file_put_contents("./private/passwd", $data);
			$message = "Bonjour " . $_POST["login"] . ",\rMerci de cliquer sur le lien afin de confirmer votre inscription sur Camagru.\r\n";
			$subject = "Confirmation du compte de " . $_POST["login"];
			mail($_POST["email"], $subject, $message);
			?>
			<script language="javascript">
			alert("Please check your mails for validation.");
			document.location.href = '/camagru/index.html';
			</script>
			<?php
			exit();
		}
		else
		{
			?>
			<script language="javascript">
			alert("Error: Username/Email is aleready exists.");
			document.location.href = '/camagru/createUser.html';
			</script>
			<?php
			exit();
		}
		if ($fp)
		{
			flock($fp, LOCK_UN);
			fclose($fp);
		}
	}
}
else
{
	?>
	<script language="javascript">
	alert("Error: One field is empty.");
	document.location.href = '/camagru/createUser.html';
	</script>
	<?php
	exit();
}
?>
