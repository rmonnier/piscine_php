<p>
	Veuillez remplir le formulaire :<br />
</p>

<form method="post" action="index.php">
<p>
	<input type="text" name="prenom" />
	<textarea name="msg" rows="8" cols="20">Msg ici</textarea>
	<select name="choix">
		<option value="choix1">Choix 1</option>
		<option value="choix2">Choix 2</option>
	</select>
</p>
</form>

<?php
echo "<p>Bonjour " . $_POST['prenom'] . "</p>";
?>
