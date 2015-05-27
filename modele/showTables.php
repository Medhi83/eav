<?php

//Retourne les tables de la base de données locale
function showTables() {
	global $bdd;

	$req = $bdd->prepare('SHOW TABLES');
	$req->execute();
	$result = $req->fetchAll();

	return $result;		
}
