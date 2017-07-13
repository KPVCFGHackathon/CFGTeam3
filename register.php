<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Tutor Booking Platform</title>

<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="header">
	<h1>Registration Form<h1>
</div>

<?php
     if(isset($_POST['register'])){
		$username=mysqli_escape_string($db,$_POST['username']);
		$class=mysqli_escape_string($db,$_POST['class']);
		$address=mysqli_escape_string($db,$_POST['address']);
		$password=mysqli_escape_string($db,$_POST['password']);
	 
	 
	if(empty($username)){
	 array_push($errors,"username is required");
	 }
	 if(empty($class)){
	 array_push($errors,"class is required");
	 }
	 if(empty($address)){
	 array_push($errors,"address is required");
	 }
	 if(empty($password)){
	 array_push($errors,"password is required");
	 }
	
	 if(count($errors)==0){
	 $password=md5($password);
	 $sql="INSERT INTO student(sname,class,sloc,spassword)
	            VALUES ('$username','$class','address','$password')";
     mysqli_query($db,$sql);
	 $_SESSION['username']=$username;
	 $_SESSION['success']="you are now logged in";
	 header('location:studentindex.php');
}	
	 }
	 if(isset($_GET['logout'])){
		 session_destroy();
		 unset($_SESSION['username']);
		 header('location:register.php');
	 }
	 
	 
	 if(isset($_POST['tregister']))
{
	$username = mysqli_real_escape_string($db,$_POST['username']);
    $subject= mysqli_real_escape_string($db,$_POST['subject']);
    $qualification = mysqli_real_escape_string($db,$_POST['qualification']);
     $address = mysqli_real_escape_string($db,$_POST['address']);
	  $password = mysqli_real_escape_string($db,$_POST['password']);
	 
	 if(empty($username))
	 {
		 array_push($errors,"username is required");
	 }
	 if(empty($email))
	 {
		 array_push($errors,"email is required");
	 }
	 if(empty($subject))
	 {
		 array_push($errors,"subject is required");
	 }
	 if(empty($address))
	 {
		 array_push($errors,"address is required");
	 }
	 if(empty($password))
	 {
	 array_push($errors,"password is required");}
	 if(count($errors)==0){
		$password=md5($password); 
	 $sql="INSERT INTO tutor(tname,tsub,tqual,tloc,password) VALUES('$username','$subject','$qualification','$address','$password')";
	 mysqli_query($db,$sql);
	 $_SESSION['username']=$username;
	 $_SESSION['success']="you are now logged in";
	 header('location:tutor.php');
	
	 }
	
	 
}
	 ?>

<form action="register.php" method="post">
<div class = "select">
<h2 class="field_select">Select your field :</h2>
	<input type="radio" name="selection" value="Student"  onclick="student()"> <label>Student</label>
	<input type="radio" name="selection" value="Tutor"  onclick="tutor()"> <label >Tutor</label>
	<input type="radio" name="selection" value="Admin" onclick="admin()"> <label>Admin</label>
</div>	
</form>

<div id="s">
	<form method="post" action="register.php">
		<?php include('errors.php');?>
	    <div class="input-group">
		      <label>Username</label>
			  <input type="text" name="username">
			</div>  <div class="input-group">
		      <label>Class</label>
			  <input type="text" name="class">
			</div>    
			<div class="input-group">
		      <label>Address</label>
			  <select name="address">
			  <option>---Select City---</option>
				<option>Hyderabad</option>
				<option>Bangalore</option>
				<option>Chennai</option>
			  </select>
			</div>  
			<div class="input-group">
		      <label>Password</label>
			  <input type="password" name="password">
			</div> 
            <div class="input-group">
		       <button type="submit" name="register" class="btn">Register</button>  
			</div> 
 			<p>Already a member? <a href="login.php">Sign in</a></p>
	</form>	
</div>
<div id="t">
	<form method="post" action="register.php">
		<?php include('errors.php');?>
	    <div class="input-group">
		      <label>username</label>
			  <input type="text" name="username">
			</div>  
			<div class="input-group">
		      <label>subject</label>  
			  <select name="subject">
			  <option>---select subject--</option>
  <option value="dbms">DBMS</option>
  <option value="java">JAVA</option>
  <option value="co">CO</option>
  
</select>
			</div>    
			<div class="input-group">
		      <label>qualification</label>
			  <input type="text" name="qualification">
			</div> 
			
               <div class="input-group">
		      <label>address</label>  
			<select name="address">
			<option>---select adress---</option>
  <option value="Hyderabad">Hyderabad</option>
  <option value="Chennai">Chennai</option>
  <option value="Bangalore">Bangalore</option>
  
</select>
</div>
			<div class="input-group">
		      <label>password</label>
			  <input type="password" name="password">
			</div> 
            <div class="input-group">
		       <button type="submit" name="tregister" class="btn">Register</button>  
			</div> 
 			<p>
			 Already a member? <a href="login.php">sign in</a>
			</p>
</form>
</div>
<div id="a">
	admin
</div>

<script>
var stu = document.getElementById('s');
stu.style.display = 'none';
var tut = document.getElementById('t');
tut.style.display = 'none';
var adm = document.getElementById('a');
adm.style.display = 'none';

function student() {
    var stu = document.getElementById('s');
	tut.style.display = 'none';
	adm.style.display = 'none';
    if (stu.style.display === 'none') {
        stu.style.display = 'block';
    } else {
        stu.style.display = 'none';
    }
}
function tutor() {
    var tut = document.getElementById('t');
	stu.style.display = 'none';
	adm.style.display = 'none';
    if (tut.style.display === 'none') {
        tut.style.display = 'block';
    } else {
        tut.style.display = 'none';
    }
}
function admin() {
    var adm = document.getElementById('a');
	tut.style.display = 'none';
	stu.style.display = 'none';
    if (adm.style.display === 'none') {
        adm.style.display = 'block';
    } else {
        adm.style.display = 'none';
    }
}

</script>

</body>
</html>

