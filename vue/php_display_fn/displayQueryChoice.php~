<?php
/**
 * Affiche un choix de requete.
 * @param str $choice Numéro du choix de requête.
 * @param str $sentance Phrase de la requête.
 * */
function displayQueryChoice($choice, $sentance)
{
	?>
	<p>
	<input type="radio" name="query" value="<?php echo $choice; ?>" id="<?php echo $choice; ?>" onclick="displayArea(this); document.getElementsByName(this.id)[0].focus();" />
   	<label for="<?php echo $choice; ?>"><?php echo $sentance; ?></label><br />
   	<input style="display:none" type="text" name="<?php echo $choice; ?>" />
	</p><?php
}
?>
