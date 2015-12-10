<?php
session_start();
if(!isset($_SESSION['latest']))
	{
	$_SESSION['latest']=10;
	}
else
	{
	$_SESSION['latest']=$_SESSION['latest']-1;
	}
echo $_SESSION['latest'];
?>
