<?php

	$sent = false;
	
	$errors = array();
	
	if( isset( $_POST[ 'name' ] ) ){
		
		$name  		= $_POST[ 'name' ];
		$email 		= $_POST[ 'email' ];
		$message 	= $_POST[ 'message' ];
		
		if( str_word_count( $name ) < 2 ){
			$errors[ 'name' ] = '<p class="error">Please enter your full name.</p>';
		}
		
		if( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ){
			$errors[ 'email' ] = '<p class="error">Please enter a valid email address.</p>';
		}
		
		if( strlen( $message ) < 2 ){
			$errors[ 'message' ] = '<p class="error">Please enter a message.</p>';
		}
		
		$to			= 'fdgj0006@humbermail.ca';
		$from		= 'mailer@fdgj0006.ca';
		$subject	= 'Contact Email From: ' . $name;
		
		if( count( $errors ) < 1 ){
					
			require( 'includes/php-mailer.php' );
			
			$mail = new PHPMailer();
			$mail->From = $email;
			$mail->FromName = $name;
			$mail->addAddress( $to, 'Jamie Fudge' );
			$mail->Subject = $subject;
			$mail->Body = $message;
			
			$sent = $mail->send();
			
			header( 'Location: ' . $_SERVER[ 'PHP_SELF' ] . '?success' );
		}
	}
	
?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<title>Sweet Delights Bakery</title>
		<link rel="stylesheet" href="css/style-min.css" />
        <link rel="stylesheet" href="css/fluid.css" />
        <link rel="stylesheet" href="css/copyright.css" />
        <!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<![endif]-->      
    </head>
	
    <body>     
    
    	<div id="header">
		
		<div class="top"> 
		<span></span>       
		</div>   
        
        <div id="social">            
			<a href="#" ><img class="facebook" src="images/facebook.png" alt="facebook"/></a>
			<a href="#" ><img class="twitter" src="images/twitter.png" alt="twitter"/></a>
			<a href="#" ><img class="pinterest" src="images/pinterest.png" alt="pinterest"/></a>
			<a href="#" ><img class="rss" src="images/rss-feeds.png" alt="rss" /></a>            
		</div>   
		
			<nav id="main-nav">
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="about.html">About</a></li>
			<li><a href="specials.html">Specials</a></li>
			<li><a href="gallery.html">Gallery</a></li>    
			<li><a href="contact.php">Contact</a></li>
		</ul>        
			</nav>
			
			 <div class="logo">
			 <span></span>
			 </div>
			 
			 <div class="logo2">
			 <span></span>
			 </div>
             
              <div class="mobile-wrapper">
             	<nav id="mobile-nav">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="specials.html">Specials</a></li>
						<li><a href="gallery.html">Gallery</a></li>
                        <li><a href="contact.php">Contact</a></li>
					</ul>
				</nav>  
             </div>      
		
		</div>  <!--end of header-->
        
        	<div id="content">            
            	<section id="intro-contact">                             
                 	<div id="contact-container">                 
                 		<div class="contact">
                    
                    		<?php if( !isset( $_GET[ 'success' ] ) ):?>
							<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
								<h1>Contact Us</h1>
								<ol>
                                    <li>
                                        <label for="name">Name:</label>
                                        <?php // echo $errors[ 'name' ]; ?>
                                        <input 
                                            
										<?php if( isset( $errors[ 'name' ] ) ) echo 'class="invalid"' ; ?> 
						
                                        type="text" id="name" name="name" 
                                        size="60" value="<?php echo $name; ?>" 
                                        placeholder="Enter your full name." />
                                	</li>
									
                                    <li>
                                        <label for="email">Email:</label>
                                        <?php // echo $errors[ 'email' ]; ?>
                                        <input 
                                        
										<?php if( isset( $errors[ 'email' ] ) ) echo 'class="invalid"' ; ?>
					
                                        type="text" id="email" name="email" 
                                        size="60" value="<?php echo $email; ?>" 
                                        placeholder="Enter your valid name." />
									</li>
				
                                    <li>
                                        <label for="message">Message:</label>
                                        <?php // echo $errors[ 'message' ]; ?>
                                        <textarea 
                                        
                                        <?php if( isset( $errors[ 'message' ] ) ) echo 'class="invalid"' ; ?>
                                        
                                        name="message" id="message" 
                                        rows="3" cols="30" 
                                        placeholder="Enter a message."><?php echo $message; ?></textarea>
                                    </li>
                                    
                                    
                                    <li>
                                        <input type="submit" value="Send" />
                                    </li>
                              </ol>
                           </form>
						
						<?php else: ?>
                        <p>Your email was successfully sent!</p>
                        <?php endif;?>
                    
                    </div>		<!--end of contact -->
                 
                 </div>       <!--end of contact-container -->      
            
            </section>    <!--end of intro -->
            
            <section id="section3">
							  
				<div id="about-images">
					<img src="images/about3.jpg" alt="cupcake"/>
					<img src="images/about4.jpg" alt="cupcake"/>
					<img src="images/about2.jpg" alt="cupcake"/>
			 	</div>          
												 
				</section> <!--end of section3 -->            
                    
            	<section id="section4">
						
					<div id="footer-container">
						
						<div class="footer-box1">  
							
							<h3>Site Map</h3>
							<ul>
								<li><a href="about.html">About</a></li>
								<li><a href="menu.html">Menu</a></li>
								<li><a href="specials.html">Specials</a></li>
								<li><a href="gallery.html">Gallery</a></li>
								<li><a href="contact.php">Contact</a></li>
							</ul>
																				 
							</div>
							
							<div class="footer-box2">
							
							<h3>Contact Info</h3>                             
							
							<ul>
								<li>Email:</li>
								<li><a href="#">bakery@gmail.com</a></li>
								<li>Phone:</li>
								<li class="phone"><a href="#">905-456-1122</a></li>
								<li>33 Hezelnut Crescent</li>
								<li>Toronto, Ontario</li>
								<li>Canada</li>
								<li>OX5 1EH</li>
							</ul>                            
												  
							</div>
							
							<div class="footer-box3">   
							
								<h3>Please contact us today.</h3>
								<ul>
									<li>Enquire about:</li>
									<li>Wedding Cakes</li>
									<li>Glutten Free Cakes</li>
									<li>Birthday Cakes</li>
									<li>Gourmet Cupcakes</li>
									<li>Cake Pops</li>
									<li>Engagement Cakes</li>
									<li>Baby Shower Cakes</li>
								 </ul>               
							 </div>		
                             
                             </div>   <!--end of footer-container--> 								
						                       
							  <div id="main-footer"> 
									 <div id="social-footer">            
										<a href="#" ><img class="facebook" src="images/facebook.png" alt="facebook"/></a>
										<a href="#" ><img class="twitter" src="images/twitter.png" alt="twitter"/></a>
										<a href="#" ><img class="pinterest" src="images/pinterest.png" alt="pinterest"/></a>
										<a href="#" ><img class="rss" src="images/rss-feeds.png" alt="rss"/></a>            
									 </div>                             
									<p>&copy; Sweet Delights  2013</p>         
								
								</div> <!--end of main-footer-->							                      
						
						</section><!--end of section4-->
            </div>         <!--end of content -->
            
	</body>
</html>

