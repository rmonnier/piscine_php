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
background-image: url("./paysage-122.jpg");
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
<?php
if ($_SESSION['admin'] == 1)
{
?>
<center>
	<B><h1> Liste des paniers utilisateurs </h1></B>

</center>

<table>
<tr>
	<td>
		<div class="element" style="background: rgb(128,218,235)">
			Référence Catégorie article
		</div>
	</td>
	<td>
		<div class="element" style="background: rgb(128,218,235)">
			Libellé Catégorie article
		</div>
	</td>
</tr>


<?php
include("./users_get.php");
include("./users_push.php");

$users = users_get();

if (isset($users))
{
	foreach($users as $u_entry)
	{
?>
<tr>
	<td>
		<div class="element" style="background: rgb(127,0,255)">
		Users : <?php echo $u_entry['login']; ?>
		</div>
	</td>


<?php

if (isset($u_entry['basket']))
{
	foreach($u_entry['basket'] as $b_entry)
	{
?>


<td>
	<div class="element" style="background: rgb(127,0,255)">
		<?php echo $b_entry['name'];?>
	</div>
</td>
<td>
<?php echo $b_entry['pu']; ?> Euros/unité
</td>
<td>
Quantité x<?php $entry['qt']; ?>
</td>
<td>


<li> <?php echo $entry['name'] . $entry['qt'];?> </li><br />


<?php
	$tot += $entry['pu'] * $entry['qt'];
	}
}
?>
	</td>
</tr>


<?php
	}
}
?>


</table>


<br/>
<br/>
<a  href = "admin.php"> Revenir en arrière !!!! </a>
<Hr/>
<P  class = "copyright"> © rmonnier/fsangare 2016 </p>
	<?php
	}
	else {
		echo "PERMISSION DENIED\n";
	}
	?>
</body>
</html>
