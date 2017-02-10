<?php

if ($_POST['submit'] != 'OK' || strlen($_POST['login']) <= 0 || strlen($_POST['passwd']) <= 0)
	exit("ERROR\n");

$pw_folder = "../htdocs/private";
$pw_path = $pw_folder . "/passwd";

if (!file_exists($pw_folder))
	mkdir($pw_folder, 0777, true);

if (!(file_exists($pw_path)))
	$passwd = array();
else
{
	$passwd_serialized = file_get_contents($pw_path);
	$passwd = unserialize($passwd_serialized);
}

foreach($passwd as $entry)
{
	if ($entry['login'] === $_POST['login'])
		exit("ERROR\n");
}

$passwd_hash = hash('whirlpool', $_POST['passwd']);
$passwd[] = array('login' => $_POST['login'], 'passwd' => $passwd_hash);
$passwd_serialized = serialize($passwd);
file_put_contents($pw_path, $passwd_serialized);
header("Location: index.html");
echo "OK\n";

?>
