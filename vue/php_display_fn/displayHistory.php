<?php
/**
 * Affiche l'historique des requêtes.
 * */
function displayHistory($arQueryArray)
{
	if (isset($_SESSION['history']) and !empty($_SESSION['history']))
	{
		echo '<table id="history" class="display">';
		$iQueryNumber = 0;

	// Titre des colonnes $arQueryArray[$_SESSION['radio']] . " " . $_SESSION['query']
		echo '<thead><tr>';
		echo '<th>n°</th>';
		foreach (array_keys($_SESSION['history'][0]) as $field)
		{
			if ($field != 'Résultat' and $field != 'Choix')
				{
					echo '<th>', $field, '</th>';
				}
		}
		echo '<th></th><th></th>';
		echo '</tr></thead>';

		echo '<tbody>';
		foreach ($_SESSION['history'] as $query) 
		{
			echo '<tr>';
			echo '<td>', ($iQueryNumber + 1), '</td>';
			foreach ($query as $field => $value) 
			{
				if ($field != 'Résultat' and $field != 'Choix' and $field != 'Requête')
				{
					echo '<td>', $value, '</td>';
				}
				else if ($field == 'Requête')
				{
					echo '<td>' . $arQueryArray[$query['Choix']] . " " . $query['Requête'] . '</td>';
				}
			}
			?>
			<td>		
			<form action="resultat.php" method="POST">
				<input type="hidden" name="historyQuery" value="" />
				<input type="hidden" name="db" value="<?php echo $query['Base de données']; ?>" />
				<input type="hidden" name="query" value="<?php echo $query['Choix']; ?>" />
				<input type="hidden" name="<?php echo $query['Choix']; ?>" value="<?php echo $query['Requête']; ?>" />
				<input name="voir" class="view_btn" value="" type="submit" title="Voir le résultat de cette requête" style="width: 5ex;" />
			</form>
			</td>
			<td>
			<input type="button" class="deco_btn" value="X" title="Supprimer cette requête" style="width: 5ex;" onclick="delQueryInHistory(<?php echo $iQueryNumber; ?>, this);"/>
			</td>
			<?php
			echo '</tr>';
			$iQueryNumber += 1;
		}
		echo '</tbody></table>';
	}
	else
	{
		echo "<p>Aucune requête dans votre historique de Session</p>";
	}
}
?>

