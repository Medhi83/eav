<?php
	include_once ('php_display_fn/displayArrayResults.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>EAV - Ma base de données</title>
		<link rel="stylesheet" type="text/css" href="vue/style.css" />
		<link href='http://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
		<script type="text/javascript" src="vue/jquery/js/jquery.min.js"></script>
		<script type="text/javascript" src="vue/jquery/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="vue/jquery/js/haut_page.js"></script>
		<script type="text/javascript" src="vue/jquery/js/jquery.validate.js"></script>
		<script type="text/javascript" src="vue/jquery/js/jquery.additional-methods.min.js"></script>
		<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>
	</head>

	<body>
		<!-- Menu -->
		<?php include_once ('top_menu.php')?>
		<!-- Fin du Menu -->
		
		<div id="page">
			<fieldset>
				<legend class="titre">Ma base de données</legend>
				<fieldset class="sous-champ">
					<legend>Mes tables</legend>
					<?php displayArrayResults($db_tables); ?>
				</fieldset>
				<fieldset id="content" class="sous-champ">
					<p>Aucune table séléctionée</p>
				</fieldset>
			</fieldset>
		</div>

		<!-- Pied de page -->
		<?php include_once ('footer.php')?>
		<!-- Fin du pied de page -->

		<script type="text/javascript">
		$(document).ready( function () {
			var table = $('#results').DataTable({
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
			
			$('#results tbody').on( 'click', 'tr', function () {
				if ( $(this).hasClass('selected') ) {
					$(this).removeClass('selected');
					
					$('#content').html('<p>Aucune table séléctionée</p>');
				}
				else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');

					var selected_table = table.row( this ).data()[1];
					
					$.ajax({
						type : 'POST',
						data : {action : 'display', table_name : selected_table },
						url  : 'controleur/contentExplorer.php',
						dataType : 'html',
						success: function(html_content){
							$('#content').html(html_content);
							
							$('#tableContent').DataTable({
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
						}
					});
				}
			});
			
		} );
		</script>
	</body>
</html>
