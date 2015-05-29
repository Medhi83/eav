
<div id="connexion">
	<p class="slide"><a href="#" class="slide_btn">Se connecter</a></p>
	
	<div id="login_panel">

		<form name="login_form" id="login_form" method="post" action=<?php echo $_SERVER['PHP_SELF']?>>
			
			<label for="username">Identifiant:</label>
			<input type="text" name="login" id="username" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>" size="10" /><br />
			
			<label for="password">Mot de passe:</label>
			<input type="password" name="pass" id="password" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>" size="10" />
			
			<input type="submit" name="connexion" id="submit" value="Connexion" /><br />
			
		</form>

		<div id="connexion_error">
		<?php
		if (isset($erreur_connexion)) {
			echo '<div style = "padding: 5px">';
			echo '<img src="vue/img/warning.png" Alt="Erreur" style="width:20px" />';
			echo '</div>';
			echo $erreur_connexion;
		}
		?>
		</div>
	</div>
</div>

