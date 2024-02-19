<?php
/* 
Name: Jamie Fudge
Date of Submission: Sunday December 01, 2013
Assignment: Book Marking App 
*/ 
	
	/* database credentials */
	define( 'DB_HOST', 		'mysql.parafx.com' );
	define( 'DB_USER', 		'fdgj0006' );
	define( 'DB_PASSWORD', 	'P9-poutoudom' );
	define( 'DB_NAME', 		'fdgj0006' );
	
	//connect to the database
		mysql_connect( DB_HOST, DB_USER, DB_PASSWORD ) 
		or die( mysql_error() );
	
	//pick database to work
		mysql_select_db( fdgj0006 )
		or die( mysql_error() );
		
