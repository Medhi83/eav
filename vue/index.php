<?php include_once ('php_display_fn/displayDbList.php');?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>EAV - Accueil</title>
		<link rel="stylesheet" type="text/css" href="vue/style.css" />
		<link href='http://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="vue/jquery/js/jquery.min.js"></script>
		<script type="text/javascript" src="vue/jquery/js/haut_page.js"></script>
		<script type="text/javascript" src="vue/jquery/js/jquery.validate.js"></script>
		<script type="text/javascript" src="vue/jquery/js/jquery.additional-methods.min.js"></script>
	</head>

	<body>
		<!-- Menu -->
		<?php include_once ('top_menu.php')?>
		<!-- Fin du Menu -->
		<!-- test js -->
		<?php include_once('noScriptMessage.php'); ?>
		
		<div id="page">
			<img src="vue/img/Logo-eav.png" alt="EAV" width="600" style="margin-top:80px;">
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
