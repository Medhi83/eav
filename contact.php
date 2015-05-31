<?php
// Contrôleur global de la page contact.

try
{
	session_start();

	// Appel du controleur de contact.
	include_once('controleur/contact.php');
}
catch (Exception $e)
{
	$sErreur = "Erreur : " . $e->getMessage();
	include_once('vue/error.php');
	exit;
}
