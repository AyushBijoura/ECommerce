<html>
<body>

<?php
					include("includes/db.php");
			
					$user = $_SESSION['customer_email'];
					
					$get_customer = "select * from customers where customer_email = '$user'";
					
					$run_customer = mysqli_query($con,$get_customer);
					
					$row_customer = mysqli_fetch_array($run_customer);
					$c_id = $row_customer['customer_id'];
					$name = $row_customer['customer_name'];
					$email = $row_customer['customer_email'];
					$pass = $row_customer['customer_pass'];
					$country = $row_customer['customer_country'];
					$city = $row_customer['customer_city'];
					$image = $row_customer['customer_image'];
					$contact = $row_customer['customer_contact'];
					$address = $row_customer['customer_address'];
			
?>

			<form action="" method="post" enctype="multipart/form-data">
			<table align="center" width="700">
			
			<tr align="center">
				<td colspan="6"><h2>Update your account</h2></td>
			</tr>
			
			<tr>
			 
			 <td align="left">Customer Name</td>
			 <td><input type="text" name="c_name" value="<?php echo $name; ?>"/></td>
			 
			</tr>
			
			<tr>
			 
			 <td align="left">Customer Email</td>
			 <td><input type="text" name="c_email" value="<?php echo $email; ?>"/></td>
			 
			</tr>
			
			<tr>
			 
			 <td align="left">Customer Password</td>
			 <td><input type="password" name="c_pass" value="<?php echo $pass; ?>"/></td>
			 
			</tr>
		    <tr>
			 
			 <td align="left">Customer Image</td>
			 <td><input type="file" name="c_image"/><img src="customer_images/<?php echo $image?>"width ="50" height="50" /></td>
			 
			</tr>
	
			<tr>
			 
			 <td align="left">Customer Country</td>
			 <td>
			 <select name="c_country" disabled>
			 <option><?php echo $country ?></option>
			 <option>Afghanistan</option>
			 <option>India</option>
			 <option>Japan</option>
			 <option>Pakistan</option>
			 <option>Unites States</option>
			 <option>United Kingdom</option>
			 </select>
			 </td>
			 
			</tr>
	
			<tr>
			 
			 <td align="left">Customer city</td>
			 <td><input type="text" name="c_city" value="<?php echo $city; ?>"/></td>
			 
			</tr>
			<tr>
			 
			 <td align="left">Customer Contact</td>
			 <td><input type="text" name="c_contact" value="<?php echo $contact; ?>"/></td>
			 
			</tr>
			<tr>
			 
			 <td align="left">Customer Address</td>
			 <td><textarea cols="20" rows="10" name="c_address" id ="text-area"/><?php echo $address; ?></textarea></td>
			 
			</tr>
			<tr align="center">
			<td colspan="6"><input type="submit" name="register" value="Update Account">
			</tr>
		
			</table>
			
			</form>
			
		
			

</body>
</html>
<?php
if(isset($_POST['register']))
{
	
	$ip = getIp();
	$customer_id = $c_id;
	$c_name = $_POST['c_name'];
	$c_email = $_POST['c_email'];
	$c_pass = $_POST['c_pass'];
	$c_image = $_FILES['c_image']['name'];
	$c_image_tmp = $_FILES['c_image']['tmp_name'];
//	$c_country = $_POST['c_country'];
	$c_city = $_POST['c_city'];
	$c_contact = $_POST['c_contact'];
	$c_address = $_POST['c_address'];
	
	move_uploaded_file($c_image_tmp,"customer_images/$c_image");
	
    $update_c ="update customers set customer_name = '$c_name',customer_email = '$c_email',customer_pass = '$c_pass',customer_city = '$c_city',customer_contact = '$c_contact',customer_address = '$c_address',customer_image = '$c_image' where customer_id = $customer_id";
	
	$run_update = mysqli_query($con,$update_c);
	
	if($run_update)
	{
		echo "<script>alert('Your account successfully updated')</script>";
        echo "<script>window.open('my_account.php',_'self')</script>";

		}
	
	
	
}	



?>