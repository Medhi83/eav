<?php

// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['connexion']) and $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['login']) and !empty($_POST['login'])) and (isset($_POST['pass']) and !empty($_POST['pass']))) {
		
		

		//Tentative de Connexion...
		try {
			include_once ('modele/connexion_sql_perso.php');
			if (!isset($_SESSION)) session_start();
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['pass'] = $_POST['pass'];
			header('Location:'.$_SERVER['REQUEST_URI']);
			exit();
		}
		catch (Exception $erreur_connexion) {
			
		}
	}
}
