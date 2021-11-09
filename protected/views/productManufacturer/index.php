<?php
/* @var $this ProductManufacturerController */

$this->breadcrumbs = array(
	'Product Manufacturer',
);
?>
<h1>Product Manufacturers</h1>

<table class="table">
	<thead>
		<tr>
			<th scope="col">Product Manufacturer ID</th>
			<th scope="col">Product Manufacturer Name</th>
			<th scope="col">Company Year</th>
			<th scope="col" class="text-center">Action Menu</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($productmanufacturers as $productmanufacturer) { ?>
			<tr>
				<td><?php echo "$productmanufacturer->idproduct_manufacturers"; ?></td>
				<td><?php echo "$productmanufacturer->product_manufacturer_name"; ?></td>
				<td><?php echo "$productmanufacturer->company_year"; ?></td>
				<td class="text-center">
					<div class="btn btn-success"><i class="fa-solid fa-plus"></i></div>
					<div class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></div>
					<div class="btn btn-danger"><i class="fa-solid fa-xmark"></i></div>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>