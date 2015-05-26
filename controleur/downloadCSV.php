<?php
if (isset($_POST['csvString']) and (isset($_POST['bd'])))
{
	include_once('../modele/getCSV.php');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename=' . 'eav_result__' . htmlspecialchars_decode($_POST['bd']) . "_" . date("d_m_Y__H_i_s") . '.csv');
	header('Expires: 0');	
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	$arReponse = unserialize($_POST['csvString']);
	$sReponseCSV = createCSVResultsString($arReponse);
	echo $sReponseCSV;
}
?>
