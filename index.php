<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Compassion by the Book</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="stylesheet" href="css/style.css">

	<script src="js/libs/modernizr-2.0.6.min.js"></script>
</head>
<body>

<div id="container">
	<header>

	</header>
	<nav>
		<ul>
			<li><a href="register.php">Registration</a></li>
			<li><a href="dashboard.php">User Dashboard</a></li>
			<li><a href="useradmin.php">User Priveleges Management</a></li>
			<li><a href="addbook.php">Add Books</a></li>
			<li><a href="adddonor.php">Add Donors</a></li>
			<li><a href="adddonation.php">Add Donation</a></li>
			<li><a href="books.php">Book Inventory</a></li>
		</ul>
	</nav>
	<div id="main" role="main">
		<form action="login.php" method="post">
			<p><label for="username">username: </label><input type="text" id='username' name='username' /></p>
			<p><label for="pasword">password: </label><input type="password" id='password' name='password' /></p>
			<p><input type="submit"/></p>
		</form>
	</div>
	<footer>

	</footer>
</div> <!--! end of #container -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>

<!-- scripts concatenated and minified via ant build script-->
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
<!-- end scripts-->


<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
	<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->

</body>
</html>