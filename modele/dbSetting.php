<?php

include_once('isDbExists.php');

/**
 * Sette la database en SESSION. Si elle n'est pas spécifiée, redirige.
 * */
function dbSetting()
{
	if (isset($_POST['db']))
	{
		$sDb = htmlspecialchars($_POST['db']);
		isDbExists($sDb);
		$_SESSION['db'] = $_POST['db'];
	}
}
?>
