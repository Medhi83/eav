<?php
// Contrôleur global de la page resultat

try
{
	session_start();

	// Appel du contrôleur de resultat.
	include_once('controleur/resultat.php');
}
catch (Exception $e)
{
	$sErreur = "Erreur : " . $e->getMessage();
	include_once('vue/error.php');
	exit;
}
