<?php

include_once('getKeys.php');

//Crée une table avec tout les champs de type TEXT
function createTable($array_results, $tableName){

	
	global $bdd;
	
	$keys = getKeys($array_results);

	//Tout les champs sont des variables 'TEXT' sauf le 1er (id)
	$columns = implode(" TEXT, ", $keys).' TEXT';
	
	$req = $bdd->exec("CREATE TABLE $tableName (id INT PRIMARY KEY NOT NULL, $columns)");
}
