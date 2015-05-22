<?php
/**
 * Affiche la requête en cours.
 * @param array $queryArray Tableau associatif des requetes.
 * */
function displayCurrentQuery($queryArray)
{
	?><p>
	<?php echo $queryArray[$_SESSION['radio']]; ?>
	<input type="hidden" name="query" value="<?php echo $_SESSION['radio']; ?>" />
	<?php 
	if ($_SESSION['radio'] != 'choix3')
	{
	?>
		<input type="text" name="<?php echo $_SESSION['radio']; ?>" />
	<?php
	}
	else
	{
	?>
		<input type="textarea" name="<?php echo $_SESSION['radio']; ?>" cols=40 rows=1></textarea>
	<?php
	}
	?>
	</p><?php
}
?>
