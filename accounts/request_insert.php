<?php
require_once('header.php');

	if(isset($_POST['create_request'])){
		$select_staff = $_POST['select_staff'];
		$staff = explode("_",$select_staff);
		$staff_cat = $staff[0];
		$staff_id = end($staff);
		$amt_in_num = $_POST['amt_in_num'];
		$amt_in_words = strip_tags(mysqli_real_Escape_string($con,$_POST['amt_in_words']));
		$purpose = strip_tags(mysqli_real_Escape_string($con,$_POST['purpose']));
		$date = $_POST['date'];
		$date_returned = $_POST['date_returned'];
		$authorized_by = $_POST['authorized_by'];
		$approved_by = $_POST['approved_by'];
		
		$insert = "INSERT INTO `advance_request` 
		(`id`,`staff_id`,`staff_category`, `amt_in_num`,`amt_in_words`, `purpose`, `date`, `date_returned`, `signature`,`authorized_by`, `approved_by`)
		VALUES('','$staff_id','$staff_cat','$amt_in_num', '$amt_in_words', '$purpose', '$date','$date_returned', 'Not Signed', '$authorized_by', '$approved_by')";
	
		$query_insert = mysqli_query($con, $insert); 

		if($query_insert){
			echo "<script type='text/javascript'>alert('Form Created!')</script>";
			echo "<script type='text/javascript'>window.location.href='advance_request.php'</script>";
		}
	}


if(isset($_POST['pay'])){
	$form_id = $_POST['form_id'];

	$update = "UPDATE `advance_request` SET `paid_back` = '1' WHERE `id` = '$form_id'";
	$mysqli_update = mysqli_query($con, $update);

	if($mysqli_update){
		echo "<script type='text/javascript'>alert('Status Changed')</script>";
		echo "<script type='text/javascript'>window.location.href='advance_request.php'</script>";
	}
}


?>