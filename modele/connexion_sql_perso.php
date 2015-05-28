<?php

// Connexion à la base de données de l'utilisateur
function connexion_sql_perso($login, $pass) {
	$bdd = new PDO('mysql:host=dbs-perso.luminy.univmed.fr;dbname='.$login.';charset=utf8', $login, $pass);
	
	return $bdd;
}


