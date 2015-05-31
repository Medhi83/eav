<?php
/**
 * Module contenant les fonction d'exécution des requêtes.
 * */

/**
 * Réalise la requête SQL du choix 1: Taille du gène spécifié.
 * @param PDO object $connexion L'objet connecté à la base de donnée
 * @return object $spdoResults L'objet PDO contenant les résultats
 * */
function doQuery_choix1($connexion)
{	// Cas du gene
	try
	{
		$sql = 'SELECT stable_id AS Stable_ID, (seq_region_end - seq_region_start) AS length FROM gene WHERE stable_id="' . $_SESSION['query'] . '"';
		$spdoResults = $connexion->query($sql);
	}
	catch (Exception $e)
	{ // Si le champ stable ID n'est pas dans la table gene.
		if ($e->getCode() === '42S22')
		{ // Jointure des tables
			$sql = 'SELECT GS.stable_id AS Stable_ID, (G.seq_region_end - G.seq_region_start) AS length FROM gene G, gene_stable_id GS WHERE GS.stable_id="' . $_SESSION['query'] . '" AND G.gene_id=GS.gene_id';
			$spdoResults = $connexion->query($sql);
		}
		else
		{ // Sinon r'envoie l'exception plus haut
			throw $e;
		}
	}
	// Cas du transcrit
	if ($spdoResults->rowcount() == 0)
	{
		$spdoResults->closeCursor();
		try
		{
			$sql = 'SELECT stable_id AS Stable_ID, (seq_region_end - seq_region_start) AS length FROM transcript WHERE stable_id="' . $_SESSION['query'] . '"';
			$spdoResults = $connexion->query($sql);
		}
		catch (Exception $e)
		{ // Si le champ stable ID n'est pas dans la table transcrit.
			if ($e->getCode() === '42S22')
			{ // Jointure des tables
				$sql = 'SELECT TS.stable_id AS Stable_ID, (T.seq_region_end - T.seq_region_start) AS length FROM transcript T, transcript_stable_id TS WHERE TS.stable_id="' . $_SESSION['query'] . '" AND T.transcript_id=TS.transcript_id';
				$spdoResults = $connexion->query($sql);
			}
			else
			{ // Sinon r'envoie l'exception plus haut
				throw $e;
			}
		}
	}
	return $spdoResults;
}

/**
 * Réalise la requête SQL du choix 2: Les n gènes présentant le plus de transcrits.
 * @param PDO object $connexion L'objet connecté à la base de donnée
 * @return object $spdoResults L'objet PDO contenant les résultats
 * */
function doQuery_choix2($connexion)
{
	try
	{ 
		$sql = 'SELECT G.stable_id AS Stable_ID, count(*) AS nb_Transcript, G.description AS Description FROM transcript T, gene G WHERE G.gene_id=T.gene_id GROUP BY T.gene_id ORDER BY nb_transcript DESC LIMIT ' . $_SESSION['query'];
		$spdoResults = $connexion->query($sql);
		return $spdoResults;
	}
	catch (Exception $e)
	{ 	// Exception si le champ stable ID n'est pas dans la table gene
		if ($e->getCode() === '42S22')
		{ // Jointure des tables
			$sql = 'SELECT G2.stable_id AS Stable_ID, count(*) AS nb_Transcript, G1.description AS Description FROM transcript T, gene G1, gene_stable_id G2 WHERE G1.gene_id=T.gene_id AND G1.gene_id=G2.gene_id GROUP BY T.gene_id ORDER BY nb_transcript DESC LIMIT ' . $_SESSION['query'];
			$spdoResults = $connexion->query($sql);
			return $spdoResults;
		}
		else
		{ // Sinon r'envoie l'exception plus haut
			throw $e;
		}
	}
}
/**
 * Réalise la requête SQL du choix 3: L'ensemble des informations d'un gène.
 * @param PDO object $connexion L'objet connecté à la base de donnée
 * @return object $spdoResults L'objet PDO contenant les résultats
 * */
function doQuery_choix3($connexion)
{
	try
	{
		$sql = 'SELECT G.* FROM gene G WHERE G.stable_id="' . $_SESSION['query'] .'"';
		$spdoResults = $connexion->query($sql);
		return $spdoResults;
	}
	catch (Exception $e)
	{ 	// Exception si le champ stable ID n'est pas dans la table gene
		if ($e->getCode() === '42S22')
		{ // Jointure des tables
			$sql = 'SELECT G.* FROM gene G, gene_stable_id GS WHERE G.gene_id=GS.gene_id AND GS.stable_id="' . $_SESSION['query'] .'"';
			$spdoResults = $connexion->query($sql);
			return $spdoResults;
		}
		else
		{ // Sinon r'envoie l'exception plus haut
			throw $e;
		}
	}
}

/**
 * Réalise la requête SQL du choix 4: Les transcrits du gène donné
 * @param PDO object $connexion L'objet connecté à la base de donnée
 * @return object $spdoResults L'objet PDO contenant les résultats
 * */
