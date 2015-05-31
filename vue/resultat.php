<?php
	include_once ('php_display_fn/displayDbList.php');
	include_once ('php_display_fn/displayCurrentQuery.php');
	include_once ('php_display_fn/displayArrayResults.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>EAV - Résultats</title>
		<link rel="stylesheet" type="text/css" href="vue/style.css" />
		<link href='http://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
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

			<button class="special_btn" style="width:234px; font-size:15px" title="Faire une nouvelle requête" onClick="document.location.href='requete.php';">Nouvelle Requête</button>
			<form action="controleur/downloadCSV.php" method="POST" TARGET=_BLANK style="display:inline-block;margin-left: 1em; margin-right: 1em">
				<input type="hidden" value="<?php echo $asResults; ?>" name="serialized_results" />
				<input type="hidden" value="<?php echo $_SESSION['db']; ?>" name="bd" />
				<input class="special_btn" style="width:234px; font-size:15px" type="submit" value="Télécharger au format CSV" />
			</form>
			<button id = "sauver" class="special_btn" style="width:234px; font-size:15px" type="button" title="Enregistre le tableau de résultats dans la base de données de l'utilisateur">Sauvegarder</button>

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

				if (table_name)
				{
					$.ajax({ // Envoie les resultats a saveToDatabase.php avec Ajax en methode POST (Call back)
									url  : 'controleur/saveToDatabase.php',
									type : 'POST',
									data : {action:'save', table_name:table_name},
									dataType: 'html',
									success: function(reponse){
											if (reponse == 0) {
												window.alert('Les résultats ont été enregistrés avec succés!');
											}
											else if (reponse == 1)
											{
												window.alert("Une table portant ce nom existe déjà, l\'opération a été annulée.");
											}
											else if (reponse == 2)
											{
												window.alert("Le nom de la table est invalide, évitez les caractères spéciaux et les tirets.");
											}
											else if (reponse == 3)
											{
												window.alert("Il semble y avoir eu un problème lors de l'insertion des résultats. Cet incident sera reporté.");
											}
											else if (reponse == 4)
											{
												window.alert("Vous ne pouvez pas sauvegarder une table vide.");
											}
											else {
												//window.alert(reponse);
												window.alert("Une erreur inconnue est apparue, si vous ne savez pas pourquoi, veuillez noter le message apparu en rouge sous le tableau et contacter un administrateur");
												$("#test").html(reponse);
											}
									}
							
									});
				}
				else
				{
					window.alert('Opération annulée');
				}
				
			}
			else {
				window.alert('Vous devez être connecté à votre base de données locale pour pouvoir sauvegarder vos résultats');
				if ($("#login_panel").css('display') == 'none') {
					$("#login_panel").slideToggle("slow");
				}
				return false;
			}
		});
		
	} );
	

	</script>
	</body>
</html>
