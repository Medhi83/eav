<?php
/**
 * Module contenant:
 * * * la fonction de création d'un array contenant les noms des champs du résultat de la requête.
 * * * la fonction de création d'une table de résultats dans la base de données locale de l'utilisateur
 * * * la fonction d'insertion des résultats dans la table resultats sur la base de données locale de l'utilisateur
 * */

/**
 * Retourne un array contenant le nom des champs des résultats de la requête de l'utilisateur
 * @param array $arResults Tableau contenant les résultats de la requête de l'utilisateur
 * @return array $arFieldNames Array contenant les noms des champs
 */ 
function getKeys($arResults)
{
	$arFieldNames = array();
	foreach (array_keys($arResults[0]) as $key) {
		if (gettype($key) === 'string') {
			array_push($arFieldNames, $key);
		}
	}
	return $arFieldNames;
}

/**
 * Crée une table avec des champs de type TEXT et nommés comme les colonnes résultats
 * dans la base de données locale de l'utilisateur
 * @param array $arResults Tableau contenant les résultats de la requête de l'utilisateur
 * @param string $sTableName String contenant le nom de la table à créer
 */ 
function createTable($arResults, $sTableName){

	global $opdoConnexionToUserDb;
	if (count($arResults) > 0)
	{
		$arFieldNames = getKeys($arResults);

		// Tous les champs sont des variables 'TEXT' sauf le 1er (id)
		$sColumns = implode(" TEXT, ", $arFieldNames).' TEXT';
		$sTableName = $opdoConnexionToUserDb->quote($sTableName);
		$bResult = $opdoConnexionToUserDb->exec("CREATE TABLE `" . trim($sTableName, "'") . "` (id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT, " . $sColumns . ")");
		if ($bResult === false)
		{
			echo 2;
			exit;
		}
	}
	else
	{
		echo 4;
		exit;
	}
}

/**
 * Insére les résultats dans la table sur la base de données locale de l'utilisateur
 * @param array $arResults Tableau contenant les résultats de la requête de l'utilisateur
 * @param string $sTableName String contenant le nom de la table à créer
 */ 
function insertData($arResults, $sTableName) 
{
	global $opdoConnexionToUserDb;

	$arFieldNames = getKeys($arResults);
	
	$columns = implode(", ", $arFieldNames);

	$i = 0;
	$totalValues = array();
	foreach($arResults as $element){
		
		$values = array();
		foreach ($arResults[$i] as $key => $value){
			if (gettype($key) === "string") {
				array_push($values, $opdoConnexionToUserDb->quote($value));
			}			
		}
		$values = implode(", ", $values);
		array_push($totalValues, "(".$values.")");
		$i += 1;
	}
	$totalValues = implode(", ", $totalValues );
	$sTableName = $opdoConnexionToUserDb->quote($sTableName);
	$bResult = $opdoConnexionToUserDb->exec('INSERT INTO `' . trim($sTableName, "'") . '` ( '.$columns.' ) VALUES '.$totalValues);
	if ($bResult === false)
	{
		$opdoConnexionToUserDb->exec('DROP TABLE `' . trim($sTableName, "'") . '`');
		echo 3;
		exit;
	}
}
?>
