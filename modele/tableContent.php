<?php
/**
 * Module contenant la fonction de recherche du contenu d'une table de l'utilisateur
 * */
 
/**
 * Retourne un array contenant le contenu d'une table de la base de données de l'utilisateur
 * @param string $sTableName
 * @return array $arResults Le contenu de la table
 * */
function tableContent($sTableName) {
	global $opdoConnexionToUserDb;

	$sTableName = trim($opdoConnexionToUserDb->quote($sTableName), "'");
	$spdoReq = $opdoConnexionToUserDb->query("SELECT * FROM " . $sTableName);
	$arResult = $spdoReq->fetchAll();

	return $arResult;		
}
?>
