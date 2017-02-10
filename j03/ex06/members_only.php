<?php



$valid_pw = array("zaz" => "jaimelespetitsponeys");
$valid_user = array_keys($valid_pw);

$user = $_SERVER['PHP_AUTH_USER'];
$pw = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($user, $valid_user)) && ($pw == $valid_pw[$user]);

if (!$validated)
{
	header('HTTP/1.0 401 Unauthorized');
	header("WWW-Authenticate: Basic realm=''Espace membres''");
	echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>";
}
else
{
	echo "<html><body>\n";
	echo "Bonjour Zaz<br />\n";
	$data = file_get_contents("../img/42.png");
	$data64 = base64_encode($data);
	echo "<img src='data:image/png;base64," . $data64 . "'>\n";
	echo "</body></html>\n";
}
?>
