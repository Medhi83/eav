<?php
/**
 * Module contenant le contrôleur de getQueryTip -> cette page est chargée en ajax par la vue requete
 **/

include_once('../modele/createQueries.php');

$arQueryTips = createQueryTips();
if (isset($arQueryTips[$_REQUEST['query']]))
{
	echo $arQueryTips[$_REQUEST['query']];
}
else
{
	echo "Requête inconnue";
}
?>
