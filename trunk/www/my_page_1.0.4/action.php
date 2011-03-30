<?php
session_start();
	require_once('./resources/functions.php');
	if (!isLogged())
	{
		logUser($_POST[name], $_POST[password]);	
	}
	else
	{
		if (isset($_POST[logout]) && $_POST[logout]==1)	$_SESSION['login']="guest";
	}

	$site=$_SERVER["HTTP_REFERER"];
	header('Location: ' . $site . '?sessionId=' . session_id());
?>