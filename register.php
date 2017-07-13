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

<form action="register.php" method="post">
<div class = "select">
<h2 class="field_select">Select your field :</h2>
	<input type="radio" name="selection" value="Student"  onclick="student()"> <label>Student</label>
	<input type="radio" name="selection" value="Tutor"  onclick="tutor()"> <label >Tutor</label>
	<input type="radio" name="selection" value="Admin" onclick="admin()"> <label>Admin</label>
</div>	
</form>

<div id="s">
	student
</div>
<div id="t">
	tutor
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

