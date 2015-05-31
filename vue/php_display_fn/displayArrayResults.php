<?php

/**
 * Affiche les résultats de la requête.
 * @param  Array $Array_results tableau contenant les résultats de la requête.
 * */

function displayArrayResults($array_results, $table_id = 'results')
{
	if (isset($array_results[0]))
	{
		echo '<table id="'.$table_id.'" class="display">';
		$i = 0;

		echo '<thead><tr>';
		echo '<th>n°</th>';
		foreach (array_keys($array_results[0]) as $key){
			if (gettype($key) == 'string') {
				echo '<th>', $key, '</th>';
			}
		}
		if ($table_id == 'tables')
		{
			echo '<th></th>';
		}
		echo '</tr></thead>';

		echo '<tbody>';
		foreach ($array_results as $key => $value) {

			echo '<tr>';
			echo '<td>', ($i + 1), '</td>';
			foreach ($array_results[$i] as $key => $value) {
				if (gettype($key) == 'string') {
					echo '<td>', $value, '</td>';
				}
			}
		if ($table_id == 'tables')
		{?>
			<td>
				<form method=POST action="database.php">
				<input type="hidden" value="<?php echo $array_results[$i][0]; ?>" name="tableNameToDelete" />
				<input type="submit" class="deco_btn" value="X" title="Supprimer cette table" style="width: 5ex;" />
				</form>
			</td>
		<?php
		}
			echo '</tr>';
			$i += 1;
		}
		echo '</tbody></table>';
		
	}
	else
	{
		echo "Cette requête n'a donné aucun résultat";
	}
}
