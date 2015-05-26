<?php
/**
 * Crée un tableau associatif choix => texte de la requête.
 * @return array $returned Tableau associatif des choix possibles.
 * */
function createQueryArray()
{
	$returned = array(
	'choix1' => 'Afficher le nombre de nucléotides du gène ou du transcrit :',
	'choix2' => 'Afficher les gènes possédant le plus de transcrits et leur description :',
	'choix3' => 'Afficher votre propre requête SQL :');
	return $returned;
}

/**
 * Crée un tableau associatif choix => conseil pour la requête.
 * @return array $returned Tableau associatif des choix possibles.
 * */
function createQueryTips()
{
	$returned = array(
	'choix1' => 'Tapez le stable_id (ex: blablabla) du gène ou transcrit désiré.',
	'choix2' => 'Tapez le nombre de gènes que vous désirez.',
	'choix3' => 'Tapez votre requête SQL :');
	return $returned;
}
?>
