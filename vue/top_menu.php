<script type="text/javascript">
	$(document).ready(function(){
		$(".slide_btn").click(function(){
			$("#login_panel").slideToggle("slow");
			return false;
		});
		
		if (<?php echo json_encode(isset($erreur_connexion)); ?>) {
			$("#login_panel").slideToggle("slow");		
		}
		
		$('#login_form').validate({
			errorLabelContainer: '#connexion_error',
			rules: {
				login: { required: true },
				pass: { required: true }
			},
			messages: {
				login: {
					required: "Identifiant obligatoire"
				},
				pass: {
					required: "Mot de passe obligatoire"
				}
			}
		});
	});
</script>


<div id="menu">
	<img src="vue/img/Logo-eav.png" alt="EAV" class="logo">
	<nav class="top">
		<ul>
			<li><a href="index.php" class="menu_btn">Accueil</a></li>
			<li><a href="requete.php" class="menu_btn">Requête</a></li>
			<li><a href="apropos.php" class="menu_btn">A propos</a></li>
			<li><a href="contact.php" class="menu_btn">Contact</a></li>
		</ul>
	</nav>
<?php
	if (!isset($_SESSION['login'])) {
		include_once ("login_panel.php");
	}
	else {
		include_once ("connected_panel.php");
	}
?>
</div>
