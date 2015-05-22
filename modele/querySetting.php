<?php
/**
 * Sette la requête en SESSION. Si elle n'a pas été spécifiée, redirige.
 * */
function querySetting()
{
	if (isset($_POST['query']))
	{
		$sQuery = htmlspecialchars($_POST['query']);
		$_SESSION['radio'] = $sQuery;
		if (isset($_POST[$_SESSION['radio']]))
		{
			$_SESSION['query'] = htmlspecialchars($_POST[$_SESSION['radio']]);
		}
	}
}
?>
