<?php

function auth($login, $passwd)
{
	$pw_folder = "../htdocs/private";
	$pw_path = $pw_folder . "/passwd";

	if (!file_exists($pw_folder) || !file_exists($pw_path))
		return (false);

	$passwd_serialized = file_get_contents($pw_path);
	$passwd_tab = unserialize($passwd_serialized);

	foreach($passwd_tab as $entry)
	{
		if ($entry['login'] === $login)
		{
			$passwd_hash = hash('whirlpool', $passwd);
			if ($passwd_hash == $entry['passwd'])
				return (true);
			else
				return (false);
		}
	}
	return (false);
}

?>
