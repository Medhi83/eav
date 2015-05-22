<?php
	include_once ('php_display_fn/displayDbList.php');
	include_once ('php_display_fn/displayCurrentQuery.php');
	include_once ('php_display_fn/displayResults.php');

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>EAV - Accueil</title>
		<link rel="stylesheet" type="text/css" href="vue/style.css" />
		<link href='http://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
		<script type="text/javascript" src="vue/jquery/js/jquery.min.js"></script>
		<script type="text/javascript" src="vue/js/loadAnimation.js"></script>
		<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>
		<style type="text/css">
			.dataTables_wrapper { clear: both }
		</style>
	</head>

	<body>
		<!-- Menu -->
		<?php include_once ('top_menu.php')?>
		<!-- Fin du Menu -->
		
		<div id="page">
			<fieldset>
			<legend class="titre">Résultats</legend>
				<fieldset class="sous-champ">
					<legend>Résumé de la requête</legend>
					<p>Base de données : <?php echo $_SESSION['db']; ?></p>
				</fieldset>
				<fieldset class="sous-champ">
					<legend>Tableau de résultats</legend>
					<?php displayResults($oReponse); ?>
				</fieldset>
			</fieldset>
			<form action="#" method ="get" /> 
				<input class="special_btn" style="width:234px; font-size:15px" type="submit" value="Haut de page"  />
			</form>
			
		</div>
		
		<!-- Pied de page -->
		<?php include_once ('footer.php')?>
		<!-- Fin du pied de page -->
	<script type="text/javascript">
	$(document).ready( function () {
		$('#results').DataTable({
			"language": {
				"lengthMenu": "Afficher _MENU_ éléments par page",
				"zeroRecords": "Aucun résultat",
				"info": "Page _PAGE_ sur _PAGES_",
				"infoEmpty": "Aucun enregistrement valide",
				"infoFiltered": "(filtered from _MAX_ total records)",
				"loadingRecords": "Chargement...",
				"processing":     "Traitement des données...",
				"search":         "Recherche:",
				"paginate": {
					"first":      "Première",
					"last":       "Dernière",
					"next":       "Suivante",
					"previous":   "Précédente"
				}
			}
		});
	} );
	

	</script>
	</body>
</html>
