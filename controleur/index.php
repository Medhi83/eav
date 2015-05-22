<?php

try
{
	include_once('modele/createDbArray.php');
	$arDbArray = createDbArray();
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
include_once('vue/index.php');
