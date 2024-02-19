<?php
/* 
Name: Jamie Fudge
Date of Submission: Sunday December 01, 2013
Assignment: Book Marking App 
*/ 	
	session_start();
	
	include( 'includes/functions.inc.php' );
	
	header ("Location: index.php");
	
	logout(); ?>
	
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Logout</title>
</head>

<body>

	<h1 style="margin: 0 auto;">Successfully Logged Out!</h1>

</body>
</html>	