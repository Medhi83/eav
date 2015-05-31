<?php
/**
 * Module contenant la fonction de setting d ela requête.
 * */

/**
 * Sette la requête en SESSION.
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
