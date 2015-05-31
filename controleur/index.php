<?php
/**
 * Module contenant le contrôleur de index
 **/

include_once('modele/createDb.php');

// Chargement de la gestion du login
include_once('controleur/login_manager.php');

// index processing
$arDbArray = createDbArray();
if (isset($_POST['delAllHistory']))
{
	unset($_SESSION['history']);
}

// Chargement de la vue de index
include_once('vue/index.php');
