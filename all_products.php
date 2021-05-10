<!DOCTYPE HTML>
<?php
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
				<li><a href="customer/my_account.php">My Account</a></li>
				<li><a href="#">Sign Up</a></li>
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
				<div id="shopping_cart">
						<span style="float:right; font-size:18px;padding:5px;line-height:40px;">
						
						Welcome Guest!<b style="color:yellow">Shopping Cart-</b>Total Items: Total Price:<a href="cart.php" style="color:yellow;">Go to cart</a>
						
						
						
						</span>
				
				</div>
			<div id = "products_box">
<?php
	$get_pro = "select * from products order by product_id DESC";
	$run_pro = mysqli_query($con,$get_pro);
	while($row_pro=mysqli_fetch_array($run_pro))
	{
		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		$pro_brand = $row_pro['product_brand'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
		
		echo "
				<div id='single_product'>
					<h3>$pro_title</h3>
					<img src ='admin_area/product_images/$pro_image' width='180' height='180'/>
					<p><b>M.R.P. Rs . $pro_price</p></b>
					<a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
					<a href = 'index.php?pro_id=$pro_id'><button style='float:right'>Add to cart</button></a>
				</div>
			";
	
	}
			
			
			
			
			
			
			?>
			
			
			
			
			
			</div>
			
			
			</div><!--content area ends here-->
			
			<div id="footer">
<h2 style="text-align:center;padding-top:30px;">&copy; 2016 Online shop</h2>
		
			</div>	
	
		 </div><!--content wrapper ends here-->

		 </div><!--main wrapper ends here-->


</body>
</html>              