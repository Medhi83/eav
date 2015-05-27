<?php

session_start();

//On redirige l'utilisateur vers l'index s'il n'est pas connecté
if (!isset($_SESSION['login'])) {
	header('Location: index.php');
	exit;
}

include_once('controleur/database.php');
