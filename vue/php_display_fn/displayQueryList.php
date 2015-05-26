<?php

include_once('displayQueryChoice.php');
/**
 * Affiche la liste des choix de requete.
 * @param array $arQuerryArray Tableau associatif des choix possibles.
 * */
function displayQueryList($arQueryArray)
{
	?>
	<select style="font-size: large;padding: 6px;" id=queryList name=query onclick="changeInputText(this);" >
	<?php
	foreach ($arQueryArray as $choice => $sentance)
	{
		displayQueryChoice($choice, $sentance);
	}
	?>
	</select>
	<?php
}
?>
