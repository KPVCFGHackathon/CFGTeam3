<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Tutor Booking Platform</title>
<link rel="stylesheet" type="text/css" href="styling.css">
</head>
<body>

<div class="header">
	<h1>LogIn Form<h1>
</div>

<?php
if (isset($_POST['login'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$passwd = mysqli_real_escape_string($db, $_POST['password']);	
	if(empty($username)) {
		array_push($errors, "Please enter your Username");
	}
	if(empty($passwd)) {
		array_push($errors, "Please enter your Password");
	}
	if(count($errors) == 0) {
		$password = md5($passwd);
		$query = "SELECT * FROM student WHERE uname='$username' AND pwd='$password'";
		$result = mysqli_query($db,$query);
		if(mysqli_num_rows($result) == 1) {
			$_SESSION['username'] = $username;
			header('location: posts.php');
		} else {
			array_push($errors, $password);
		}
	}
}
if(isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: register.php');
	}
?>

<form action="login.php" method="post">
	<?php include('errors.php'); ?>
    <div class="inputs">
		<label>UserName:</label>
		<input type="text" name="username" value="<?php echo $username; ?>"/>
	</div>
    <div class="inputs">
		<label>Password:</label>
		<input type="password" name="password"/>
	</div>
	<div class="inputs">
	  <button type="submit" name="login" class="btn">Log In</button>
    </div>
	<div class="inputs">
	<p style="color:red;">Not registered? <a href="register.php">Sign Up</a></p>
	</div>
</form>

</body>
</html>

