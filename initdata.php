<?php

session_start();

function	initdata($login, $email)
{
	$tab = array();
	if (file_exists("./private/user"))
	{
		$fp = fopen("./private/user", "r+");
		flock($fp, LOCK_EX | LOCK_SH);
		$contents = file_get_contents("./private/user");
		$tab = unserialize($contents);
	}
	array_push($tab, inituser($login, $email));
	$data = serialize($tab);
	file_put_contents("./private/user", $data);
	if ($fp)
	{
		flock($fp, LOCK_UN);
		fclose($fp);
	}
}

function	inituser($login, $email)
{
	$data = array("login" => $login, "email" => $email, "isAdmin" => 0 , "validAccount" => 0);
	return $data;
}

function	add($name, $category, $email)
{
	$category = explode(",", $category);
	$data = array("name" => $name, "email" => $email);
	return $data;
}

function	getall($file, $user ,$info)
{
	$fp = fopen("./private/".$file, "r+");
	flock($fp, LOCK_EX | LOCK_SH);
	$x = 0;
	$tab = unserialize(file_get_contents("./private/"."$file"));
	while ($tab[$x])
	{
		if ($tab[$x]["login"] == $user)
		$tab1 = $tab[$x][$info];
		$x++;
	}
	file_put_contents("./private/".$file, serialize($tab));
	flock($fp, LOCK_UN);
	fclose($fp);
	return $tab1;
}

function	getdata($file, $user ,$info)
{
	$fp = fopen("./private/".$file, "r+");
	flock($fp, LOCK_EX | LOCK_SH);
	$x = 0;
	$tab = unserialize(file_get_contents("./private/"."$file"));
	while ($tab[$x])
	{
		if ($tab[$x]["name"] == $user)
		$tab1 = $tab[$x][$info];
		$x++;
	}
	file_put_contents("./private/".$file, serialize($tab));
	flock($fp, LOCK_UN);
	fclose($fp);
	return $tab1;
}

function	getelem($file, $elem)
{
	$x = 0;
	$tab = unserialize(file_get_contents("./private/"."$file"));
	while ($tab[$x])
	{
		if ($tab[$x]["id"] == $elem)
		$tab1 = $tab[$x][$info];
		$x++;
		return $tab1;
	}
}

function	getelem2($file, $elem)
{
	$fp = fopen("./private/".$file, "r+");
	flock($fp, LOCK_EX | LOCK_SH);
	$tab = unserialize(file_get_contents("./private/"."$file"));
	$toto =	$tab[$user][$info];
	file_put_contents("./private/".$file, serialize($tab));
	flock($fp, LOCK_UN);
	fclose($fp);
	return $toto;
}


function	delete_user($file, $user)
{
	$fp = fopen("./private/".$file, "r+");
	flock($fp, LOCK_EX | LOCK_SH);
	$tab = unserialize(file_get_contents("./private/"."$file"));
	foreach ($tab as $key => $value)
	{
		if ($user == $key)
		unset($tab[$key]);
	}
	file_put_contents("./private/".$file, serialize($tab));
	flock($fp, LOCK_UN);
	fclose($fp);
	return 0;
}

?>
