<?php
/**
 * Module contenant la fonction de traitement des requêtes pour l'appel de la fonction nécessaire
 * */

include_once('doQuery_choix.php');

/**
 * Appelle la fonction responsable de la requête demandée
 * @param PDO object $connexion L'objet connecté à la base de donnée
 * @return object $returned L'objet PDO contenant les résultats
 * */
function parseQueryChoice($connexion)
{
	$sFunctionForQuery = "return doQuery_" . $_SESSION['radio'] . "(\$connexion);";
	$spdoResults = eval($sFunctionForQuery);
	return $spdoResults;
}
?>
