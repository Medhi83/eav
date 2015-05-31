<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>EAV - A propos</title>
		<link rel="stylesheet" type="text/css" href="vue/style.css" />
		<link href='http://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="vue/jquery/css/ui-lightness/jquery-ui-1.10.2.custom.css" type='text/css'>
		<script type="text/javascript" src="vue/jquery/js/jquery.min.js"></script>
		<script type="text/javascript" src="vue/jquery/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="vue/jquery/js/haut_page.js"></script>
		<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="vue/jquery/js/jquery.validate.js"></script>
		<script type="text/javascript" src="vue/jquery/js/jquery.additional-methods.min.js"></script>
	</head>

	<body>
		<!-- Menu -->
		<?php include_once ('top_menu.php')?>
		<!-- Fin du Menu -->
		<?php include_once('noScriptMessage.php'); ?>
		
		<div id="page">
			<fieldset>
			<legend class="titre">A propos du projet E.A.V.</legend>
				<fieldset class="sous-champ">
					<legend>Cadre</legend>
						<p>
							Le projet <strong>Ensembl Alternative View</strong> a été réalisé dans le cadre de 
							l'examen final de l'unité d'enseignement <strong>Programmation Web</strong>, au cours 
							de la première année du <strong>Master BioInformatique, Biochimie Structurale et Génomique</strong>.
						</p>
				</fieldset>
				<fieldset class="sous-champ">
					<legend>Cahier des charges</legend>
						<p>
							Le but de ce mini-projet est de réaliser, en binôme, 
							une petite application PHP permettant :
							<ul style="text-align: left; margin: auto 10%;">
							<li>de se connecter à la base de données ENSEMBL</li><br/>
							<li>d'effectuer des requêtes (de type show et select)</li><br/>						
							<li>de présenter proprement les résultats (dans une jolie page HTML, 
							téléchargeable sous forme CSV)</li><br/>
							<li>de stocker (via insert ou load data) les résultats dans une base 
							de données locale sur laquelle vous avez les droits, ce qui nécessite 
							que l'utilisateur fournisse le login et le mot de passe MySQL (et 
							que vous utilisiez les sessions)</li>						
							</ul>
						</p>
				</fieldset>
				<img src="vue/img/logo-amu.png" alt="AMU" width="600px" />
			</fieldset>
		</div>
		
		<!-- Pied de page -->
		<?php include_once ('footer.php')?>
		<!-- Fin du pied de page -->		
	</body>
</html>
