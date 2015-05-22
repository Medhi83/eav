<?php

include_once('isDbExists.php');

/**
 * Sette la database en SESSION. Si elle n'est pas spécifiée, redirige.
 * */
function dbSetting()
{
	if (isset($_POST['deco_bdd']) and $_POST['deco_bdd'] == 'X'){
		unset($_SESSION['db']);
		unset($_SESSION['query']);
		header('Location:'.$_SERVER['REQUEST_URI']);
		exit();
	}
	else if (isset($_POST['db']))
	{
		$sDb = htmlspecialchars($_POST['db']);
		isDbExists($sDb);
		$_SESSION['db'] = $_POST['db'];
	}
}
?>
