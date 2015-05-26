<?php

//retourne les clés d'un tableau résultats
function getKeys($array_results){

	$keys = array();
	foreach (array_keys($array_results[0]) as $key) {
		if (gettype($key) === 'string') {
			array_push($keys, $key);
		}
	}

	return $keys;
}
