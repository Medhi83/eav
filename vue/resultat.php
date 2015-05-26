<?php
	include_once ('php_display_fn/displayDbList.php');
	include_once ('php_display_fn/displayCurrentQuery.php');
	include_once ('php_display_fn/displayArrayResults.php');
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
		<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>
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
					<p>
					<strong>Base de données</strong> : <?php echo $_SESSION['db']; ?><br/>
					<strong>Requête</strong> : <?php echo ($arQueryArray[$_SESSION['radio']] . " " . $_SESSION['query']); ?>
					</p>
				</fieldset>
				
				<fieldset class="sous-champ">
					<legend>Tableau de résultats</legend>
					<?php displayArrayResults($_SESSION["current_results"]); ?>
				</fieldset>
				
			</fieldset>
			<button id = "sauver" class="special_btn" style="width:234px; font-size:15px" type="button" title="Enregistre le tableau de résultats dans la base de données de l'utilisateur">Sauvegarder</button>
			<form action="controleur/downloadCSV.php" method="POST" TARGET=_BLANK style="display:inline-block;margin-left: 1em">
				<input type="hidden" value="<?php echo htmlentities(serialize($_SESSION["current_results"])); ?>" name="csvString" />
				<input type="hidden" value="<?php echo $_SESSION['db']; ?>" name="bd" />
				<input class="special_btn" style="width:234px; font-size:15px" type="submit" value="Télécharger au format CSV"/>
			</form>
			<p id="test" class="error"></p>
			
		</div>
		<!-- Pied de page -->
		<?php include_once ('footer.php')?>
		<!-- Fin du pied de page -->
	<script type="text/javascript">
	$(document).ready( function () {
		$('#results').DataTable({
			"scrollX": true,
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
		
		$("#sauver").click(function(){
			var bdd = <?php echo json_encode($_SESSION['db']); ?>;
			var results = <?php echo json_encode($_SESSION["current_results"]); ?>;
			
			
			if (<?php echo json_encode(isset($_SESSION['login'])); ?>) {
				
				var date = new Date();
				var table_name = window.prompt('Entrer le nom de la table dans la base de données', 'eav_' + bdd + '_date_' + date.getDate() + '_' + date.getMonth() + '_' + date.getFullYear() + '_' + date.getHours() + '_' + date.getMinutes() + '_' + date.getSeconds());

				$.ajax({ // Envoie les resultats a saveToDatabase.php avec Ajax en methode POST (Call back)
				url  : 'controleur/saveToDatabase.php',
				type : 'POST',
				data : {action:'save', table_name:table_name},
				dataType: 'html',
				success: function(reponse){
						if (reponse == 0) {
							window.alert('Les résultats ont été enregistrés avec succés!');
						}
						else {
							//window.alert(reponse);
							$("#test").html(reponse);
						}
				}
		
				});
			}
			else {
				window.alert('Vous devez être connecté à votre base de données locale pour pouvoir sauvegarder vos résultats');
				$("#login_panel").slideToggle("slow");
				return false;
			}
		});
		
	} );
	

	</script>
	</body>
</html>
