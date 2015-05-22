<?php
/**
 * Réalise la requête SQL du choix 1: Taille du gène spécifié.
 * @param PDO object $connexion L'objet connecté à la base de donnée
 * @return object $returned L'objet PDO contenant les résultats
 * */
function doQuery_choix1($connexion)
{
	try
	{ // Requete dans le cas où le stable_id est dans la table gene.
		$sql = 'SELECT stable_id AS Stable_ID, (seq_region_end - seq_region_start) AS length FROM gene WHERE stable_id="' . $_SESSION['query'] . '"';
		$returned = $connexion->query($sql);
		echo gettype($returned);
		return $returned;
	}
	catch (Exception $e)
	{ // Si le champ stable ID n'est pas dans la table gene.
		if ($e->getCode() === '42S22')
		{ // Jointure des tables
			$sql = 'SELECT G2.stable_id AS Stable_ID, (G1.seq_region_end - G1.seq_region_start) AS length FROM gene G1, gene_stable_id G2 WHERE G2.stable_id="' . $_SESSION['query'] . '" AND G1.gene_id=G2.gene_id';
			$returned = $connexion->query($sql);
			return $returned;
		}
		else
		{ // Sinon r'envoie l'exception plus haut
			throw $e;
		}
	}
}
?>
