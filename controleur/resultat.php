<?php
/**
 * Module contenant le contrôleur de resultat
 **/

include_once('modele/dbSetting.php');
include_once('modele/createDb.php');
include_once('modele/createQueries.php');
include_once('modele/querySetting.php');
include_once('modele/parseQueryChoice.php');
include_once('modele/onlyStrKeys.php');


// Chargement de la gestion du login
include_once('controleur/login_manager.php');


// resultat processing
dbSetting();
querySetting();
$arQueryArray = createQueryArray();
$oConnexion = new PDO('mysql:host=ensembldb.ensembl.org;dbname=' . $_SESSION['db'] . ';charset=utf8', 'anonymous', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$oReponse = parseQueryChoice($oConnexion);
$array_results = $oReponse->fetchAll();

$_SESSION["current_results"] = onlyStrKeys($array_results);

// Utilisé pour être POSTé de page en page
$asResults = htmlentities(serialize($_SESSION["current_results"]));

if (!isset($_POST['historyQuery']))
{
$_SESSION['history'][] = array(
	'Base de données' => $_SESSION['db'],
	'Choix' => $_SESSION['radio'],
	'Requête' => $_SESSION['query'],
	'Résultat' => ($asResults),
	'Date' =>  date("d-m-Y"),
	'Heure' => date("H:i:s")		
);
}

// Chargement de la vue de resultat
include_once('vue/resultat.php');
