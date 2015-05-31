<?php
/**
 * Module contenant le contrôleur de requete
 **/
 
include_once('modele/dbSetting.php');
include_once('modele/createDb.php');
include_once('modele/createQueries.php');

// Chargement de la gestion du login
include_once('controleur/login_manager.php');

// requete processing
dbSetting();
$arDbArray = createDbArray();
$arQueryArray = createQueryArray();

// Chargement de la vue de requete
include_once('vue/requete.php');
