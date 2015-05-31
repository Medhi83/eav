<?php
/**
 * Module contenant la fonction de vérification de la base de données.
 * */

/**
 * Vérifie si la database settée existe dans ensembl
 * @param str $db Nom de la database
 * */
function isDbExists($db)
{
	try
	{
		$opdoConnexionToEnsembl = new PDO('mysql:host=ensembldb.ensembl.org;dbname=' . $db . ';charset=utf8', 'anonymous', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (PDOException $e)
	{
		// Code erreur 1049: Unknown database
		if ($e->getCode() === 1049)
		{
			$sErreurSQL = 'La base de données '.$db."n'éxiste pas";
			include_once('vue/errorSQL.php');
			exit;
		}
		else
		{
			throw $e;
		}
	}
}
?>
