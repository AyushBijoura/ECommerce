<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="styles/login.css" media="all"/>
</head>
<body>
<div class="login">
	<h1>Admin Login</h1>
    <form method="post" action="login.php">
    	<input type="email" name="email" placeholder="Email" required="required" />
        <input type="password" name="p" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Log In</button>
    </form>
</div>
</body>
</html>
<?php
include("includes/db.php");
if(isset($_POST['login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$pass = mysql_real_escape_string($_POST['p']);
	
	$sel_user = "select * from admins where user_email='$email' AND user_pass ='$pass'";
	$run_user = mysqli_query($con,$sel_user);
	$check_user=mysqli_num_rows($run_user);
	if($check_user==0)
	{
		echo"<script>alert('password or email wrong! try again')</script>";
	}
	else
	{
		$_SESSION['user_email']=$email;
		
		echo "<script>window.open('index.php?logged_in=You have successfully logged in','_self')</script>";
		
	}
	
}


?>