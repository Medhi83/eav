<?php
/**
 * Module contenant la fonction de création de la string contenant les résultats sous forme csv.
 * */

/**
 * Crée une string contenant les résultats au format CSV.
 * @param  object $reponse L'objet PDO contenant les résultats.
 * */
function createCSVResultsString($arReponse)
{
	$sResultsCSV = '';
	$bIsHeaderDone = false;
	$iResultNumber = 0;
	$sDelimiter = '\t';
	foreach ($arReponse as $arDonnees)
	{
		if ($bIsHeaderDone === false)
		{
			$sResultsCSV .= 'n°';
			foreach ($arDonnees as $cle => $element)
			{
				if (gettype($cle) == 'string')
				{
					$sResultsCSV .= $sDelimiter . $cle;
				}
			}
			$sResultsCSV .= '\n';
			$bIsHeaderDone = true;
		}
		$iResultNumber += 1;
		$sResultsCSV .= $iResultNumber;
		foreach ($arDonnees as $cle => $element)
		{
			if (gettype($cle) == 'string')
			{
				$sResultsCSV .= $sDelimiter . $element;
			}
		}		
		$sResultsCSV .= '\n';
	}
	return stripcslashes($sResultsCSV);
}
?>
