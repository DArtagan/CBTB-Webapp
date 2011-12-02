<?php require_once "includes/db.inc.php"; ?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php include "includes/headmatter.inc.php" ?>
	<title>Compassion by the Book</title>
	<meta name="description" content="">
	<meta name="author" content="">
</head>
<body>

<div id="container">
	<?php include "includes/header.inc.php" ?>
	<div id="main" role="main">
	
		<h2> Viewing current doners </h2>
		
		<table border = "1">
		  <th>
		    <td>User</td><td>Email</td>
		  </th>
		  <?php 
		    $error = false;
        if(count($_POST) > 0 ) {
	        if($dbh = open_db()) {
		        try{
			        $donors = $dbh->prepare('select donor, email from donors');
			        $donors->setFetchMode(PDO::FETCH_ASSOC);
			
			        while($row = $donors->fetch()) {
			          ?>
			            <tr>
			              <td><?php echo $row['donor'];?></td>
			              <td><?php echo $row['email'];?></td>
			            </tr>
			          <?php
			        }
			      } catch (PDOException $e) {
				      $error = 'Connection failed: ' . $e->getMessage();
			      }	
		      } else {
			      $error = "Error connecting to db";
		      }
	      }
      ?>
		</table>
		
	</div>
	<?php include "includes/footer.inc.php" ?>
</div> <!--! end of #container -->
<?php include "includes/scripts.inc.php" ?>
</body>
</html>
