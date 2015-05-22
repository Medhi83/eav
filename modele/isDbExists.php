<?php
/**
 * Vérifie si la database settée existe dans ensembl
 * @param str $db Nom de la database
 * */
function isDbExists($db)
{
	try
	{
		$connexion = new PDO('mysql:host=ensembldb.ensembl.org;dbname=' . $db . ';charset=utf8', 'anonymous', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (PDOException $e)
	{
		// Code erreur 1049: Unknown database
		if ($e->getCode() === 1049)
		{
			die("Erreur : " . $e->getCode() . " -> La base de données " . $db . " n'existe pas. <br /><a href=index.php>Retour à la page d'accueil</a>");
		}
		else
		{
			throw $e;
		}
	}
}
?>
