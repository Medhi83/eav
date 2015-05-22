<?php
/**
 * Crée un tableau associatif choix => texte.
 * @return array $returned Tableau associatif des choix possibles.
 * */
function createQueryArray()
{
	$returned = array(
	'choix1' => 'Nombre de nucléotides du gène ou du transcrit :',
	'choix2' => 'Nombre de gènes possédant le plus de transcrits et leur description :',
	'choix3' => 'Tapez votre propre requête SQL :');
	return $returned;
}
?>
