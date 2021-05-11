<?php
require_once('header.php');

if(isset($_POST['add_to_invoice'])){
	$check = "SELECT * FROM `invoice` WHERE `signature`='' ";
	$query_check = mysqli_query($con, $check);
	$num_rows = mysqli_num_rows($query_check);
	if($num_rows < 1){
		$material_id = $_POST['material_id'];
		$qty = $_POST['qty'];
		$product_and_qty = $material_id."_".$qty.",";

		$insert = "INSERT INTO `invoice` (`id`, `product_and_qty`) 
		VALUES('', '$product_and_qty')";
		$query_insert = mysqli_query($con, $insert);

		if($query_insert){
			echo "<script type='text/javascript'>alert('Added to invoice')</script>";
			echo "<script type='text/javascript'>window.location.href='invoice.php';</script>";
		}
	}else if($num_rows == 1){

		$valid = TRUE;
		$material_id = $_POST['material_id'];
		$qty = $_POST['qty'];
		$product_and_qty = $material_id."_".$qty.",";

		$row = mysqli_fetch_assoc($query_check);
		$products = explode("," , $row['product_and_qty']);

		foreach($products AS $product){
			$product_id = explode("_", $product);

			if($product_id[0] == $material_id){
				$valid = FALSE;
				echo "<script type='text/javascript'>alert('Product is already in invoice')</script>";
				echo "<script type='text/javascript'>window.location.href='invoice.php';</script>";

				break;
			}
		}	
		if($valid == TRUE){
			$new_product_and_qty = $row['product_and_qty'].$product_and_qty;			
			$id = $row['id'];

			$update = "UPDATE `invoice` SET `product_and_qty`= '$new_product_and_qty' WHERE `id` = '$id'";
			$query_update = mysqli_query($con, $update);
			if($query_update){
				echo "<script type='text/javascript'>alert('Added to invoice')</script>";
				echo "<script type='text/javascript'>window.location.href='invoice.php';</script>";
			}
		}
	}
}



if(isset($_POST['delete'])){
	$product_id = $_POST['delete_product'];
	$select_prod = "SELECT * FROM `invoice` WHERE `signature`=''";
	$query_select = mysqli_query($con, $select_prod);
		$row = mysqli_fetch_assoc($query_select);//there should ony be one row at a time that doesnt have signature so no need for while loop
		

		$product_and_qty = $row['product_and_qty'];
		$each_product_and_qty = explode(",", $product_and_qty);

		foreach ($each_product_and_qty as $each_prod_and_qty) {
			$product = explode("_",$each_prod_and_qty);
			if($product[0] == $product_id){
				$bad_product = $product[0]."_".$product[1];//this is the product that needs to be deleted(bad product)
				break;
			}
		}

				$key = array_search($bad_product, $each_product_and_qty);//we search for the key of the bad product in the array of products
				unset($each_product_and_qty[$key]); //then we delete the product using the unset function and the key we got above 
				
			$new_product_and_qty = implode(",", $each_product_and_qty);//then we combine the new products again 
			
			//then we update our database
			$update_prd = "UPDATE `invoice` SET `product_and_qty` = '$new_product_and_qty' WHERE `signature`=''";
			$query_update = mysqli_query($con, $update_prd);

			if($query_update){
				echo "<script type='text/javascript'>alert('Item Deleted')</script>";
				echo "<script type'text/javascript'>window.location.href='invoice.php';</script>";
			}
		}
		
		
		
		?>