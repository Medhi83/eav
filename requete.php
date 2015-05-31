<?php
// Contrôleur global de la page requete

try
{
	session_start();

	// Appel du contrôleur de requete
	include_once('controleur/requete.php');
}
catch (Exception $e)
{
	$sErreur = "Erreur : " . $e->getMessage();
	include_once('vue/error.php');
	exit;
}
