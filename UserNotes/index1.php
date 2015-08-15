<?php
session_start();
if(isset($_SESSION['user']))
	$user = $_SESSION['user'];
else
	$user = false;
?><!DOCTYPE html>
<html lang='en'>
	<head>
		<title>User Access</title>
		<style type='text/css'>
		.container {
			margin: 50px auto;
			padding: 30px;
			background: #FFF;
			border: 1px solid #AAA;
			box-shadow: 3px 3px 3px #999;
			width: 800px;
			font-family: "Open Sans", sans-serif;
		}

		body {
			background: #EEE;
		}
		</style>
	</head>
	<body>
		<div class='container'>

			<?php if($user === false) { ?>
			<div style='width: 339px; float: right;'>
				<h1>Existing User: Log in</h1>

				<form action='login.php' method='post'>
					<p><input type='text' placeholder='Username' name='username'></p>
					<p><input type='password' placeholder='Password' name='passwd'></p>
					<p><input type='submit' value='Log In'></p>
				</form>
			</div>

			<div style='width: 339px;'>
				<h1>New User: Sign Up</h1>
				<form action='signup.php' method='post'>
					<p><input type='text' placeholder='Username' name='username'></p>
					<p><input type='email' placeholder='Email' name='email'></p>
					<p><input type='password' placeholder='Password' name='passwd'></p>
					<p><input type='password' placeholder='Confirm Password' name='confirmPasswd'></p>
					<p><input type='submit' value='Sign Up'></p>
				</form>
			</div>

			<?php } else { ?>
			<h1>Welcome Back!</h1>
			<p>You are now logged in as <?php echo $user['username']; ?> [<a href='logout.php'>Log out</a>]</p>
			<?php } ?>
		</div>
	</body>
</html>
