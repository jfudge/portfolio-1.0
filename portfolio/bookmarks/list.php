<?php require('includes/connect.inc.php');?>
oo
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Bookmarker</title>
	</head>
	<body>
		<h1>Bookmarker</h1>
		<ul>
			
			<?php while( $row = mysql_fetch_assoc( $result ) ): ?>
			
			<li><?php echo $row['link_1']; ?>, 
				<?php echo $row['link_2']; ?> 
				- <?php echo $row['link_3']; ?> 
				- <?php echo $row['link_4']; ?> 
				- 
			
			<?php endwhile; ?>
			
	</ul>
	</body>
</html>