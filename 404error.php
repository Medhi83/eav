<?php
// Controleur de la vue 404. Chemin innexistant.

try
{
	session_start();

	// Chargement du gestionnaire de login.
	include_once('controleur/login_manager.php');

	// Chargement de la vue.
	include_once('vue/404error.php');	
}
catch (Exception $e)
{
	$sErreur = "Erreur : " . $e->getMessage();
	include_once('vue/error.php');
	exit;
}
