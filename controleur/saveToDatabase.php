<?php

session_start();
include_once('../modele/createTable.php');
include_once('../modele/insertData.php');

//Gère et appel la fonction pour enregistrer les résultats dans la base de données de l'utilisateur connecté

if (isset($_POST['action']) and $_POST['action'] == 'save'){
	try {
		
		include_once('../modele/connexion_sql_perso.php');
		
	
		//On regarde si une table avec ce nom existe déjà

			//si oui: On demande à l'utilisateur s'il souhaite l'écraser

				//si oui: On supprime la table et on en crée une avec le même nom (retour à la 1ere condition en cas non!)

				//si non: On annule (ou retour au choix du non)

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
