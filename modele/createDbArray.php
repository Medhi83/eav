<?php

include_once ('searchAvailableDbLike_Core_.php');

/**
 * Crée un tableau associatif organisme => db_la_plus_récente
 * @return array $returned L'objet PDO contenant les résultats
 * */
function createDbArray()
{
	$db_like_core = searchAvailableDbLike_Core_();
	$returned = array();
	while ($donnees = $db_like_core->fetch())
	{
		/* Récupération du nom de l'organisme avant '_core' en tant que
		 * clé avec le nom de la base de données la plus récente en objet.
		 * La dernière base parcourue pour un organisme écrase toutes les autres
		 * cad la plus récente.
		 * */
		$returned[preg_split('#_core_#', $donnees['Database (%\\_core\\_%)'])[0]] = $donnees['Database (%\\_core\\_%)'];
	}
	$db_like_core->closeCursor();
	return $returned;
}
?>