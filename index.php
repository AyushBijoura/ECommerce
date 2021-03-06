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
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="customers/my_account.php">My Account</a></li>
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
						<?php
							if(isset($_SESSION['customer_email']))
							{
								echo "<b>Welcome:</b>".$_SESSION['customer_email']."<b style ='color:yellow;'>Your</b>";
							}
							else
							{
								echo "<b>Welcome Guest</b>";
							}
						?>
						<b style="color:yellow">Shopping Cart-</b>Total Items:<?php total_items(); ?> Total Price:<?php total_price(); ?><a href="cart.php" style="color:yellow;">Go to cart</a>
						
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
			<?php getPro(); ?>
			<?php getCatPro(); ?>
			<?php getBrandPro(); ?>
			</div>
			
			
			</div><!--content area ends here-->
			
			<div id="footer">
<h2 style="text-align:center;padding-top:30px;">&copy; 2016 Online shop</h2>
		
			</div>	
	
		 </div><!--content wrapper ends here-->

		 </div><!--main wrapper ends here-->


</body>
</html>