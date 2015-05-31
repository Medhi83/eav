<?php
/**
 * Module contenant le contrôleur de saveToDatabase -> cette page est chargée en ajax par la vue resultat
 **/
 
session_start();
include_once('../modele/saveResultsOnUserDb.php');
include_once('../modele/connexion_sql_perso.php');

//Gère et appel la fonction pour enregistrer les résultats dans la base de données de l'utilisateur connecté

if (isset($_POST['action']) and $_POST['action'] == 'save'){
	try {
		
		$opdoConnexionToUserDb = connexion_sql_perso($_SESSION['login'], $_SESSION['pass']);
		
		if ($_POST['table_name'] !== preg_replace('#[^0-9a-z_]+#i', '-', $_POST['table_name']))
		{
			echo 2;
			exit;
		}		
	
		$spdoTablesBeing = $opdoConnexionToUserDb->query('SHOW TABLES;');
		//On regarde si une table avec ce nom existe déjà
		while ($reponse = $spdoTablesBeing->fetch())
		{
			foreach ($reponse as $tableBeing)
			{
				//si oui: l'opération est annulée
				if ($tableBeing == $_POST['table_name'])
				{
					echo 1;
					exit;
				}
			}
		}

		//si non: On crée la table
		createTable($_SESSION["current_results"], $_POST["table_name"]);

		//On ajoute les données dans la table!
		insertData($_SESSION["current_results"],$_POST["table_name"]);
				
		echo 0; // Enfin on retourne zero si tout s'est bien passé =)
	}
	catch(Exception $erreur) {
		echo $erreur->getMessage(); //S'il y a le moindre soucis on retourne une éxception!
	}

}
