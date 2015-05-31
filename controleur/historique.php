<?php
/**
 * Module contenant le contrôleur de historique
 **/

include_once('modele/createQueries.php');

// history processing
$arQueryArray = createQueryArray();

// Chargement de la gestion du login
include_once('controleur/login_manager.php');

// Chargement de la vue de historique
include_once('vue/historique.php');
?>
