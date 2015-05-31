<?php
/**
 * Module contenant le contrôleur de delQueryInHistory -> cette page est chargée en ajax par la vue historique
 **/

session_start();

unset($_SESSION['history'][$_GET['queryId']]);
$_SESSION['history'] = array_values($_SESSION['history']);

?>
