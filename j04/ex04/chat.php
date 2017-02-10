<?php
date_default_timezone_set('Europe/Paris');
$chat_folder = "../htdocs/private";
$chat_path = $chat_folder . "/chat";

if (file_exists($chat_path) == TRUE)
{
	$test = unserialize(file_get_contents($chat_path));
	foreach ($test as $value)
	{
		echo "[";
		echo date("H:i", $value['time']);
		echo "] ";
		echo "<b>";
		echo $value['login'];
		echo "</b>: ";
		echo $value['msg'];
		echo "<br />\n";
	}
}
?>
