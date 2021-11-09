<?php
/* @var $this ProductController */

$this->breadcrumbs = array(
	'Product',
);
?>
<h1>Products</h1>

<div id="openinput" class="m-2 float-end btn btn-info" onclick="openinput()"><i class="fa-solid fa-plus"></i> Add New Product</div>

<div id="inputfields" style="display: none;">
	<table class="inputfields table-responsive" style="border-collapse: separate; border-spacing: 0 1em;">
		<thead>
			<tr>
				<th scope="col">Product Name</th>
				<th scope="col">Name of Manufacturer</th>
				<th scope="col">Product Detail</th>
				<th scope="col">Unit Price</th>
			</tr>
		</thead>
		<tbody>
			<form>
				<tr>
					<td><input id="input_product_name" class="form-control" type="text" required></td>
					<td>
						<select id="select_company_name" name="select_company_name_name" class="form-select" aria-label="Default select example" required>
							<option value="" selected disabled>Select Company Name</option>
							<option value="Apple">Apple</option>
							<option value="Samsung">Samsung</option>
						</select>
					</td>
					<td><input id="input_product_detail" class="form-control" type="text" required></td>
					<td><input id="input_unit_price" class="form-control" type="number" required></td>
				</tr>
				<tr>
					<td colspan="4" class="text-center">
						<button type="submit" id="create" class="m-2 btn btn-success"><i class="fa-solid fa-plus"></i> Add Product</button>
					</td>
				</tr>
			</form>
		</tbody>
	</table>
</div>

<div>
	<table class="table table-bordered border-info table-responsive">
		<thead>
			<tr>
				<th scope="col">Product Name</th>
				<th scope="col">Name of Manufacturer</th>
				<th scope="col">Product Detail</th>
				<th scope="col">Unit Price</th>
				<th scope="col" class="text-center">Action Menu</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($products as $product) { ?>
				<tr id="tr_<?php echo $product['idproducts']; ?>">
					<td><?php echo $product['productname']; ?></td>
					<td><?php echo $product['product_manufacturer_name']; ?></td>
					<td><?php echo $product['productdetail']; ?></td>
					<td><?php echo $product['productprice']; ?></td>
					<td class="text-center">
						<div class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></div>
						<div class="btn btn-danger" onclick="delete_row(<?php echo $product['idproducts']; ?>)"><i class="fa-solid fa-xmark"></i></div>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<script>
	function delete_row(idproducts) {
		if (confirm('Are you sure you want to delete?')) {
			$.ajax({
				type: 'POST',
				url: "<?php echo Yii::app()->createUrl('product/delete'); ?>",
				data: 'idproducts=' + idproducts,
				dataType: 'json',
				success: function(result) {
					if (result == 1) {
						jQuery('#tr_' + idproducts).hide(2500);
						alert("Product Deleted");
					} else {
						alert("Did not received 1.")
					}
				},
			});
			console.log('Removed from database.');
		} else {
			// Do nothing!
			console.log('Request canceled.');
		}
	}
</script>
<script>
	function openinput() {
		var inputfields = document.getElementById("inputfields");
		var openinput = document.getElementById("openinput");
		if (inputfields.style.display === "none") {
			inputfields.style.display = "block";
			previousText = $('#openinput').html();
			newText = '<i class="fa-solid fa-xmark"></i> Close';
			$('#openinput').toggleClass('btn-danger');
			$('#openinput').html(newText);
		} else {
			$('#openinput').toggleClass('btn-danger');
			inputfields.style.display = "none";
			$('#openinput').html(previousText);
		}
	}
</script>
<!-- <script>
	$(document).ready(function() {
		// Get value on button click and show alert
		$("#create").click(function() {
			var input_product_name = $("#input_product_name").val();
			var select_company_name = $("#select_company_name").val();
			var input_product_detail = $("#input_product_detail").val();
			var input_unit_price = $("#input_unit_price").val();
			alert(select_company_name);
		});
	});
</script> -->
<script>
	$(function() {
		$('form').submit(function() {
			$.ajax({
				type: 'POST',
				url: "<?php echo Yii::app()->createUrl('product/add'); ?>",
				// data: { username: $(this).name.value, 
				//         password: $(this).password.value }
				success: function(result) {
					alert(result);
				},
			});
		});
	})
</script>