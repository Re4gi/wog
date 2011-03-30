<?php
function clean($string)
{
    $string = htmlentities($string);
    $string = strip_tags($string);
    $string = mysql_real_escape_string($string);
    $string = str_replace("char", "x", $string);
    return $string;
}
?>