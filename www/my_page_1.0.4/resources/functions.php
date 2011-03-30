<?php
function clean($string)
{
    $string = htmlentities($string);
    $string = strip_tags($string);
    $string = mysql_real_escape_string($string);
    $string = str_replace("char", "x", $string);
    return $string;
}

function isLogged()
{
	if (!isset($_SESSION['login']) || $_SESSION['login']==="guest")
	{
		return false;
	}
	else return true;
}

function verifyUser($user, $password)
{
	$script = "SELECT login FROM names WHERE (login='$user' && password='$password')";
	$result = mysql_query($script);
	$login = 'guest';

	while ($row = mysql_fetch_array($result))
	{
		$login = $row['login'];
	}
	
	$_SESSION['login'] = $login;
	return $login;
}

function updateUsersTime($user)
{
	$time = date('Y-m-d H:i:s');
	$script = "UPDATE names SET last_login='$time' WHERE login='$user'";
	mysql_query($script);
}

function logUser($user, $password)
{
	$result = false;
	$login = clean($user);
	$pswd = md5(clean($password));

	require_once("connect.php");
	
	$login = verifyUser($login, $pswd);
	
	if ($login!='guest')
	{
		updateUserstime($login);
		$result = true;
	}
	
	mysql_close($con);
	
	return $result;
}

function redirect($site)
{
	header('Location: ' . $site . '?sessionId=' . session_id());
}
?>