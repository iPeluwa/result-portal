<?php
require_once('header.php');
if(isset($_POST['send_report'])){

	$title = strip_tags(mysqli_real_escape_string($con, $_POST['title']));
	$main_text= strip_tags(mysqli_real_escape_string($con, $_POST['report']));
	$recepient_id = $_POST['recepient'];
	$recepient_category = "admin";
	$date = date('Y-m-d');
	$insert_report = "INSERT INTO `report` 
	(`id`, `sender_id`,`sender_category`,`Title`,`main_text`, `recepient_id`, `recepient_category`,`date`)
	VALUES('','$userid', 'admin', '$title', '$main_text', '$recepient_id' , '$recepient_category', '$date')";

	$query_report = mysqli_query($con, $insert_report);

	if($query_report){
		echo "<script type='text/javascript'>alert('Report Sent')</script>";
		echo "<script type='text/javascript'>window.location.href='principals_report.php';</script>";
	}

}


?>