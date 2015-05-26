<?php

include_once('getKeys.php');

//Insert des valeurs
function insertData($arResults, $table_name) {
	

	global $bdd;

	$keys = getKeys($arResults);
	
	$columns = implode(", ", $keys);

	
	$i = 0;
	$totalValues = array();
	foreach($arResults as $element){
		
		$values = array();
		foreach ($arResults[$i] as $key => $value){
			if (gettype($key) === "string") {
				array_push($values, $bdd->quote($value));
			}
			
		}
		$values = implode(", ", $values);
		array_push($totalValues, "(".$values.")");
		$i += 1;
	}
	$totalValues = implode(", ", $totalValues );
	$result = $bdd->exec('INSERT INTO ' .$table_name. ' ( '.$columns.' ) VALUES '.$totalValues);

}
