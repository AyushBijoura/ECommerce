
<!DOCTYPE HTML>
<?php
session_start();

include("functions/functions.php");
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
				<li><a href="../index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="customers/my_account.php">My Account</a></li>
				<li><a href="#">Sign Up</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
				<li><a href="#">Contact Us</a></li>
	
			</ul>
				<div id="form">
					<form method="get" action="../results.php" enctype="multipart/formdata">
						<input type="text" name="user_query" placeholder="Search a product"/>
						<input type="submit" name="search" value="Search" />
					</form>
				</div>
		
		</div><!--menubar ends here-->
		
		<div class="content_wrapper">
			<div id="sidebar">
				<div id="sidebar_title">My Account</div>
					<ul id="cats">
					<?php
					$user = $_SESSION['customer_email'];
					
					$get_img = "select * from customers where customer_email = '$user'";
					
					$run_img = mysqli_query($con,$get_img);
					
					$row_img = mysqli_fetch_array($run_img);
					
					$c_image = $row_img['customer_image'];
					/*for user profile pic*/
					echo "<p style ='text-align:center; border='2px s' '><img src ='customer_images/$c_image' width='150' height='150'/></p>";
					?>
					<li><a href="my_account.php?my_orders">My Orders</li></a>
					<li><a href="my_account.php?edit_account">Edit Account</li></a>
					<li><a href="my_account.php?change_pass">Change Password</li></a>
					<li><a href="my_account.php?delete_account">Delete Account</li></a>
					
					</ul>
					</div>
			<div id="content_area">
			<?php cart(); ?>
				<div id="shopping_cart">
						<span style="float:right; font-size:18px;padding:5px;line-height:40px;">
						<?php
							if(isset($_SESSION['customer_email']))
							{
								echo "<b>Welcome:</b>".$_SESSION['customer_email'];
							}
							
						?>
						
						<?php
						if(!isset($_SESSION['customer_email']))
						{
							echo "<a href='checkout.php' style='text-decoration:none;color:orange;'>Login</a>";
						}
						else
						{
							echo"<a href='logout.php' style='text-decoration:none;color:orange;'>Logout</a>";
						}
						
						?>
						
						</span>
				
				</div>
			<div id = "products_box">
			
			<?php
			if(!isset($_GET['my_orders']))
			{
					if(!isset($_GET['edit_account']))
					{
						if(!isset($_GET['change_pass']))
						{
							if(!isset($_GET['delete_account']))
							{
			
			
			echo "<b>You can see your orders progress by<a href='my_account?my_orders'>Clicking Here</a></b>";
			}}}}
			?>
			<?php
			if(isset($_GET['edit_account']))
			{
			include("edit_account.php");
			}
			if(isset($_GET['change_pass']))
			{
			include("change_pass.php");
			}
			if(isset($_GET['delete_account']))
			{
			include("delete_account.php");
			}
			if(isset($_GET['myorders']))
			{
			include("my_orders.php");
			}
			?>
			
			
			
			</div><!--product box ends here-->
			
			
			</div><!--content area ends here-->
			
			<div id="footer">
<h2 style="text-align:center;padding-top:30px;">&copy; 2016 Online shop</h2>
		
			</div>	
	
		 </div><!--content wrapper ends here-->

		 </div><!--main wrapper ends here-->


</body>
</html>