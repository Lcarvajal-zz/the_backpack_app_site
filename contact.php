<!DOCTYPE>
<head>
	<title>Backpack - About Us</title>
	<link rel="stylesheet" href="stylesheet.css"/>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head> 
	<script SRC="js/form_check.js">
	</script>
</head>
<html>
<body>

<header>

<a href="signup.php" >
<img id="logo" src="img/backpack_logo.png" alt="logo" />
</a>

<form id="returning_user" action="index.php" method="post" enctype="text/plain"
	onsubmit="return validateUser()">
	<input id="login_button" type="submit" value="Login" />

</form>

</header>

<div class="info_slides" style="height:150%;">
	<div id="about_content">
		<h1>Contact Us</h1>
		<p>Email: Lukas@thebackpackapp.com</p>
		<p>Telephone: (305) 689 - 2244</p>
		

	</div>

	<div id="center_links">
	<div id="links">
		<ul>
			<li>
			<a href="school_signup.php">schools</a>
			</li>
			<li>
			<a href="careers.html">careers</a>
			</li>
			<li>
			<a href="about.html">about us</a>
			</li>
			<li>
			<a href="contact.php">contact us</a>
			</li>
		</ul>
	</div>
	</div>

</div>

</body>
</html>
