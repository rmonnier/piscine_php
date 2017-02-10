#!/usr/bin/php
<?php

$nb = preg_match("/toto/", "dsflaihjfttodlkfj");

echo $nb."\n";

$nb = preg_match("/^toto$/", "toto");

echo $nb."\n";

$nb = preg_match("/t[oi]t[oi]/", "dfdfdfdfdfdftitidfdfdfdf");

echo $nb."\n";

echo preg_match("/t[a-z]t[0-9]/", "dfdfdfdfdfdftatadfdfdfdf")."\n";

echo preg_match("/t[a-z]+t[0-9]/", "ftaiaefdt8d")."\n";

echo preg_match("/t[a-z]*t[0-9]/", "ftt8d")."\n";

echo preg_match("/t[a-z]{4}t[0-9]/", "ftaedft8d")."\n";

echo preg_match("/t[^a-z]{4}t[0-9]/", "ft4589t8d")."\n";

$nb = preg_match("/t([oi])t\1/", "titi");

echo $nb."\n";

echo preg_match("/[0-9]{2,}/", "2a")."\n";

?>
