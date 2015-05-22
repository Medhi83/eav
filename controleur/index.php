<?php

try
{
	include_once('modele/createDbArray.php');
	$arDbArray = createDbArray();
}
catch (Exception $e)
{
	die("Erreur : " . $e->getMessage() . "<br /><a href=index.php>Retour à la page d'accueil</a>");
}

// On charge la gestion du login
include_once('controleur/login_manager.php');

// On affiche la page (vue)
include_once('vue/index.php');
