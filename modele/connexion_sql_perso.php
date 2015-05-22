<?php

// Connexion à la base de données de l'utilisateur
$bdd = new PDO('mysql:host=dbs-perso.luminy.univmed.fr;dbname='.$_POST['login'], $_POST['login'], $_POST['pass']);

