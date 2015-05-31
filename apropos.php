<?php
// Contrôleur global de la page apropos.
try
{
	session_start();

	// Appel du controleur de apropos.
	include_once('controleur/apropos.php');
}
catch (Exception $e)
{
	$sErreur = "Erreur : " . $e->getMessage();
	include_once('vue/error.php');
	exit;
}
