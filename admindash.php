<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location:login.php');
	}
	else{
		$username = $_SESSION['username'];
	}
?>
<html>

<head>
    <title> Dashboard </title>
	<style>
		#left-side{
			background-color: #f1f1f1;
			overflow: hidden;
			border: none;
		}
	</style>
</head>

<frameset cols = "15%, 85%"?>
		<frame src="dashboard-left.php" noresize="noresize" frameborder="NO" overflow="hidden" name="LEFT" id="left-side">
		<frame src="dashboard-right.htm" border="0" name="RIGHT">
</frameset>

</html>
