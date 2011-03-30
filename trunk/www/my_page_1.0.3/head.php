<?php session_start()?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Order of Holy Retribution</title>
	<link rel="stylesheet" type="text/css" href="my_style.css"/>
	<meta name="author" content="Regec Marek"/>
	<script language="javascript" type="text/javascript">
    function getDivHeight()
    {
    	var o_height;
    	var c_height;
    	var r_height;
    	c_height=(document.getElementById("middle").clientHeight);
        o_height=(document.getElementById("middle").offsetHeight);
		r_height=Math.ceil(o_height/288)*288;
		document.getElementById("middle_center").style.height=r_height+'px';
    }
    </script>
</head>