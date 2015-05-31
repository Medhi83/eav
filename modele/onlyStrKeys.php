<?php
/**
 * Module contenant la fonction de modification d'un array associatif: suppression des indices de type integer
 * */

/**
 * Retourne un array les éléments de l'array en argument moins ceux ayant un entier en index
 * @param  array $arResults1 Le tableau contenant les résultats
 * @return array $arResults2 Le tableau réduit
 * */
function onlyStrKeys($arResults1){

	//retire les clés qui ne sont pas des chaines de caractères.
	$arResults2 = array();
	$iResultNumber=0;
	foreach ($arResults1 as $arDonnees)
	{
		foreach ($arDonnees as $key => $element){
			if (gettype($key) == 'string') {
				$arResults2[$iResultNumber][$key] = $element;
			}
		}
		$iResultNumber += 1;
	}
	
	return $arResults2;
}
?>
