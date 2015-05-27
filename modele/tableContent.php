<?php

//Retourne le contenu d'une table locale
function tableContent($table_name) {
	global $bdd;

	$req = $bdd->prepare("SELECT * FROM $table_name");
	$req->execute();
	$result = $req->fetchAll();

	return $result;		
}
