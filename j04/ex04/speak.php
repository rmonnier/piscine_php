<?php
session_start();

if ($_SESSION['loggued_on_user'] == "")
	exit("ERROR\n");

if ($_POST['submit'] == 'OK' && strlen($_POST['msg']) > 0)
{
	$chat_folder = "../htdocs/private";
	$chat_path = $chat_folder . "/chat";

	if (!file_exists($chat_folder))
		mkdir($chat_folder, 0777, true);

	if (!(file_exists($chat_path)))
	{
		$chat = array();
		$chat[] = array('login' => $_SESSION['loggued_on_user'], 'time' => time(), 'msg' => $_POST['msg']);
		$chat_serialized = serialize($chat);
		file_put_contents($chat_path, $chat_serialized);
	}
	else
	{
		$fd = fopen($chat_path, "c+");
		flock($fd, LOCK_EX | LOCK_SH);
		$array = file_get_contents($chat_path);
		$chat_serialized = file_get_contents($chat_path);
		$chat = unserialize($chat_serialized);
		$chat[] = array('login' => $_SESSION['loggued_on_user'], 'time' => time(), 'msg' => $_POST['msg']);
		$chat_serialized = serialize($chat);
		file_put_contents($chat_path, $chat_serialized);
		flock($fd, LOCK_UN);
		fclose($fd);
	}
}
?>
<html>
<head>
<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
</head>
<body>
<form method="post" action="speak.php">
	Message: <input type="text" name="msg" autofocus />
	<input type="submit" name="submit" value="OK" />
</form>
</body></html>
