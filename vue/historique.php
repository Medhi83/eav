<?php
	include_once ('php_display_fn/displayHistory.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>EAV - Historique</title>
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
			<legend class="titre">Historique des requêtes</legend>
				<?php displayHistory($arQueryArray); ?>
			</fieldset>
			<form method="POST" action=index.php onSubmit="return (confirm('Supprimer l\'historique complet?'))" />
				<input type="hidden" name="delAllHistory" value=1 />
				<input type=submit id = "effacer_tout" class="deco_btn" style="width:234px; font-size:15px" value="Effacer l'historique" title="Efface l'ensemble de l'historique de la session de l'utilisateur" onclick="return confirm('Êtes vous sûr de vouloir effacer l'historique?');"/>
			</form>
			<p id="test" class="error"></p>
			
		</div>
		<!-- Pied de page -->
		<?php include_once ('footer.php')?>
		<!-- Fin du pied de page -->
	<script type="text/javascript">
	$(document).ready(function () 
	{
		$('#history').DataTable
		({
			"scrollX": true,
			"language": 
			{
				"lengthMenu": "Afficher _MENU_ éléments par page",
				"zeroRecords": "Aucun résultat",
				"info": "Page _PAGE_ sur _PAGES_",
				"infoEmpty": "Aucun enregistrement valide",
				"infoFiltered": "(filtered from _MAX_ total records)",
				"loadingRecords": "Chargement...",
				"processing":     "Traitement des données...",
				"search":         "Recherche:",
				"paginate": 
				{
					"first":      "Première",
					"last":       "Dernière",
					"next":       "Suivante",
					"previous":   "Précédente"
				}
			}
		});
	});

	//Objet XMLHTTPRequest
	var XHR = null;

	
	function getXMLHTTP()
	{
		var xhr = null;
		if(window.XMLHttpRequest)
		{ // Firefox et autres
			xhr = new XMLHttpRequest();
		}
		else if(window.ActiveXObject)
		{ // Internet Explorer
			try
			{
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e)
			{
				try
				{
					xhr = new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch(e1)
				{
					xhr = null;
				}
			}
		}
		else
		{ // XMLHttpRequest non supporté par le navigateur
			window.alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
		}
	 
		return xhr;
	}
	

	//Fonction de suppression de la requête
	function delQueryInHistory(queryId, self)
	{
		//Si l'objet existe déjà on abandonne la requête et on le supprime
		if(XHR && XHR.readyState != 0)
		{
			XHR.abort();
			delete XHR;
		}
	 
		//Création de l'objet XMLHTTPRequest
		XHR = getXMLHTTP();
	 
		if(!XHR)
		{
			return false;
		}
		
	//URL du script de suppression auquel on passe l'id à supprimer
	XHR.open("GET", "controleur/delQueryInHistory.php?queryId=" + queryId, true);
 
	//On se sert de l'événement OnReadyStateChange pour supprimer la ligne
	XHR.onreadystatechange = function()
	{
		//Si le chargement est terminé
		if (XHR.readyState == 4)
		{ 
			//Suppression de l'entrée
			self.parentNode.parentNode.parentNode.removeChild(self.parentNode.parentNode);
		}
	}
 
	//Envoi de la requête
	XHR.send();
	}
	
	function validate()
	{
		window.alert(confirm('ok'));
	}
	
	</script>
	</body>
</html>
