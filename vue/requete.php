<?php 
include_once ('php_display_fn/displayDbList.php');
include_once ('php_display_fn/displayQueryList.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>EAV - Accueil</title>
		<link rel="stylesheet" type="text/css" href="vue/style.css" />
		<link href='http://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="vue/jquery/css/ui-lightness/jquery-ui-1.10.2.custom.css" type='text/css'>
		<script type="text/javascript" src="vue/jquery/js/jquery.min.js"></script>
		<script type="text/javascript" src="vue/js/loadAnimation.js"></script>
	</head>

	<body>
		<!-- Menu -->
		<?php include_once ('top_menu.php')?>
		<!-- Fin du Menu -->
		
		<div id="page">
			<fieldset>
			<legend class="titre">Lancer une requête</legend>
				<fieldset class="sous-champ">
					<legend>Base de données</legend>
					<form method="post" action="requete.php">
						<?php displayDbList($arDbArray) ?>
						<input class="special_btn" type="submit" value=">>" title="Se connecter à la base de données séléctionnée" style="width: 5ex" />
						<input id='deco_bdd' name='deco_bdd' class="deco_btn" type="submit" value="X" title="Se déconnecter de la base de données courante" style="width: 5ex" />
					</form>
						<p>
							Base de données courante : 
							<?php
								if(isset($_SESSION['db'])) echo '<i class="success">', $_SESSION['db'], '</i>';
								else echo '<i class="error">aucune</i>';
							?>
						</p>
					
				</fieldset>
				<fieldset class="sous-champ" style="text-align:left">
					<legend>Requêtes</legend>
					<form method="post" action="resultat.php" onsubmit="iconeChargement()">
					<?php displayQueryList($arQueryArray); ?>
				</fieldset>
				<input  class="special_btn" type="submit" value="Lancer" /><br />
				<div id="chargement" style="margin:10px auto"><img src="vue/img/load.gif" alt="Chargement.."></div>
				</form>
				
			</fieldset>
		</div>
		
		<!-- Pied de page -->
		<?php include_once ('footer.php')?>
		<!-- Fin du pied de page -->

		<script type="text/javascript">
		$('#chargement').hide();

		function iconeChargement(){
			$('#chargement').show();		
		}
		function displayArea(self)
		{
			var radio = document.getElementsByName(self.name);
			for (i_radio = 0; i_radio < radio.length; i_radio++)
			{
				if (radio[i_radio] === self)
				{
					document.getElementsByName(radio[i_radio].value)[0].style.display = 'inline-block';
				}
				else
				{
					document.getElementsByName(radio[i_radio].value)[0].style.display = 'none';
				}
			}
		}
		</script>
	</body>
</html>
