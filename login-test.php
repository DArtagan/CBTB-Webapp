<?php
  include "includes/db.inc.php";

  $myusername=$_POST['username'];
  $mypassword=$_POST['password'];

  $myusername = mysql_real_escape_string(stripslashes($myusername));
  $mypassword = mysql_real_escape_string(stripslashes($mypassword));

    if ($dbh = open_db() ) {
			try { 
				$sth = $dbh->prepare("SELECT (username, password) FROM users WHERE username ='$myusername' and password='$mypassword'");
			
				$sth->setFetchMode(PDO::FETCH_OBJ);
				
				if($row = $sth->fetch()) {
  				session_register("myusername");
          session_register("mypassword");
          header("location:login.php");
  		  } else {
  		    echo "Wrong username or password";
  		  }
			} catch (PDOException $e) {
				echo 'Connection failed: ' . $e->getMessage();
			}
		} else {
			echo "<p>Error connecting to db</p>";
		}
?>
