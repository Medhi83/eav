<?php

include_once ('modele/connexion_sql_perso.php');

// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['connexion']) and $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['login']) and !empty($_POST['login'])) and (isset($_POST['pass']) and !empty($_POST['pass']))) {
		
		

		//Tentative de Connexion...
		try {
			$bdd = connexion_sql_perso($_POST['login'], $_POST['pass']);
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['pass'] = $_POST['pass'];
			header('Location:'.$_SERVER['REQUEST_URI']);
			exit();
		}
		catch (Exception $erreur_connexion) {
			//impossible de se connecter! (afficher un message d'erreur)
		}
	}
}
else if (isset($_SESSION['login'])) {
	//si l'utilisateur est déja connecté
	
	try {
		$bdd = connexion_sql_perso($_SESSION['login'], $_SESSION['pass']);
	}
	catch (Exception $erreur_connexion) {
		//impossible de maintenir la connexion ! (afficher un message d'erreur)
	}
}
