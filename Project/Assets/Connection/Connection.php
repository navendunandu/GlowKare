<?php
$server="localhost";
$username="root";
$password="";
$db="db_glowKare";

$Con = mysqli_connect($server,$username,$password,$db);

if(!$Con)
{
	echo("error");
}

?>