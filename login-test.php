<?php
  include "includes/db.inc.php";

  $myusername=$_POST['username'];
  $mypassword=$_POST['password'];

  $myusername = mysql_real_escape_string(stripslashes($myusername));
  $mypassword = mysql_real_escape_string(stripslashes($mypassword));

  $sql="SELECT * FROM users WHERE username ='$myusername' and password='$mypassword'";
  $result=mysql_query($sql);

  // Mysql_num_row is counting table row
  $count=mysql_num_rows($result);
  // If result matched $myusername and $mypassword, table row must be 1 row

  if($count==1) {
    session_register("myusername");
    session_register("mypassword");
    header("location:login.php");
  } else {
    echo "Wrong Username or Password";
  }
?>
