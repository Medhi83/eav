<?php
/**
 * Module contenant :
 * * * la fonction de recherches des bases de données ensembl contenant '_core_'.
 * * * la fonction de création du tableau de bases de données ensembl
 * */

/**
 * Retrouve les bases de donnée Ensembl où '_core_' apparait dans le nom.
 * @return $results L'object PDO contenant les résultats
 * */
function searchAvailableDbLike_Core_()
{
	$opdoConnexionToEnsembl = new PDO('mysql:host=ensembldb.ensembl.org;charset=utf8', 'anonymous', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$spdoDbLikeCore = $opdoConnexionToEnsembl->query("SHOW DATABASES LIKE '%\_core\_%'");
	return $spdoDbLikeCore;
}

/**
 * Crée un tableau associatif organisme => db_la_plus_récente
 * @return array $arMostRecentDbs L'objet PDO contenant les résultats
 * */
function createDbArray()
{
	$spdoDbLikeCore = searchAvailableDbLike_Core_();
	$arMostRecentDbs = array();
	while ($donnees = $spdoDbLikeCore->fetch())
	{
		/* Récupération du nom de l'organisme avant '_core_' en tant que
		 * clé avec le nom de la base de données la plus récente en objet.
		 * La dernière base parcourue pour un organisme écrase toutes les autres
		 * cad, il ne reste que la plus récente.
		 * */
		$arMostRecentDbs[preg_split('#_core_#', $donnees['Database (%\\_core\\_%)'])[0]] = $donnees['Database (%\\_core\\_%)'];
	}
	$spdoDbLikeCore->closeCursor();
	return $arMostRecentDbs;
}
?>
