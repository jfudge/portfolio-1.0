<?php
/* 
Name: Jamie Fudge
Date of Submission: Sunday December 01, 2013
Assignment: Book Marking App 
*/ 
	// always start the session, or the session variables won't work
	
	session_start();	
	
	require_once( 'includes/connect.inc.php' );
	require_once( 'includes/functions.inc.php' );
	
	/*if( is_user_logged_in() == FALSE ){
		header( 'Location: login.php' );
	}*/	

	if( isset($_POST[ 'email' ] ) ){
		$error = login();
	}
	
	if( isset( $_POST[ 'title' ] ) ){
	
	$title = clean_up( $_POST[ 'title' ] );	
	$url   = clean_up( $_POST[ 'url' ] );
	
	
	$query = "INSERT INTO 
				bookmarks_events( url,
								 title)
			  VALUES('$url',
			  		 '$title' )";
					 
	$result = mysql_query( $query ) 
			or die( mysql_error() );
	}				 
					 
	$query = 'SELECT * FROM bookmarks_events 
				ORDER BY title, url';
	
	$result = mysql_query( $query ) 
		or die( mysql_error() );	
		
		function clean_up( $text ){
		
		// strip out all HTML code
		$text = strip_tags( $text );
		
		// remove any harmful characters that could
		// break a mysql query - only works if connected to the database
		$text = mysql_real_escape_string( $text );
		
		return $text;
	}
	
	//$title = $row['title'];
 	//$url   = $row['url'];

?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
        <link rel="stylesheet" href="css/styles.css"/>  
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>     
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<![endif]-->
        
        <script>
		$(document).ready(function() {
		$(".items-listed-rc li:odd").css("background-color", "#2b2b2b");
		$(".items-listed-rc li:even").css("background-color", "#1a1a1a");
		 });
		</script>
        
	</head>
	<body>       
		<?php if( is_user_logged_in() ): ?>        
        <div class="container-bookmarks">       
    
        
         <div id="links-container">
         	<div class="links">
            
            <h1>Bookmarks</h1>
            
            <?php while( $row = mysql_fetch_assoc( $result ) ):?> 
            
            <ul class="items-listed-rc">
			<li><p class="title"><?php echo $row['title']; ?></p>
            <?php //echo "<a href='$url'['url']</a>"; ?>    
            
            <p class="url"><a href="<?php echo $row['url']; ?>"><?php echo $row['url']; ?></a></p>
            <p class="delete-all"><?php  echo '<a href="delete.php?id=' . $row['id'] . '">Delete All</a>'  ?></p>
            </li>
            </ul>       
           
            	<?php endwhile; ?>                
            </div>           
        
        </div>
             	       
        	<article>			
    			<form class="bookmarks" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                	<fieldset>
					<ol>
                    	<li>
                        	<label class="grey">Title:</label>
							<?php echo $errors[ 'title' ]; ?>
							<input type="text" name="title" size="80" value="<?php echo $_POST[ 'title' ]; ?>" />        
                    	</li>
						<li>
							<label class="grey">URL:</label>
							<?php echo $errors[ 'url' ]; ?>
							<input type="text" name="url" size="80" value="<?php echo $_POST[ 'url' ]; ?>" />
                        </li>
               			<li>
							<input type="submit" value="Save" />
						</li>                
             		</ol>  
                    </fieldset>                        
    			</form>
                <a class="sign-out" href="logout.php">Sign Out</a> 
                   
            </article> 
           </div>  			           
        <?php endif; ?>  
        <div class="container-login">
		<article>
		<form class="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<?php echo $error; ?>
			<ol>
				<li>
					<label>Email:</label>
					<input type="email" name="email" placeholder="Email" size="40" />
				</li>
				<li>
					<label>Password:</label>
					<input type="password" name="password" placeholder="Password" size="40" />
				</li>
				<li class="submit">
					<input type="submit" value="SIGN IN" />
				</li>
			</ol>
		</form>	
        </article>	
        </div>
      </body>
</html>

