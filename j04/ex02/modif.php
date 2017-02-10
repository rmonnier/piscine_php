<?php
if ($_POST['submit'] != 'OK' || strlen($_POST['login']) <= 0 || strlen($_POST['oldpw']) <= 0 || strlen($_POST['newpw']) <= 0)
	exit("ERROR\n");

$pw_folder = "../htdocs/private";
$pw_path = $pw_folder . "/passwd";

if (!file_exists($pw_folder))
	mkdir($pw_folder, 0777, true);

if (!file_exists($pw_path))
	$passwd = array();
else
{
	$passwd_serialized = file_get_contents($pw_path);
	$passwd = unserialize($passwd_serialized);
}

foreach($passwd as $key => $entry)
{
	if ($entry['login'] == $_POST['login'])
	{
		$old_passwd_hash = hash('whirlpool', $_POST['oldpw']);
		if ($old_passwd_hash == $entry['passwd'])
		{
			$new_passwd_hash = hash('whirlpool', $_POST['newpw']);
			$passwd[$key]['passwd'] = $new_passwd_hash;
			$passwd_serialized = serialize($passwd);
			file_put_contents($pw_path, $passwd_serialized);
			exit("OK\n");
		}
		else
			exit("ERROR\n");
	}
}
exit("ERROR\n");

?>
