<?php

include_once('displayQueryChoice.php');
/**
 * Affiche la liste des choix de requete.
 * @param array $arQuerryArray Tableau associatif des choix possibles.
 * */
function displayQueryList($arQueryArray)
{
	foreach ($arQueryArray as $choice => $sentance)
	{
		displayQueryChoice($choice, $sentance);
	}
}
?>
