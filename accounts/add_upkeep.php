<?php
require_once('header.php');

if(isset($_POST['add_upkeep'])){
	$upkeep = strip_tags(mysqli_real_escape_string($con, $_POST['upkeep']));
	$price = $_POST['price'];
	$date = date('Y-m-d');

	$select_session = "SELECT * FROM `session_available` ORDER BY  `date` DESC LIMIT 1";
	$query_session = mysqli_query($con, $select_session);
	$row = mysqli_fetch_assoc($query_session);
	$session =  $row['session_name'];
	if($session != ''){

		$add_upkeep = "INSERT INTO `gen_schl_upkeep` (`id`,`name`,`amt_per_session`,`session_started`,`date_started`)
		VALUES('','$upkeep','$price','$session','$date')";
		$upkeep_query = mysqli_query($con, $add_upkeep);

		if($upkeep_query){
			echo "<script type'text/javascript'>alert('Upkeep added')</script>";
			echo "<script type='text/javascript'>window.location.href='gen_schl_upkeep.php';</script>";
		}
	}else{
		echo "<script type'text/javascript'>alert('No session yet!!! Ask the database manage to create a session')</script>";
		echo "<script type='text/javascript'>window.location.href='gen_schl_upkeep.php';</script>";
	}
}

if(isset($_POST['change_price'])){
	$upkeep_id = $_POST['upkeep_id'];
	$new_price = $_POST['new_price'];

	$update_price = "UPDATE `gen_schl_upkeep` SET `amt_per_session` = '$new_price' WHERE `id` = '$upkeep_id'";
	$query_update = mysqli_query($con, $update_price);

	if($query_update){
		echo "<script type'text/javascript'>alert('Price Changed')</script>";
		echo "<script type='text/javascript'>window.location.href='gen_schl_upkeep.php';</script>";	
	}
}



if(isset($_POST['remove_upkeep'])){
	$upkeep_id = $_POST['upkeep_id'];
	$date = date('Y-m-d');

	$select_session = "SELECT * FROM `session_available` ORDER BY  `date` DESC LIMIT 1";
	$query_session = mysqli_query($con, $select_session);
	$row = mysqli_fetch_assoc($query_session);
	$session =  $row['session_name'];

	$update_remove = "UPDATE `gen_schl_upkeep` SET `date_ended` = '$date',`session_ended`='$session' WHERE `id` = '$upkeep_id'";
	$query_remove = mysqli_query($con, $update_remove);

	if($query_remove){
		echo "<script type'text/javascript'>alert('Upkeep removed!!!')</script>";
		echo "<script type='text/javascript'>window.location.href='gen_schl_upkeep.php';</script>";	
	}

}


?>