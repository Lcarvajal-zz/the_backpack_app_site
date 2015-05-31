<?php // signup.php
include 'accesscontrol.php';

?>

<!DOCTYPE>
<head>
	<title>Backpack - Home</title>
	<link rel="stylesheet" href="stylesheet.css"/>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head> 
	</script>
</head>
<html>
<body>

<header>

<a href="" >
<img id="logo" src="img/backpack_logo.png" alt="logo" />
</a>

<form id="returning_user" action="logout.php" method="post" enctype="text/plain">

	<input id="login_button" type="submit" value="Log Out" />

</form>

</header>

<div id="slides">

<div class="slide" id="s1">

	<div id="s1_home">
		<p>Hey <?=$username?>,</p>
		<p>The Backpack App is still under construction. <br>We will have iPhone and Android applications up and running in no time. Until then, sit back and enjoy your summer break!</p>
	</div>

</div>

</div>


</body>
</html>
