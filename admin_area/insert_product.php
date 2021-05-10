<!DOCTYPE HTML>
<?php
include("includes/db.php");

?>
<html>
<head>
<title>Inserting product</title>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['user_email']))
{
	echo"<script>window.open('login.php?not_admin=Invalid login','_self')</script>";
}
else{
?>
<!doctype>

<html>
	<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" href="styles/style.css" media="all"/>
	</head>
	
	
	<body>
	
	<div class="main_wrapper">
	
	<div id="header"></div>
	<div id="right">
	<p id="h"><b>Manage Content<b></p>
	<a href="index.php">Home</a>
	<a href="insert_product.php">Insert New Product</a>
	<a href="index.php?view_products">View Products</a>
	<a href="index.php?insert_cats">Insert New Categories</a>
	<a href="index.php?view_cats">View All Categories</a>
	<a href="index.php?insert_brand">Insert New Brands</a>
	<a href="index.php?view_brands">View All Brands</a>
	<a href="index.php?view_customers">View Customers</a>
	<a href="index.php?view_orders">View Orders</a>
	<a href="index.php?view_payments">View Payments</a>
	<a href="logout.php">Admin Logout</a>
	
	
	</div>
<form action="insert_product.php" method="post" enctype="multipart/form-data">

<table align="center" width="795" height="500" border="2" bgcolor="#187eae">
<tr>
<td colspan="8" align="center"><h2>Insert New Posts here</h2></td>
</tr>
<tr>
<td align="center">Product title</td>
<td><input type="text" name="product_title"/></td>
</tr>

<tr>
<td align="center">Product category</td>
<td>
	<select name="product_cat"> 
		<option>Select A Category</option>
		<?php
		 $get_cats = "select * from categories";
		 $run_cats = mysqli_query($con,$get_cats);
		 while($row_cats=mysqli_fetch_array($run_cats))
			{
		       $cat_id = $row_cats['cat_id'];
		       $cat_title = $row_cats['cat_title'];
		       echo  "<option value='$cat_id'>$cat_title</option>";
		
	        } 
		
		?>
	
	</select>

</td>
</tr>
<tr>
<td align="center">Product brand</td>
<td>
<select name="product_brand"> 
		<option>Select A Brand</option>
		<?php
$get_brands = "select * from brands";
	$run_brands = mysqli_query($con,$get_brands);
	while($row_brand=mysqli_fetch_array($run_brands))
	{
		$brand_id = $row_brand['brand_id'];
		$brand_title = $row_brand['brand_title'];
		echo  "<option value='$brand_id'>$brand_title</option>";
		
	}		
		?>
	
	</select>
</td>
</tr>

<tr>
<td align="center">Product price</td>
<td><input type="text" name="product_price"/></td>
</tr>

<tr>
<td align="center">Product image</td>
<td><input type="file" name="product_image"/></td>
</tr>

<tr>
<td align="center">Product description</td>
<td><textarea name="product_desc" cols="20" rows="10"></textarea></td>
</tr>

<tr>
<td align="center">Product keywords</td>
<td><input type="text" name="product_keywords"/></td>
</tr>


<tr align="center">
<td colspan="8"><input type="submit" name="insert_post" value="Insert Now"/></td>
</tr>

</table>

</form>
</body>
</html>
<?php

if (isset($_POST['insert_post']))	
	{
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
		$product_brand = $_POST['product_brand'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$product_keywords = $_POST['product_keywords'];
		//getting the image from he fields
		$product_image= $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		move_uploaded_file($product_image_tmp,"product_images/$product_image");


		$insert_products = "insert into products(product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";

		$insert_pro = mysqli_query($con,$insert_products);
		if($insert_pro)
		{
			echo "<script>alert('Product has been inserted');</script>";
			echo "<script>window.open('index.php?insert_product','_self')</script>";
		}
		
		
		
	}	



?>
<?php } ?>