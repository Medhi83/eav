<?php include_once ('php_display_fn/displayDbList.php');?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>EAV - Accueil</title>
		<link rel="stylesheet" type="text/css" href="vue/style.css" />
		<link href='http://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="vue/jquery/js/jquery.min.js"></script>
		<script type="text/javascript" src="vue/js/loadAnimation.js"></script>
		<style type="text/css"></style>
	</head>

	<body>
		<!-- Menu -->
		<?php include_once ('top_menu.php')?>
		<!-- Fin du Menu -->
		
		<div id="page">
			<img src="vue/img/Logo-eav.png" alt="EAV" width="600px" style="margin-top:80px;">
			<p style = "font-family: 'Orbitron', sans-serif;"><b>Ensembl . Alternative . View</b></p>
			<form method="post" action="requete.php">
		    		<?php displayDbList($arDbArray) ?><br />
		   		<input class="special_btn" type="submit" value="Valider" />
		   	</form>
		</div>
		<!-- Pied de page -->
		<?php include_once ('footer.php')?>
		<!-- Fin du pied de page -->
	</body>
</html>
