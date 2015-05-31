<?php
/**
 * Module contenant la fonction de connexion à la base de donnée locale de l'utilisateur
 * */

/**
 * Etablit la connexion avec la base de données de l'utilisateur et renvoie l'objet PDO associé.
 * @return PDOobject $opdoConnexionToUserDb L'objet PDO contenant la connexion.
 * */
function connexion_sql_perso($login, $pass) 
{
	// officiel (fac):
	$opdoConnexionToUserDb = new PDO('mysql:host=dbs-perso.luminy.univmed.fr;dbname='.$login.';charset=utf8', $login, $pass);
	return $opdoConnexionToUserDb;
}
?>
