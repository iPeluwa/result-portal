<?php

if(isset($_POST['create_category'])){

	$hod_id = mysqli_real_escape_string($con, $_POST['hod']);
	$category = mysqli_real_escape_string($con, $_POST['category']);
	$date = date("Y-m-d");

	$select_hod = "SELECT * FROM `hod_category` WHERE `HOD_id` = '$hod_id'";
	$query_hod = mysqli_query($con, $select_hod);
	if(mysqli_num_rows($query_hod) > 0){
		echo "<script type='text/javascript'>alert('The HOD you added already has a category')</script>";
	}else{


		$insert = "INSERT INTO `hod_category` 
		(`id`,`HOD_id`,`Category`, `date`)
		VALUES('','$hod_id','$category','$date')"; 
		$mysqli_insert = mysqli_query($con, $insert);

		if($mysqli_insert){
			echo"<script type='text/javascript'> alert('HOD added to a category !!')</script>";
			echo "<script type='text/javascript'> window.location.href='hod_category.php';</script>";
		}
	}
}


?>