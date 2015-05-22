<?php
/**
 * Réalise la requête SQL du choix 2: Les n gènes présentant le plus de transcrits.
 * @param PDO object $connexion L'objet connecté à la base de donnée
 * @return object $returned L'objet PDO contenant les résultats
 * */
function doQuery_choix2($connexion)
{
	try
	{ // Requete dans le cas où le stable_id est dans la table gene et transcript.
	// je catch quand même l'erreur 1142: permission denied.
	// Je fais ca a cause d'un problème sql que j'ai pas réussi à résoudre
		$sql = 'SELECT G.stable_id AS Stable_ID, count(*) AS nb_Transcript, G.description AS Description FROM transcript T, gene G WHERE G.gene_id=T.gene_id GROUP BY T.gene_id ORDER BY nb_transcript DESC LIMIT ' . $_SESSION['query'];
		$returned = $connexion->query($sql);
		return $returned;
	}
	catch (Exception $e)
	{ 	// Exception si le champ stable ID n'est pas dans la table gene
		if ($e->getCode() === '42S22')
		{ // Jointure des tables
			$sql = 'SELECT G2.stable_id AS Stable_ID, count(*) AS nb_Transcript, G1.description AS Description FROM transcript T, gene G1, gene_stable_id G2 WHERE G1.gene_id=T.gene_id AND G1.gene_id=G2.gene_id GROUP BY T.gene_id ORDER BY nb_transcript DESC LIMIT ' . $_SESSION['query'];
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
