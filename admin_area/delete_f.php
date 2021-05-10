<?php
include("includes/db.php");

if(isset($_GET['delete_f']))
{
	$delete_id = $_GET['delete_f'];
	
	$delete_c= "delete from feedback where id='$delete_id'";
	
	$run_delete = mysqli_query($con,$delete_c);
	
		if($run_delete)
		{
			echo "<script>alert('A customer feedback has been deleted')</script>";
			echo "<script>window.open('view_feedback.php','_self')</script>";
		}
}


?>