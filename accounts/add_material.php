<?php
require_once('header.php');

if(isset($_POST['add_material'])){
	$material = strip_tags(mysqli_real_escape_string($con, $_POST['material']));
	$price = $_POST['price'];
	$amt_in_stock = $_POST['amt_in_stock'];

	$add_material = "INSERT INTO `materials` (`id`,`material`,`price`,`amount_in_stock`)
	VALUES('','$material','$price','$amt_in_stock')";

	$material_query = mysqli_query($con, $add_material);

	if($material_query){
		echo "<script type'text/javascript'>alert('Material added')</script>";
		echo "<script type='text/javascript'>window.location.href='material.php';</script>";
	}
}


if(isset($_POST['change_price'])){
	$material_id = $_POST['material_id'];
	$new_price = $_POST['new_price'];

	$update_price = "UPDATE `materials` SET `price` = '$new_price' WHERE `id` = '$material_id'";
	$query_update = mysqli_query($con, $update_price);

	if($query_update){
		echo "<script type'text/javascript'>alert('Price Changed')</script>";
		echo "<script type='text/javascript'>window.location.href='material.php';</script>";	
	}
}


if(isset($_POST['restock'])){
	$material_id = $_POST['material_id'];
	$restock_number = $_POST['restock_number'];

	$select_qty = "SELECT `amount_in_stock` FROM `materials` WHERE `id` = '$material_id'";
	$query_select = mysqli_query($con, $select_qty);
	$row = mysqli_fetch_assoc($query_select);
	$amount_in_stock = $row['amount_in_stock'];
	$new_amount = $restock_number + $amount_in_stock;

	$update_amount = "UPDATE `materials` SET `amount_in_stock` = '$new_amount' WHERE `id` = '$material_id'";
	$query_amount = mysqli_query($con, $update_amount);

	if($query_amount){
		echo "<script type'text/javascript'>alert('Added to Stock')</script>";
		echo "<script type='text/javascript'>window.location.href='material.php';</script>";	
	}
}

?>