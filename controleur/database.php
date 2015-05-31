<?php
/**
 * Module contenant le contrôleur de database
 **/

include_once('modele/showTables.php');

// Chargement de la gestion du login
include_once('controleur/login_manager.php');

// database processing

if (isset($_POST['tableNameToDelete']))
{
	$sql = 'DROP TABLE ' .   trim($opdoConnexionToUserDb->quote($_POST['tableNameToDelete']), "'") . ";";
	$opdoConnexionToUserDb->exec($sql);
}
$arDbTables = showTables();


// Chargement de la vue de database
include_once('vue/database.php');
