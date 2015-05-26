<?php
/**
 * Crée une string contenant les résultats au format CSV.
 * @param  object $reponse L'objet PDO contenant les résultats.
 * */
function createCSVResultsString($arReponse)
{
	$sResultsCSV = '';
	$bIsHeaderDone = false;
	$iResultNumber = 0;
	$delimiter = '\t';
	foreach ($arReponse as $arDonnees)
	{
		if ($bIsHeaderDone === false)
		{
			$sResultsCSV .= 'n°';
			foreach ($arDonnees as $cle => $element)
			{
				if (gettype($cle) == 'string')
				{
					$sResultsCSV .= $delimiter . $cle;
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
				$sResultsCSV .= $delimiter . $element;
			}
		}		
		$sResultsCSV .= '\n';
	}
	return stripcslashes($sResultsCSV);
}
?>
