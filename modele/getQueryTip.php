<?php
include_once('createQueries.php');
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
