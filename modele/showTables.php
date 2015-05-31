<?php
/**
 * Module contenant la fonction de recherche des tables dans une base de données de l'utilisateur
 * */
 
/**
 * Retourne un array contenant les tables de la base de données de l'utilisateur
 * @return array $arResults Le tableau contenant les tables
 * */
function showTables() {
	global $opdoConnexionToUserDb;

	$spdoReq = $opdoConnexionToUserDb->prepare('SHOW TABLES');
	$spdoReq->execute();
	$arResult = $spdoReq->fetchAll();

	return $arResult;		
}
?>
