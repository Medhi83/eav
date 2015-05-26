<?php

//Enregistre les résultats dans la base de données de l'utilisateur connecté
function sauvegarder($results, $table_name) {
	
	//On Recupere uniquement les clés qui sont des chaines de caractères
	$keys = array();
	foreach (array_keys($results[0]) as $key) {
		if (gettype($key) == 'string') {
			array_push($keys, $key);
		}
	}
	

	
	global $bdd;
	$columns_create = implode(" TEXT, ", $keys).' TEXT';
	//$columns = (string) implode(", ",array_keys($results[0]));
	//echo $columns_create;
	
	//On prépare les requêtes
	$req_create = $bdd->prepare('CREATE TABLE :table_name ( id INT PRIMARY KEY NOT NULL, :columns_create)');
	$req_create->bindParam(':table_name', $table_name, PDO::PARAM_STR);
	$req_create->bindParam(':columns_create', $columns_create, PDO::PARAM_STR);
	$req_create->execute();
	
	$result = $req_create->fetch();

	return $result;
	

	/*$req_insert = $bdd->prepare('INSERT INTO :table_name (:columns) VALUES (:values)');
	$req_insert->bindParam(':table_name', $table_name, PDO::PARAM_STR);
	$req_insert->bindParam(':columns', $columns, PDO::PARAM_STR);
	
	//On lance les requêtes
	try {
		$req_create->execute();
	}
	catch(Exception $e){
		//On écrase la table si elle existe déja!
		$req_drop = $bdd->prepare('DROP TABLE :table_name');
		$req_drop->bindParam(':table_name', $table_name, PDO::PARAM_STR);
		$req_drop->execute();
		$req_create->execute();
	}
	
	$i = 0;
	foreach($results[$i] as $values){
		$req_insert->bindParam(':values', $values, PDO::PARAM_STR);
		$req_insert->execute();
		$i += 1;
	}*/
	

}
