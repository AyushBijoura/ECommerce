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
	<a href="insert_cat.php">Insert New Categories</a>
	<a href="view_cats.php">View All Categories</a>
	<a href="index.php?insert_brand">Insert New Brands</a>
	<a href="index.php?view_brands">View All Brands</a>
	<a href="index.php?view_customers">View Customers</a>
	<a href="index.php?view_orders">View Orders</a>
	<a href="index.php?view_payments">View Payments</a>
	<a href="view_feedback.php">View Feedback</a>
	<a href="logout.php">Admin Logout</a>
	
	
	</div>

<table width="795" align="center" bgcolor="pink">

<tr align="center">
<td colspan="6"><h2><font style="font-weight:bold;">View All Customers Here</font></h2></td>
</tr>

<tr align="center" bgcolor="skyblue">
	<th><font style="font-weight:bold;">S.No</font></th>
	<th><font style="font-weight:bold;">Name</font></th>
	<th><font style="font-weight:bold;">Email</font></th>
	<th><font style="font-weight:bold;">Image</font></th>
	<th><font style="font-weight:bold;">Delete</font></th>
</tr>

<tr>
<?php
include("includes/db.php");

$get_c = "select * from customers";

$run_c = mysqli_query($con,$get_c);

$i = 0;

while($row_c = mysqli_fetch_array($run_c))
{
	$c_id = $row_c['customer_id'];
	$c_name = $row_c['customer_name'];
	$c_email = $row_c['customer_email'];
	$c_image = $row_c['customer_image'];
	$i++;
	

?>
<tr align="center">
	<td><?php echo $i;?></td>
	<td><?php echo $c_name;?></td>
	<td><?php echo $c_email;?></td>
	<td><img src="../customers/customer_images/<?php echo $c_image;?>" width="60" height="60"/></td>
	<td><a href="delete_c.php?delete_c=<?php echo $c_id; ?>">Delete</a></td>
</tr>

<?php } ?>




</table>