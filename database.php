<?php
// Contrôleur global de la page database

try
{
	session_start();

	// On redirige l'utilisateur vers l'index s'il n'est pas connecté
	if (!isset($_SESSION['login'])) {
		header('Location: index.php');
	}
	else // Si oui, appel du contrôleur de database
	{
		include_once('controleur/database.php');
	}
}
catch (Exception $e)
{
	$sErreur = "Erreur : " . $e->getMessage();
	include_once('vue/error.php');
	exit;
}
