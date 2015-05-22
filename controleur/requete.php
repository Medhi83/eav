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
	include_once('controleur/login_manager.php');
	$erreur_sql = "Erreur : ".$e;
	include_once('vue/SQLerror.php');
	exit;
}

// On charge la gestion du login
include_once('controleur/login_manager.php');

// On affiche la page (vue)
include_once('vue/requete.php');
