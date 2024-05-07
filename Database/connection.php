<?php
$server="localhost";
$dbuser="root";
$dbpass="";
$dbname="osuvs";
$con=mysql_connect($server,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());
?>