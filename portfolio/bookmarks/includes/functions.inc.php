<?php
/* 
Name: Jamie Fudge
Date of Submission: Sunday December 01, 2013
Assignment: Book Marking App 
*/ 

	define( 'LOGGED_IN', 	'adlcwbucbaljslidhadkhfjkdgfkahfsf' );
	define( 'LOGIN_TOKEN', 	'k;vi92	89fhwhfksjdhfiud1hdw8fwfgi' );
	
	/* this function compares login credentials entered
	 * vs. the ones stored in the database, and logs the user in if
	 * they match.
	 */
	function login(){
		
		$email 		= mysql_real_escape_string( $_POST[ 'email' ] );
		$password	= mysql_real_escape_string( sha1( $_POST[ 'password' ] ) );
		
		$query = "SELECT id, email, password FROM users WHERE email='{$email}'";
		
		$result = mysql_query( $query ) or die( mysql_error() );
		
		// if there was a user 
		if( mysql_num_rows( $result ) > 0 ){
			
			$row = mysql_fetch_assoc( $result );
			
			if( strcmp( $password, $row[ 'password' ] ) == 0 ){
				
				// email and password were OK, log the user in
				$_SESSION[ 'user_id' ] = $row[ 'id' ];
				$_SESSION[ 'email' ]  = $email;
				$_SESSION[ 'password' ]  = $password;
				$_SESSION[ LOGGED_IN ] = LOGIN_TOKEN;
				header( 'Location: index.php' );
				
				// if redirect fails, the following code will execute
				echo 'The redirect has failed.';
				exit();
			}
		}
		
		return '<p class="error">The login or password you entered was incorrect.</p>';
	}
	
	/* this is similar to the CMS's check_login
	   function, but can be used to secure parts of a page */
	function is_user_logged_in(){
		if( strcmp( $_SESSION[ LOGGED_IN ], LOGIN_TOKEN ) == 0 ){
			// user is logged in, so return a value of TRUE
			return TRUE;
		}
		
		// in any other case, let's return FALSE because we have to
		// assume the user is not logged in
		return FALSE;
	}
	
	/* this function will destroy all the login 
	 * session variables, thus logging th user out.
	 */
	function logout(){
		$_SESSION[ 'user_id' ] 			= NULL;
		$_SESSION[ LOGGED_IN ] 			= NULL;		
		$_SESSION[ 'email' ] 			= NULL;
		$_SESSION[ 'id' ] 				= NULL;
		$_SESSION[ 'firstname' ] 		= NULL;
		$_SESSION[ 'lastname' ] 		= NULL;
		
		
		unset( $_SESSION[ 'user_id' ] );
		unset( $_SESSION[ LOGGED_IN  ] );
		unset( $_SESSION[ 'email' ] );
		unset( $_SESSION[ 'id' ] );
		unset( $_SESSION[ 'firstname' ] );
		unset( $_SESSION[ 'lastname' ] );
		
		
		redirect( 'index.php' );
		
		// if redirect fails, the following code will execute
		echo 'The redirect has failed.';
		exit();
	}
	
		
	
	
