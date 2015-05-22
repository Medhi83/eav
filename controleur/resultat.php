<?php

try
{
	include_once('modele/dbSetting.php');
	include_once('modele/createDbArray.php');
	include_once('modele/createQueryArray.php');
	include_once('modele/querySetting.php');
	include_once('modele/parseQueryChoice.php');
	dbSetting();
	querySetting();
	$arDbArray = createDbArray();
	$arQueryArray = createQueryArray();
	$oConnexion = new PDO('mysql:host=ensembldb.ensembl.org;dbname=' . $_SESSION['db'] . ';charset=utf8', 'anonymous', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$oReponse = parseQueryChoice($oConnexion);
}
catch (Exception $e)
{
	die("Erreur : " . $e->getMessage() . "<br /><a href=index.php>Retour à la page d'accueil</a>");
}

// On charge la gestion du login
include_once('controleur/login_manager.php');

// On affiche la page (vue)
include_once('vue/resultat.php');
