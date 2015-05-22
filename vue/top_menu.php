<script type="text/javascript">
	$(document).ready(function(){
		$(".slide_btn").click(function(){
			$("#login_panel").slideToggle("slow");
			return false;
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
		echo '<div id="connexion">
			<p class="slide"><a href="#" class="slide_btn">', htmlentities(trim($_SESSION['login'])), '</a></p>
			<div id="login_panel">
				<p><a href="deconnexion.php" class="deco_btn">Se déconnecter</a></p>
			</div>
		</div>';
	}
?>
</div>
