<!DOCTYPE HTML>
<?php
session_start();
include("functions/functions.php");
include("includes/db.php");
?>
<html>
<head>
<title>My Online Shop</title>
<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
<body>

<div class="main_wrapper">

		<div class="header_wrapper">	
		<!--<img src="images/logonew.jpg" height="150" width="150"/>-->
		<img src="images/logo3.png" height = "150"width="1000"/>
			
		</div><!--header wrapper ends here-->
	    <div class="menubar">
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="customer/my_account.php">My Account</a></li>
				<li><a href="customer_register.php">Sign Up</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
				<li><a href="#">Contact Us</a></li>
	
			</ul>
				<div id="form">
					<form method="get" action="results.php" enctype="multipart/formdata">
						<input type="text" name="user_query" placeholder="Search a product"/>
						<input type="submit" name="search" value="Search" />
					</form>
				</div>
		
		</div><!--menubar ends here-->
		
		<div class="content_wrapper">
			<div id="sidebar">
				<div id="sidebar_title">Categories</div>
					<ul id="cats">
					<?php getCats(); ?>
					</ul>
				<div id="sidebar_title">Brands</div>
					<ul id="cats">
					<?php getBrands(); ?>
	               	</ul>
	
			</div><!--sidenar ends here-->
			<div id="content_area">
			<?php cart(); ?>
				<div id="shopping_cart">
						<span style="float:right; font-size:18px;padding:5px;line-height:40px;">
						
						Welcome Guest!<b style="color:yellow">Shopping Cart-</b>Total Items:<?php total_items(); ?> Total Price:<?php total_price(); ?><a href="cart.php" style="color:yellow;">Go to cart</a>
						
						
						
						</span>
				
				</div>
			<form action="contact.php" method="post" enctype="multipart/form-data">
			<table align="center" width="750">
			
			<tr align="center">
				<td colspan="6"><h2>Feedback</h2></td>
			</tr>
			
			<tr>
			 
			 <td align="right">Name</td>
			 <td><input type="text" name="c_name"required="required"/></td>
			 
			</tr>
			
			<tr>
			 
			 <td align="right">Email</td>
			 <td><input type="email" name="c_email" required="required"/></td>
			 
			</tr>
			
			<tr>
			 
			 <td align="right">Message</td>
			 <td><textarea name="c_msg" cols="30" rows="10" required="required"></textarea> </td>
			 
			</tr>
		    
			<tr style="padding-left:100px;">
			<td colspan="6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="submit" name="send_msg" value="Send">&nbsp;&nbsp;<input type="reset" value="Clear">
			</tr>
		
			</table>
			
			</form>
			
			</div><!--content area ends here-->
			
			<div id="footer">
<h2 style="text-align:center;padding-top:30px;">&copy; 2016 Online shop</h2>
		
			</div>	
	
		 </div><!--content wrapper ends here-->

		 </div><!--main wrapper ends here-->


</body>
</html>
<?php
if(isset($_POST['send_msg']))
{
	
//	$ip = getIp();
	$c_name = $_POST['c_name'];
	$c_email = $_POST['c_email'];
	$c_msg = $_POST['c_msg'];
	/*$c_pass = $_POST['c_pass'];
	$c_image = $_FILES['c_image']['name'];
	$c_image_tmp = $_FILES['c_image']['tmp_name'];
	$c_country = $_POST['c_country'];
	$c_city = $_POST['c_city'];
	$c_contact = $_POST['c_contact'];
	$c_address = $_POST['c_address'];*/
	
	//move_uploaded_file($c_image_tmp,"customers/customer_images/$c_image");
	
    $insert_c ="insert into feedback (name,email,message) values ('$c_name','$c_email','$c_msg')";
	
	$run_c = mysqli_query($con,$insert_c);
	
	
	if($run_c)
	{
		echo "<script>alert('Thanks for your feedback')</script>";
	}
	else
	{
			echo "<script>alert('Feedback not submitted')</script>";
	}
	
	
	
	
	
	
}	



?>