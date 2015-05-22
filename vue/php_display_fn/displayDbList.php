<?php
/**
 * Affiche la liste déroulante des db disponibles.
 * @param array $dbArray Tableau associatif des dbs disponibles.
 * */
function displayDbList($dbArray)
{
	?><select name="db" style="font-size: large;padding: 6px;"><?php
	foreach ($dbArray as $cle => $element)
	{
		if (isset($_SESSION['db']) and $element == $_SESSION['db'])
		{
		?>
			<option selected=true value=<?php echo $element; ?>><?php echo $cle; ?></option>
		<?php
		}
		else
		{
		?>
			<option value=<?php echo $element; ?>><?php echo $cle; ?></option>
		<?php
		}
	}
	?></select><?php
}
?>
