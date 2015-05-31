<?php
// Contrôleur global du système de déconnexion
try
{
	session_start();

	unset($_SESSION['login']);
	unset($_SESSION['pass']);

	// On utilise une méthode moins radicale car on préfère garder les variables de sessions utiles hors connexion.
	//session_unset();
	//session_destroy();

	header('Location: '.$_SERVER['HTTP_REFERER']);
	exit;
}
catch (Exception $e)
{
	$sErreur = "Erreur : " . $e->getMessage();
	include_once('vue/error.php');
	exit;
}
