<h2 style="text-align:center:">Change Your Password</h2>
<form action ="" method="post">

<b>Enter Current Password:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="current_pass" required="required"><br><br>
<b>Enter New Password:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="new_pass"required="required"><br><br>
<b>Enter New Password Again:</b>&nbsp;&nbsp;<input type="password" name="new_pass_again" required="required"><br><br>
<input type ="submit" name="change_pass" value="Change Password">
</form>
<?php

include("includes/db.php");
if(isset($_POST['change_pass']))
{
	$user = $_SESSION['customer_email'];
	$current_pass  = $_POST['current_pass'];
	$new_pass = $_POST['new_pass'];
	$new_again = $_POST['new_pass_again'];
	$sel_pass = "select * from customers where customer_pass = '$current_pass' AND customer_email= '$user'";
	$run_pass = mysqli_query($con,$sel_pass);
	$check_pass = mysqli_num_rows($run_pass);
	
	if($check_pass==0)
	{
	echo "<script>alert('Your current password is wrong')</script>";
	exit();
	}
	if($new_pass!=$new_again)
	{
		echo "<script>alert('New password do not match')</script>";
	}	
	else
	{
	$update_pass = "update customers set customer_pass = '$new_pass' where customer_email='$user'";
	
	$run_update = mysqli_query($con,$update_pass);
	
	echo "<script>alert('Your password updated successfully')</script>";
	echo "<script>window.open('my_account.php','_self')</script>";
	}

}

?>