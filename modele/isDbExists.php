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
			$erreur_sql = 'La base de données '.$db."n'éxiste pas";
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
