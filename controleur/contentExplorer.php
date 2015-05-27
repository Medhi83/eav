<?php
	include_once ('../vue/php_display_fn/displayArrayResults.php');
	include_once('../modele/tableContent.php');
	include_once('../modele/connexion_sql_perso.php');

	if($_POST['action'] == 'display' and isset($_POST['table_name'])) {
	
		try {
			session_start();
			$bdd = connexion_sql_perso($_SESSION['login'], $_SESSION['pass']);
			echo '<legend>Contenu : '.$_POST['table_name'].' </legend>';
			displayArrayResults(tableContent($_POST['table_name']), "tableContent");
		
		}
		catch(Exception $e) {
			echo $e->getMessage();
		}
	}		
