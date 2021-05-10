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
	<a href="view_products.php">View Products</a>
	<a href="index.php?insert_cats">Insert New Categories</a>
	<a href="index.php?view_cats">View All Categories</a>
	<a href="index.php?insert_brand">Insert New Brands</a>
	<a href="index.php?view_brands">View All Brands</a>
	<a href="index.php?view_customers">View Customers</a>
	<a href="index.php?view_orders">View Orders</a>
	<a href="index.php?view_payments">View Payments</a>
	<a href="logout.php">Admin Logout</a>
	
	
	</div>
<table width="795" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="6"><h2>View All Products Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Title</th>
		<th>Image</th>
		<th>Price</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_pro = "select * from products";
	
	$run_pro = mysqli_query($con, $get_pro); 
	
	$i = 0;
	
	while ($row_pro=mysqli_fetch_array($run_pro)){
		
		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro['product_title'];
		$pro_image = $row_pro['product_image'];
		$pro_price = $row_pro['product_price'];
		$i++;
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $pro_title;?></td>
		<td><img src="product_images/<?php echo $pro_image;?>" width="60" height="60"/></td>
		<td><?php echo $pro_price;?></td>
		<td><a href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>
		<td><a href="delete_pro.php?delete_pro=<?php echo $pro_id;?>">Delete</a></td>
	
	</tr>
	<?php } ?>
</table>

