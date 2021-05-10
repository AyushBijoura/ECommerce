<!DOCTYPE HTML>
<?php
include("includes/db.php");
if(isset($_GET['edit_pro']))
{
	$get_id = $_GET['edit_pro'];
	
	$get_pro = "select * from products where product_id='$get_id'";

	$run_pro = mysqli_query($con,$get_pro);

	$i = 0;

	$row_pro = mysqli_fetch_array($run_pro);
	
	$pro_id = $row_pro['product_id'];
	$pro_title = $row_pro['product_title'];
	$pro_image = $row_pro['product_image'];
	$pro_price = $row_pro['product_price'];
	$pro_decs = $row_pro['product_desc'];
	$pro_keywords = $row_pro['product_keywords'];
	$pro_cat = $row_pro['product_cat'];
	$pro_brand = $row_pro['product_brand'];

	$get_cat = "select * from categories where cat_id='$pro_cat'";
	
	$run_cat = mysqli_query($con,$get_cat);
	
	$row_cat = mysqli_fetch_array($run_cat);
	
	$category_title = $row_cat['cat_title'];
	
	
	$get_brand = "select * from brands where brand_id='$pro_brand'";
	
	$run_brand = mysqli_query($con,$get_brand);
	
	$row_brand = mysqli_fetch_array($run_brand);
	
	$brand_title = $row_brand['brand_title'];
	
	
}
?>
<html>
<head>
<title>Updating product</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">

<table align="center" width="795" height="500" border="2" bgcolor="#187eae">
<tr>
<td colspan="8" align="center"><h2>Edit & Update Product</h2></td>
</tr>
<tr>
<td align="center">Product title</td>
<td><input type="text" name="product_title" value="<?php echo $pro_title;?>"/></td>
</tr>

<tr>
<td align="center">Product category</td>
<td>
	<select name="product_cat"> 
		<option><?php echo $category_title;?></option>
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
		<option><?php echo $brand_title;?></option>
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
<td><input type="text" name="product_price" value="<?php echo $pro_price;?>"/></td>
</tr>

<tr>
<td align="center">Product image</td>
<td><input type="file" name="product_image"/><img src="product_images/<?php echo $pro_image;?>" width="60" height="60"/></td>
</tr>

<tr>
<td align="center">Product description</td>
<td><textarea name="product_desc" cols="20" rows="10"><?php echo $pro_decs;?></textarea></td>
</tr>

<tr>
<td align="center">Product keywords</td>
<td><input type="text" name="product_keywords" value="<?php echo $pro_keywords;?>"/></td>
</tr>


<tr align="center">
<td colspan="8"><input type="submit" name="update_product" value="Update Product"/></td>
</tr>

</table>

</form>
</body>
</html>
<?php

if (isset($_POST['update_product']))	
	{
		$update_id = $pro_id;
		
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


		$update_product = "update products set product_cat ='$product_cat',product_brand ='$product_brand',product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords' where product_id='$update_id'";
		
		$run_product = mysqli_query($con,$update_product);
		
		if($run_product)
		
		{
			
			echo "<script>alert('Product has been updated');</script>";
			echo "<script>window.open('index.php?view_products','_self')</script>";
		}
		
		
		
	}	



?>