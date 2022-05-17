<?php


include('header.php');
include('functions.php');

$getID = $_GET['id'];

// Connect to the database
$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

// output any connection error
if ($mysqli->connect_error) {
	die('Error : ('.$mysqli->connect_errno .') '. $mysqli->connect_error);
}

// the query
$query = "SELECT * FROM products WHERE product_id = '" . $mysqli->real_escape_string($getID) . "'";

$result = mysqli_query($mysqli, $query);

// mysqli select query
if($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$product_name = $row['product_name']; // product name
		$product_desc = $row['product_desc']; // product description
		$product_price = $row['product_price']; // product price
		$product_qty = $row['product_qty']; //product quantity
		$product_sku = $row['product_sku'];
		$product_original_price = $row['product_original_price'];
	}
}

/* close connection */
$mysqli->close();

?>

<h1>Edit Product</h1>
<hr>

<div id="response" class="alert alert-success" style="display:none;">
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<div class="message"></div>
</div>
						
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Editing Product (<?php echo $getID; ?>)</h4>
			</div>
			<div class="panel-body form-group form-group-sm">
				<form method="post" id="update_product">
					<input type="hidden" name="action" value="update_product">
					<input type="hidden" name="id" value="<?php echo $getID; ?>">
					<div class="form-group row">
						<label for="product_sku" class="col-sm-2 col-form-label">Product SKU</label>
						<div class="col-sm-10">
							<input type="text" class="form-control required" value="<?php echo $product_sku; ?>" name="product_sku" id="product_sku" placeholder="Enter Product Code">
						</div>
					</div>
					<div class="form-group row">
						<label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
						<div class="col-sm-10">
							<input type="text" value="<?php echo $product_name; ?>" class="form-control required" name="product_name" id="product_name" placeholder="Enter Product Name">
						</div>
					</div>
					<div class="form-group row">
						<label for="product_desc" class="col-sm-2 col-form-label">Product Description</label>
						<div class="col-sm-10">
							<input type="text" class="form-control required" name="product_desc" value="<?php echo $product_desc; ?>" id="product_desc" placeholder="Enter Product Description">
						</div>
					</div>
					<div class="form-group row">
						<label for="product_qty" class="col-sm-2 col-form-label">Product Quantity</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" name="product_qty" value="<?php echo $product_qty; ?>" id="product_qty" placeholder="Keep it empty for unlimited">	
						</div>
					</div>
					<div class="form-group row">
						<label for="product_price_org" class="col-sm-2 col-form-label">Product Purchase Price</label>
						<div class="col-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><?php echo CURRENCY ?></span>
								<input type="number" name="product_price_org" id="product_price_org" value="<?php echo $product_original_price; ?>" class="form-control required" placeholder="0.00" aria-describedby="sizing-addon1">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="product_price" class="col-sm-2 col-form-label">Product Sell Price</label>
						<div class="col-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><?php echo CURRENCY ?></span>
								<input type="number" name="product_price" id="product_price" class="form-control required" placeholder="0.00" value="<?php echo $product_price; ?>" aria-describedby="sizing-addon1">
							</div>
						</div>
					</div>



					
					<div class="row">
						<div class="col-xs-12 margin-top btn-group">
							<input type="submit" id="action_update_product" class="btn btn-success float-right" value="Update product" data-loading-text="Updating...">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<div>

<?php
	include('footer.php');
?>