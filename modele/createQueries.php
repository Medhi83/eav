<?php
/**
 * Module contenant les fonction de création des tableaux de requêtes: choix -> texte / choix -> conseil
 * */

/**
 * Crée un tableau associatif choix => texte de la requête.
 * @return array $arQueriesTexts Tableau associatif des choix possibles.
 * */
function createQueryArray()
{
	$arQueriesTexts = array(
	'choix1' => 'Afficher le nombre de nucléotides du gène ou du transcrit :',
	'choix2' => 'Afficher les gènes possédant le plus de transcrits et leur description :',
	'choix3' => 'Afficher l\'ensemble des informations du gène :',
	'choix4' => 'Afficher les transcrits du gène :',
	'choix5' => 'Afficher l\'ensemble des informations du transcrit :',
	'choix6' => 'Afficher les exons du transcrit :',
	'choix7' => 'Afficher l\'ensemble des informations de l\'exon :',
	'choix8' => 'Afficher votre propre requête SQL :');
	return $arQueriesTexts;
}

/**
 * Crée un tableau associatif choix => conseil pour la requête.
 * @return array $arQueriesTips Tableau associatif des choix possibles.
 * */
function createQueryTips()
{
	$arQueriesTips = array(
	'choix1' => 'Tapez le stable_id (ex: AAEL010576) du gène ou transcrit désiré.',
	'choix2' => 'Tapez le nombre de gènes que vous désirez.',
	'choix3' => 'Tapez le stable_id (ex: AAEL010576) du gène désiré.',
	'choix4' => 'Tapez le stable_id (ex: AAEL010576) du gène désiré.',
	'choix5' => 'Tapez le stable_id (ex: AAEL010576) du transcrit désiré.',
	'choix6' => 'Tapez le stable_id (ex: AAEL010576) du transcrit désiré.',
	'choix7' => 'Tapez le stable_id (ex: AAEL010576) de l\'exon désiré.',
	'choix8' => 'Tapez votre requête SQL :');
	return $arQueriesTips;
}
?>
