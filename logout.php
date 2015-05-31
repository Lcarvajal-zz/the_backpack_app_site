<?php // signup.php

	// log out user
	session_start();
	$_SESSION = array();
	session_destroy();
?>

<!DOCTYPE>
<head>
	<title>Backpack</title>
	<meta http-equiv="refresh" content="0; URL='signup.php'" />
</head> 
