<?php

//retourne les clés d'un tableau résultats
function onlyStrKeys($array_results){

	//retire les clés qui ne sont pas des chaines de caractères.
	$arResults = array();
	$i=0;
	foreach ($array_results as $arDonnees)
	{
		foreach ($arDonnees as $key => $element){
			if (gettype($key) == 'string') {
				$arResults[$i][$key] = $element;
			}
		}
		$i += 1;
	}
	
	return $arResults;
}
