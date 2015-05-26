<?php
/**
 * Affiche un choix de requete.
 * @param str $choice Numéro du choix de requête.
 * @param str $sentance Phrase de la requête.
 * */
function displayQueryChoice($choice, $sentance)
{
	?>
	<option value="<?php echo $choice; ?>" id="<?php echo $choice; ?>">
	<?php echo $sentance; ?>
	</option>
	<?php
}
?>
