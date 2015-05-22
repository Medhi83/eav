<?php

/**
 * Affiche les résultats de la requête.
 * @param  object $reponse L'objet PDO contenant les résultats.
 * */

function displayResults($reponse)
{
	echo '<table id="results" class="display">';
	$bIsHeaderDone = false;
	$iResultNumber = 0;
	while ($arDonnees = $reponse->fetch())
	{
		
		if ($bIsHeaderDone === false)
		{	echo '<thead><tr>';
			echo '<th>n°</th>';
			foreach (array_keys($arDonnees) as $cle)
			{
				if (gettype($cle) == 'string')
				{
					echo '<th>', $cle, '</th>';
				}
			}
			echo '</tr></thead>';
			
			echo '<tbody>';
			
			$bIsHeaderDone = true;
		}
		echo '<tr>';
		$iResultNumber += 1;
		echo '<td>', $iResultNumber, '</td>';
		foreach ($arDonnees as $cle => $element)
		{
			if (gettype($cle) == 'string')
			{
				echo '<td>', $element, '</td>';
			}
		}		
		echo '</tr>';
	}
	echo '</tbody></table>';
	
	if ($iResultNumber === 0)
	{
		echo "Cette requête n'a donné aucun résultat";
	}
	$reponse->closeCursor();
}
