<?php
/**
 * Réalise la requête SQL du choix 3: Requete tapée par l'utilisateur.
 * @param PDO object $connexion L'objet connecté à la base de donnée.
 * @return object $returned L'objet PDO contenant les résultats.
 * */
function doQuery_choix3($connexion)
{
	try
	{ 
		$sql = $_SESSION['query'];
		$returned = $connexion->query($sql);
		return $returned;
	}
	catch (Exception $e)
	{ 
		throw $e;
	}
}
?>
