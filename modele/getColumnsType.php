<?php

//Renvoie le type des colonnes d'une table
function getColumnsType($table_name){
	global $ConnexionToEnsembl;
	$table_name = (string) $table_name;

	$req = $ConnexionToEnsembl->prepare('SELECT COLUMN_NAME, DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME=:table LIMIT 10;');
	$req->bindParam(':table', $table_name, PDO::PARAM_STR);
	$req->execute();
	$result = $req->fetchAll();
	return $result;
}
