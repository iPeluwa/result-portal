<?php
require_once('header.php');
if(isset($_POST['add_fees'])){
	$fees = $_POST['fees'];
	$class = $_POST['class'];
	$term = $_POST['term'];
	$session_id = $_POST['session_id'];

	$check = "SELECT * FROM `fees` WHERE `session_id`='$session_id' AND `term`='$term' AND `class`='$class'";
	$query_check = mysqli_query($con, $check);
	$num_rows = mysqli_num_rows($query_check);
	if($num_rows >= 1){
		echo "<script type='text/javascript'>alert('You already have fees for the current class, term and session')</script>";
		echo "<script type='text/javascript'>window.location.href='fees.php';</script>";
	}

	if($num_rows < 1){
		$insert = "INSERT INTO `fees`
		(`id`,`fees`,`class`,`term`,`session_id`) VALUES('','$fees', '$class', '$term', '$session_id')";
		$query_insert = mysqli_query($con, $insert);

		if($query_insert){
			echo "<script type='text/javascript'>alert('New fees added')</script>";
			echo "<script type='text/javascript'>window.location.href='fees.php';</script>";

		}
	}
}

?>