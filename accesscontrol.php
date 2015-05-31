<?php // accesscontrol.php
	include_once 'common.php';
	include_once 'db.php';

	session_start();

	error_reporting( error_reporting() & ~E_NOTICE );
	$uid = isset($_POST['uid']) ? $_POST['uid'] : $_SESSION['uid'];
	$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : $_SESSION['pwd'];

	// user is not logged in 
	if(!isset($uid)) {
?>

<!DOCTYPE>
<head>
	<title>Backpack - Check Email</title>
	<link rel="stylesheet" href="basic_school_style.css"/>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link href='http://fonts.googleapis.com/css?family=Roboto'
		rel='stylesheet' type='text/css'>

</head> 

<html>
<body>

<div id="new_user">
	<div id="new_user_paper">
		<a href="signup.php"><img id="new_user_logo" src="img/backpack.png" alt="logo" /></a>

		<p style="font-weight: bold;">The Backpack App</p>

		<form id="returning_user" action="<?=$_SERVER['PHP_SELF']?>" method="post">
		<input class="tb" id="username" type="text" name="uid" 
		autocomplete="on" value="Email" 
		onclick="this.select();" maxlength="254" >
		<br>
		<input class="tb" id="password" type="password" name="pwd" 
		autocomplete="on" value="password" 
		onclick="this.select();" maxlength="15" >
		<br>
		<input id="login_button" type="submit" value="Login" />
		<a href="signup.php" style="color:#FF9900;font-size:20px; margin-left:40px;">New user?</a>

</form>
	</div>
</div>

</body>
</html>

<?php
	exit;
}

	$_SESSION['uid'] = $uid;
	$_SESSION['pwd'] = $pwd;

	dbConnect("The_Backpack_App");
	$sql = "SELECT * FROM users WHERE
	email = '$uid' AND password = '$pwd'";
	$result = mysql_query($sql);
	if (!$result) {
		error('A database error occurred while checking your '.
		'login details.\nIfhis error persists, please '.
		'contact lukascarvajal@gmail.com.');
	}

	if (mysql_num_rows($result) == 0) {
		unset($_SESSION['uid']);
		unset($_SESSION['pwd']);
?>

 <!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title> Access Denied </title>
    <meta http-equiv="Content-Type"
      content="text/html; charset=iso-8859-1" />
  </head>
  <body>
  <h1> Access Denied </h1>
  <p>Your user ID or password is incorrect, or you are not a
     registered user on this site. To try logging in again, click
     <a href="<?=$_SERVER['PHP_SELF']?>">here</a>. To register for instant
     access, click <a href="signup.php">here</a>.</p>
  </body>
  </html>

<?php
	exit;
}

$username = mysql_result($result,0,'first_name');
?>
	