function doQuery_choix4($connexion)
{
	try
	{
		$sql = 'SELECT T.stable_id AS transcript_stable_id FROM transcript T, gene G WHERE T.gene_id=G.gene_id AND G.stable_id="' . $_SESSION['query'] . '"';
		$spdoResults = $connexion->query($sql);
		return $spdoResults;
	}
	catch (Exception $e)
	{ 	// Exception si le champ stable ID n'est pas dans la table transcrit ou dans la table gene.
		if ($e->getCode() === '42S22')
		{ // Jointure des tables
			$sql = 'SELECT TS.stable_id AS transcript_stable_id FROM transcript_stable_id TS, transcript T, gene_stable_id G WHERE TS.transcript_id=T.transcript_id AND T.gene_id=G.gene_id AND G.stable_id="' . $_SESSION['query'] . '"';
			$spdoResults = $connexion->query($sql);
			return $spdoResults;
		}
		else
		{ // Sinon r'envoie l'exception plus haut
			throw $e;
		}
	}
}

/**
 * Réalise la requête SQL du choix 5: L'ensemble des informations d'un transcrit.
 * @param PDO object $connexion L'objet connecté à la base de donnée
 * @return object $spdoResults L'objet PDO contenant les résultats
 * */
function doQuery_choix5($connexion)
{
	try
	{
		$sql = 'SELECT T.* FROM transcript T WHERE T.stable_id="' . $_SESSION['query'] . '"';
		$spdoResults = $connexion->query($sql);
		return $spdoResults;
	}
	catch (Exception $e)
	{ 	// Exception si le champ stable ID n'est pas dans la table transcrit.
		if ($e->getCode() === '42S22')
		{ // Jointure des tables
			$sql = 'SELECT T.* FROM transcript T, transcript_stable_id TS WHERE T.transcript_id=TS.transcript_id AND TS.stable_id="' . $_SESSION['query'] . '"';
			$spdoResults = $connexion->query($sql);
			return $spdoResults;
		}
		else
		{ // Sinon r'envoie l'exception plus haut
			throw $e;
		}
	}
}

/**
 * Réalise la requête SQL du choix 6: Les exons du transcrit donné.
 * @param PDO object $connexion L'objet connecté à la base de donnée
 * @return object $spdoResults L'objet PDO contenant les résultats
 * */
function doQuery_choix6($connexion)
{
	try
	{
		$sql = 'SELECT E.stable_id AS exon_stable_id FROM transcript T, exon E, exon_transcript ET WHERE E.exon_id=ET.exon_id AND T.transcript_id=ET.transcript_id AND T.stable_id="' . $_SESSION['query'] . '"';
		$spdoResults = $connexion->query($sql);
		return $spdoResults;
	}
	catch (Exception $e)
	{ 	// Exception si le champ stable ID n'est pas dans la table exon ou transcrit
		if ($e->getCode() === '42S22')
		{ // Jointure des tables
			$sql = 'SELECT ES.stable_id AS exon_stable_id FROM transcript_stable_id TS, exon_stable_id ES, exon_transcript ET, exon E WHERE TS.transcript_id=ET.transcript_id AND E.exon_id=ET.exon_id AND E.exon_id=ES.exon_id AND TS.stable_id="'. $_SESSION['query'] . '"';
			$spdoResults = $connexion->query($sql);
			return $spdoResults;
		}
		else
		{ // Sinon r'envoie l'exception plus haut
			throw $e;
		}
	}
}

/**
 * Réalise la requête SQL du choix 7: L'ensemble des informations d'un exon.
 * @param PDO object $connexion L'objet connecté à la base de donnée
 * @return object $spdoResults L'objet PDO contenant les résultats
 * */
function doQuery_choix7($connexion)
{
	try
	{
		$sql = 'SELECT E.* FROM exon E WHERE E.stable_id="' . $_SESSION['query'] . '"';
		$spdoResults = $connexion->query($sql);
		return $spdoResults;
	}
	catch (Exception $e)
	{ 	// Exception si le champ stable ID n'est pas dans la table exon
		if ($e->getCode() === '42S22')
		{ // Jointure des tables
			$sql = 'SELECT E.* FROM exon E, exon_stable_id ES WHERE E.exon_id=ES.exon_id AND ES.stable_id="' . $_SESSION['query'] . '"';
			$spdoResults = $connexion->query($sql);
			return $spdoResults;
		}
		else
		{ // Sinon r'envoie l'exception plus haut
			throw $e;
		}
	}
}

/**
 * Réalise la requête SQL du choix 8: Requete tapée par l'utilisateur.
 * @param PDO object $connexion L'objet connecté à la base de donnée.
 * @return object $spdoResults L'objet PDO contenant les résultats.
 * */
function doQuery_choix8($connexion)
{
	try
	{ 
		$sql = trim($_SESSION['query'], "; ");
		$arSqlSplittedOnLimit = explode("limit", strtolower($sql));
		// Dans le cas d'une requête SELECT, l'utilisateur doit avoir spécifié une limite inférieure à 5000, sinon, elle est fixée à 5000.
		if ((count($arSqlSplittedOnLimit) == 1 or intval(trim($arSqlSplittedOnLimit[1], "; ")) > 5000) and (strrpos(strtolower($sql), 'select') === 0))
		{
			$sql = $arSqlSplittedOnLimit[0] . " LIMIT 5000;";
		}
		$spdoResults = $connexion->query($sql);
		return $spdoResults;
	}
	catch (Exception $e)
	{ 
		throw $e;
	}
}
?>
