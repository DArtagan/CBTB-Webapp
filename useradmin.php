<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Compassion by the Book -- User Privelege Management</title>
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
	<div id="main" role="main">
    <form>
      <table>
        <tr>
          <th></th>
          <th>Username</th>
          <th>Role</th>
        </tr>
        <tr>
          <td><input type="checkbox" value="userAlpha"/></td>
          <td>Alpha</td>
          <td>Super Administrator</td>
        </tr>
        <tr>
          <td><input type="checkbox" value="userBeta"/></td>
          <td>Beta</td>
          <td>Chapter Administrator</td>
        </tr>
        <tr>
          <td><input type="checkbox" value="userGamma"/></td>
          <td>Gamma</td>
          <td>Project Administrator</td>
        </tr>
        <tr>
          <td><input type="checkbox" value="userDelta"/></td>
          <td>Delta</td>
          <td>User</td>
        </tr>
      </table>
      <label for="changeRole">Change the selected user(s) role to:</label><select name="changeRole" id="changeRole">
      	<option value="superAdmin">Super Administrator</option>
        <option value="chapterAdmin">Chapter Administrator</option>
        <option value="projectAdmin">Project Administrator</option>
        <option value="user">User</option>
      </select>
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