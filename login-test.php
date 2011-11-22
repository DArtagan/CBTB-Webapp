<?php session_start(); ?>
<?php
	include "includes/db.inc.php";

	$myusername = $_POST['username'];
	$mypassword = $_POST['password'];
	
	if ($dbh = open_db() ) {
		try { 
			$users = $dbh->prepare('select username, password from users where username = :username');
			$users->execute(array(":username" => $myusername));
			
			if($user = $users->fetch()) {
				if( $user['password'] == sha1($mypassword) ) {
					printf( "<p>Login for user %s successful</p>", $myusername);
					$_SESSION['username'] = $_POST['username'];
					?><a href="login.php">Special page for logged in members</a><?php
				} else {
					printf( "<p>Incorrect password for user %s </p>", $myusername );
				}
			} else {
				printf( "<p>user %s doesn't exist</p>", $myusername);
			}
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}	
	} else {
		echo "<p>Error connecting to db</p>";
	}
?>
