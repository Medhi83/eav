<?php

/**
 * Affiche les résultats de la requête.
 * @param  Array $Array_results tableau contenant les résultats de la requête.
 * */

function displayArrayResults($array_results)
{
	echo '<table id="results" class="display">';
	$i = 1;

	echo '<thead><tr>';
	echo '<th>n°</th>';
	foreach (array_keys($array_results[0]) as $key){
		if (gettype($key) == 'string') {
			echo '<th>', $key, '</th>';
		}
	}
	echo '</tr></thead>';

	echo '<tbody>';
	foreach ($array_results as $key => $value) {

		echo '<tr>';
		echo '<td>', $i, '</td>';
		foreach ($array_results[$i-1] as $key => $value) {
			if (gettype($key) == 'string') {
				echo '<td>', $value, '</td>';
			}
		}		
		echo '</tr>';
		$i += 1;
	}
	echo '</tbody></table>';
	
	if ($i === 1)
	{
		echo "Cette requête n'a donné aucun résultat";
	}
}
