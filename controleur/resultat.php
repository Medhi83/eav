<?php

try
{
	include_once('modele/dbSetting.php');
	include_once('modele/createDbArray.php');
	include_once('modele/createQueries.php');
	include_once('modele/querySetting.php');
	include_once('modele/parseQueryChoice.php');
	dbSetting();
	querySetting();
	$arDbArray = createDbArray();
	$arQueryArray = createQueryArray();
	$oConnexion = new PDO('mysql:host=ensembldb.ensembl.org;dbname=' . $_SESSION['db'] . ';charset=utf8', 'anonymous', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$oReponse = parseQueryChoice($oConnexion);
	$array_results = $oReponse->fetchAll();
	
	
	
	//retire les clés qui ne sont pas des chaines de caractères.
	$arResults = array();
	$i=0;
	foreach ($array_results as $arDonnees)
	{
		foreach ($arDonnees as $key => $element){
			if (gettype($key) == 'string') {
				$arResults[$i][$key] = $element;
			}
		}
		$i += 1;
	}
}
catch (Exception $e)
{
	include_once('controleur/login_manager.php');
	$erreur_sql = "Erreur : ".$e->getMessage();
	include_once('vue/SQLerror.php');
	exit;
}

// On charge la gestion du login
include_once('controleur/login_manager.php');

// On affiche la page (vue)
include_once('vue/resultat.php');
