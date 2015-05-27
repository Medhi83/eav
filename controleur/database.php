<?php

// On charge la gestion du login
include_once('controleur/login_manager.php');

//database process
try
{	
	include_once('modele/showTables.php');
	$db_tables = showTables();
	
}
catch (Exception $e)
{
	$erreur_sql = "Erreur : ".$e->getMessage();
	include_once('vue/SQLerror.php');
	exit;
}

// On affiche la page (vue)
include_once('vue/database.php');
