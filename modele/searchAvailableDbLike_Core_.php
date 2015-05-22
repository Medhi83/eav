<?php
/**
 * Retrouve les bases de donnée Ensembl où '_core_' apparait dans le nom.
 * @return $results L'object PDO contenant les résultats
 * */
function searchAvailableDbLike_Core_()
{
	$connexion = new PDO('mysql:host=ensembldb.ensembl.org;charset=utf8', 'anonymous', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$returned = $connexion->query("SHOW DATABASES LIKE '%\_core\_%'");
	return $returned;
}
?>
