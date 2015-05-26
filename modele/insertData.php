<?php

include_once('getKeys.php');

//Insert des valeurs
function insertData($arResults, $table_name) {
	

	global $bdd;

	$keys = getKeys($arResults);
	
	$columns = implode(", ", $keys);

	$req_insert = $bdd->prepare('INSERT INTO :table_name (:columns) VALUES (:values)');
	$req_insert->bindParam(':table_name', $table_name, PDO::PARAM_STR);
	$req_insert->bindParam(':columns', $columns, PDO::PARAM_STR);
	
	$i = 0;
	foreach($arResults as $element){
		
		$values = array();
		foreach ($arResults[$i] as $key => $value){
			if (gettype($key) === "string") {
				array_push($values, $value);
			}
			
		}
		$values = implode(", ", $values);
		$req_insert->bindParam(':values', $values, PDO::PARAM_STR);
		$req_insert->execute();
		echo('INSERT INTO ' .$table_name. ' ( '.$columns.' ) VALUES ( '.$values.' )<br />');
		$i += 1;
	}

}
