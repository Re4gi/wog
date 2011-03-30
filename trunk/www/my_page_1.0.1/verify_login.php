<?php
	require_once("./resources/functions.php");
	if ( !isset($_SESSION['login']) || $_SESSION['login']==="guest")
	{
		if (isset($_POST[name]) && isset($_POST[password])) {
			require("connect.php");
	
			$login = clean($_POST[name]);
			$pswd = md5(clean($_POST[password]));
			
			$script = "SELECT login FROM names WHERE (login='$login' && password='$pswd')";
			
			$result = mysql_query($script);
			$login = 'guest';
			while ($row = mysql_fetch_array($result)){
				$login = $row['login'];
			}
			$_SESSION['login']=$login;
			
			mysql_close($con);
		}
	}
	else{
		if (isset($_POST[logout]) && $_POST[logout]==1)	$_SESSION['login']="guest";
	}
?>