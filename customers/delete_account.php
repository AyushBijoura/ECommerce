
<h2 style="text-align:center;">Delete your account?</h2>
<br><br>

<form action ="" method="post">
<input type="submit" name="yes" value="Delete my account">
<input type="submit" name="no" value="No">
</form>


<?php
includE("includes/db.php");

$user = $_SESSION['customer_email'];

if(isset($_POST['yes']))
{
	$delete_customer = "delete from customers where customer_email='$user'";
	
	$run_customer = mysqli_query($con,$delete_customer);
	
	echo "<script>alert('Your account has been deleted')</script>";
	
	echo  "<script>window.open('../index.php','_self')</script>";

}
if(isset($_POST['no']))
{
    echo "<script>alert('Your account not deleted')</script>";
	
	echo  "<script>window.open('my_account.php','_self')</script>";

}
?>