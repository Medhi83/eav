<?php
// Contrôleur global de la page index

try
{
	session_start();

	// Appel du controleur de l'index
	include_once('controleur/index.php');
}
catch (Exception $e)
{
	$sErreur = "Erreur : " . $e->getMessage();
	include_once('vue/error.php');
	exit;
}
