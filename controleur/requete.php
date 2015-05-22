<?php

try
{
	include_once('modele/dbSetting.php');
	include_once('modele/createDbArray.php');
	include_once('modele/createQueryArray.php');
	dbSetting();
	$arDbArray = createDbArray();
	$arQueryArray = createQueryArray();
}
catch (Exception $e)
{
	die("Erreur : " . $e->getMessage() . "<br /><a href=index.php>Retour à la page d'accueil</a>");
}

// On charge la gestion du login
include_once('controleur/login_manager.php');

// On affiche la page (vue)
include_once('vue/requete.php');
