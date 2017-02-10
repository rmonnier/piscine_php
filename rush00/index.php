<?php

session_start();

?>
<html>
<HEAD>
	<meta content="commerce en ligne; sangare; monnier; 42; piscine; php" name="keywords">
	<Meta  charset = "UTF-8">
<style type="text/css">
.copyright {
font-style : italic ;
font-family : monospace ;
text-align : right ;
}
table {
 border-width:1px;
 border-style:solid;
 border-color:black;
 width:50%;
 }
td {
 border-width:1px;
 border-style:solid;
 border-color:black;
 width:50%;
 }
 div{
	 font-style : italic ;
	 font-family : monospace ;
	background-color: #FFFACD;
	}
html {
color: black;
background-color: #DEB887;
background-image: url("https://www.eic.fr/content/externe/site/commun/images/fond.png");
background-repeat: no-repeat;
background-attachment: scroll;
background-position: 50% 50%;
}

h1 {
color :  #000000 ;
text-align : center ;
}
.copyright {
font-style : italic ;
font-family : monospace ;
text-align : right ;
}

:link {
color: #0000ee;
font-style : italic ;
font-family : monospace ;
}

:link:active {
color: #ee0000;
font-style : italic ;
font-family : monospace ;
}

:link:visited {
color: #551a8b;
font-style : italic ;
font-family : monospace ;
}

</style>
</head>
<body>
	<center>
		<h1><B> Vous êtes chez Robin et Franck </B></h1>
<br/><br/><br/>
	</center>
  <table contentEditable="true">


<?php
include("./auth.php");
if (strlen($_SESSION['loggued_on_user']) > 0)
{
?>


<p>Accéder à mon compte</p>
		<br />
<a href="user_modif.html">Modifier mon mot de passe</a>
		<br />
<?php if ($_SESSION['loggued_on_user'] != 'admin')
{

?>
<a href="user_delete.php">Supprimer mon compte</a>
		<br />

<?php
}
?>
<a href="logout.php">Se deconnecter</a>
		<br />

<?php

	if ($_SESSION['loggued_on_user'] == 'admin')
		echo '<a href="admin.php">Espace administrateur</a>';
}
else
{
?>


<form method="post" action="login.php">
	Identifiant: <input type="text" name="login" />
	Mot de passe: <input type="password" name="passwd" />
	<input type="submit" name="submit" value="OK" />
</form>
	<br/>	<br/><br/>	<br/>
	<a href="user_create.html">Créer votre compte utilisateur !!!!</a>
	<br/>

<?php
}
?>

<h1> Selection articles</h1><br/>

<a  href = 'item_by_category.php?category=all'> Tous les articles :</a>
<br/>
<h2> par catégorie :<br/><br/>
<?php
include("./category_get.php");
include("./category_push.php");

$category = category_get();

if (isset($category))
{
	foreach($category as $entry)
	{
?>

<a href= <?php echo '"' . 'item_by_category.php?category=' . $entry . '"';?> > <?php echo $entry; ?> </a><br />


<?php
	}
}
?>


<?php

	if (strlen($_SESSION['loggued_on_user']) > 0)
{
?>


<p>
	<a href="basket.php">Valider mon panier !</a><br/><br/></P>

<?php
}
 ?>
	<table contentEditable="true">
	<tr>
		<td>
			<div class="element" style="background: rgb(128,218,235)">
				Référence article
			</div>
		</td>
		<td>
			<div class="element" style="background: rgb(128,218,235)">
				Prix unitaire en Euros
			</div>
		</td>
		<td>
			<div class="element" style="background: rgb(128,218,235)">
				Quantité
			</div>
		</td>
	</tr>
	<?php


	$category = category_get();

	if (isset($_SESSION['basket']))
	{
		foreach($_SESSION['basket'] as $entry)
		{
	?>

	<?php echo '<tr><td><div class="element">'.$entry['name'] .'</div></td> <td><div class="element">'. $entry['pu'].'</div></td> <td><div class="element">' . $entry['qt'].'</div></td></tr>';?>


<?php
	}
}
?>
</table>
<hr/>
<p  class = "copyright"> © rmonnier/fsangare 2016 </p>
</body>
</html>
