<?php
// Contrôleur global de la page historique

try
{
	session_start();

	// Appel du contrôleur de l'historique
	include_once('controleur/historique.php');
}
catch (Exception $e)
{
	$sErreur = "Erreur : " . $e->getMessage();
	include_once('vue/error.php');
	exit;
}
