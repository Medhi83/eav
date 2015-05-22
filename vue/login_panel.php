<div id="connexion">
	<p class="slide"><a href="#" class="slide_btn">Se connecter</a></p>
	
	<div id="login_panel">

		<form name="login_form" id="login_form" method="post" action=<?php echo $_SERVER['PHP_SELF']?>>
			
			<label for="username">Nom d'utilisateur:</label>
			<input type="text" name="login" id="username" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>" size="10" /><br />
			
			<label for="password">Mot de passe:</label>
			<input type="password" name="pass" id="password" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>" size="10" />
			
			<input type="submit" name="connexion" id="submit" value="Connexion" /><br />
			
		</form>	
	</div>
</div>
<?php
if (isset($erreur)) echo '<i style="color: #a30000;float: right; margin-top: 10px; margin-right: 10px;">',
				$erreur,'</i><img src="vue/img/warning.png" style="width:20px; margin: 5px; float:right">';
?>

