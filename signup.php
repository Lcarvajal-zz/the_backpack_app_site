<?php // signup.php
include 'common.php';
include 'db.php';

if (!isset($_POST['submitok'])):
// Display the user signup form
?>

<!DOCTYPE>
<head>
	<title>Backpack - Home</title>
	<link rel="stylesheet" href="stylesheet.css"/>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script> 
		$(document).ready(function(){
    			$("#expand_nav").click(function(){
        			$("#header_links").slideToggle("slow");
    			});
		});
	</script>
	<script>
		function expand() {
	 		var image = document.getElementById('expand_nav');
			if (image.src.match("expanded")) {
				image.src = "img/expand_nav.png";
    			} else {
				image.src = "img/expanded_nav.png";
			}
		}
	</script>

</head> 
<html>
<body>

<header>

<img id="expand_nav" src="img/expand_nav.png" alt="logo" onclick="expand()"/>

<a href="">
<img id="logo" src="img/backpack_logo.png" alt="logo" />
</a>

<form id="returning_user" action="index.php" method="post" enctype="text/plain"
	onsubmit="return validateUser()">
	<input id="login_button" type="submit" value="Login" />

</form>

<div id="header_links" style="display:none">
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

</header>

<div id="slides">

<div class="slide" id="s1">

	<div id="s1_cover">
	</div>

	<div id="s1_content">
		<h2>&ldquo;Connecting teachers with parents first through fifth grade.&rdquo;</h2>
	</div>

	<div id="download">
		<image src="img/AppStoreButton.png" alt="ios download" />
		<image src="img/PlayStoreButton.png" alt="android download" style="margin-left: 20px;" />
	</div>

</div>

<div class="slide" id="s2">

	<img src="img/sj.png" alt="mini steve jobs" />

	<div id="s2_content">
		<p style="font-style:italic; font-weight:bold; text-align: center;">&ldquo;Unlock your child's potential.&rdquo;</p>
		<p>&#09;The Backpack App allows teachers to flag students who are having difficulties in a particular subject area, empowering parents to take quick action on improving their child's education.</p>
	</div>

</div>

<div class="slide" id="s3">
	<img src="img/student_iphone_app.png" alt="student's iphone"/>

	<div id="s3_content">
	<p style="font-style:italic; font-weight:bold; text-align: center;">&ldquo;Be Proactive&rdquo;</p>
	<p>Teachers can announce important exams and assignments to ensure kids are on track to performing well in school.</p>
		<p>Schools have the option of sending important notifications, making sure you are up-to-date with information like preparing for the FCAT.</p>
	</div>

</div>

<div class="slide" id="s4">
	<img src="img/teacher_iphone_app.png" alt="teacher's iphone" />

	<div id="s4_content">
		<p style="font-style:italic; font-weight:bold; text-align: center;">&ldquo;The Backpack App is teacher friendly.&rdquo;</p>
		<p>Getting through to a classroom of parents is difficult, so backpack makes it easy for teachers to communicate effectively with those who need special attention.</p>
	</div>
</div>

<div class="slide" id="s5">

	

<form name="new_user" id="new_user" method="post" action="<?=$_SERVER['PHP_SELF']?>">

	<div id="form_cover">
	</div>

	<span id="h_sign">Sign Up</span><br>
	<div id="sh_sign">It's free!</div><br>

	<input class="tb" id="firstname" type="text" name="firstname" 
		autocomplete="on" value="First name" 
		onclick="this.select();" maxlength="25" >
	<input class="tb" id="lastname" 
		type="text" name="lastname" 
		autocomplete="on" value="Last name" 
		onclick="this.select();" maxlength="35" >
	<br> 
	<input class="tb tb2" id="new_email" 
		type="text" name="new_email" 
		autocomplete="on" value="Your email" 
		onclick="this.select();" maxlength="254" >
	<br> 
	<input class="tb tb2" id="re_email" 
		type="text" name="re_email" 
		autocomplete="on" value="Re-enter email" 
		onclick="this.select();" maxlength="254" >
	<br> 
	<input class="tb tb2" id="new_password" type="text" name="new_password" 
		autocomplete="off" value="New password" 
		onclick="this.select();" maxlength="15" >
	<br>
	<input id="sign_up" name="submitok" type="submit"  value="Sign Up" />

	<span id="new_user_error"></span>

</form>
	
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


</div>

</body>
</html>

<?php
	
else:
	// Process signup submission
	dbConnect('The_Backpack_App');

	if ($_POST['firstname']=='' or $_POST['lastname']==''
		or $_POST['new_email']=='' or $_POST['new_password']==''
		or $_POST['firstname']=='First name' 
		or $_POST['lastname']=='Last name'
		or $_POST['new_email']=='Your email' 
		or $_POST['new_password']=='New password') 
	{
		error('One or more required fields were left blank.\n'.
		'Please fill them in and try again.');
	}

	// incorrect email entered
	if ($_POST['new_email']!=$_POST['re_email'])	{

		error('Emails do not match\n'.
		'Please ensure the email you entered is correct');
	}

	// invalid email entered
	if ( strpos($_POST['new_email'], '@') === false )
	{
		error('Invalid email entered\n'.
		'Please ensure the email you entered is correct');
	}

	// Check for existing user with the new id
	$sql = "SELECT COUNT(*) FROM users WHERE email = '$_POST[new_email]'";
	$result = mysql_query($sql);
	if (!$result) {
	error('A database error occurred in processing your '.
	'submission.\nIf this error persists, please '.
	'contact lukascarvajal@gmail.com.');
	}
	if (@mysql_result($result,0,0)>0) {
	error('An account is already associated with that email address');
	}

	 $sql = "INSERT INTO users SET
	first_name = '$_POST[firstname]',
	last_name = '$_POST[lastname]',
	email = '$_POST[new_email]',
	password = '$_POST[new_password]'";

	if (!mysql_query($sql))
	error('A database error occurred in processing your '.
	'submission.\nIf this error persists, please '.
	'contact lukascarvajal@gmail.com.');

?>

<!DOCTYPE>
<head>
	<title>Backpack - Check Email</title>
	<link rel="stylesheet" href="basic_school_style.css"/>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

</head> 

<html>
<body>

<div id="new_user">
	<div id="new_user_paper">
		<a href="index.html"><img id="new_user_logo" src="img/backpack.png" alt="logo" /></a>

		<p style="font-weight: bold;">Check your email!</p>
		<p>We've sent you a confirmation email to create your account so that you can start receiving class announcements right away!</p>
		<p style="font-size: 20px;">- The Backpack App Team</p>
	</div>
</div>

</body>
</html>

<?php
endif;
?>

