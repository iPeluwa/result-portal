<?php

	$get_info = "SELECT * FROM `school_info`";
	$query_get = mysqli_query($con, $get_info);
	$num_row = mysqli_num_rows($query_get);

	$row = mysqli_fetch_assoc($query_get);
	$school_name = $row['name'];
	$email = $row['email'];
	$phonenumber = $row['phonenumber'];
	$school_address = $row['address'];

	if($school_name == ''){
		$school_name_state = FALSE;
	}else{
		$school_name_state = TRUE;
	}

	if($email == ''){
		$school_email_state = FALSE;
	}else{
		$school_email_state = TRUE;
	}

	if($phonenumber == ( '' || '0')){
		$school_number_state = FALSE;
	}else{
		$school_number_state = TRUE;
	}

	if($school_address == ''){
		$school_address_state = FALSE;
	}else{
		$school_address_state = TRUE;
	}


	if($num_row == 0){
		if(isset($_POST['add_name'])){
			$school_name = strip_tags(mysqli_real_escape_string($con, $_POST['name']));
			$add_name = "INSERT INTO `school_info` 
			(`id`,`name`) VALUES('','$school_name')"; 
			$query_name = mysqli_query($con, $add_name);
			if($query_name){
				echo"<script type='text/javascript'>alert('School Name Added !!! ')</script>";
				echo "<script type ='text/javascript'>window.location.href='school_profile.php';</script>";
			}
		}
	
			if(isset($_POST['add_email'])){
			$school_email = strip_tags(mysqli_real_escape_string($con, $_POST['email']));
			$add_email = "INSERT INTO `school_info` 
			(`id`,`email`) VALUES('','$school_email')"; 
			$query_email = mysqli_query($con, $add_email);
			if($query_email){
				echo"<script type='text/javascript'>alert('School Email Added !!! ')</script>";
				echo "<script type ='text/javascript'>window.location.href='school_profile.php';</script>";
			}
		}

			if(isset($_POST['add_phonenumber'])){
			$school_phonenumber = strip_tags(mysqli_real_escape_string($con, $_POST['phonenumber']));
			$add_phonenumber = "INSERT INTO `school_info` 
			(`id`,`phonenumber`) VALUES('','$school_phonenumber')"; 
			$query_phonenumber = mysqli_query($con, $add_phonenumber);
			if($query_phonenumber){
				echo"<script type='text/javascript'>alert('School Phonenumber Added !!! ')</script>";
				echo "<script type ='text/javascript'>window.location.href='school_profile.php';</script>";
			}
		}

			if(isset($_POST['add_address'])){
			$school_address = strip_tags(mysqli_real_escape_string($con, $_POST['address']));
			$add_address = "INSERT INTO `school_info` 
			(`id`,`address`) VALUES('','$school_address')"; 
			$query_address = mysqli_query($con, $add_address);
			if($query_address){
				echo"<script type='text/javascript'>alert('School Address Added !!! ')</script>";
				echo "<script type ='text/javascript'>window.location.href='school_profile.php';</script>";
			}
		}
	}



	if($num_row == 1){
		$id = $row['id'];
		if(isset($_POST['add_name'])){
			$school_name = strip_tags(mysqli_real_escape_string($con, $_POST['name']));
			$add_name = "UPDATE `school_info` SET `name` = '$school_name' WHERE `id` = '$id'"; 
			$query_name = mysqli_query($con, $add_name);
			if($query_name){
				echo"<script type='text/javascript'>alert('School Name Added !!! ')</script>";
				echo "<script type ='text/javascript'>window.location.href='school_profile.php';</script>";
			}
		}
	
			if(isset($_POST['add_email'])){
			$school_email = strip_tags(mysqli_real_escape_string($con, $_POST['email']));
			$add_email = "UPDATE `school_info` SET `email` = '$school_email' WHERE `id` ='$id'"; 
			$query_email = mysqli_query($con, $add_email);
			if($query_email){
				echo"<script type='text/javascript'>alert('School Email Added !!! ')</script>";
				echo "<script type ='text/javascript'>window.location.href='school_profile.php';</script>";
			}
		}

			if(isset($_POST['add_phonenumber'])){
			$school_phonenumber = strip_tags(mysqli_real_escape_string($con, $_POST['phonenumber']));
			$add_phonenumber = "UPDATE `school_info` SET `phonenumber` = '$school_phonenumber' WHERE `id` = '$id'"; 
			$query_phonenumber = mysqli_query($con, $add_phonenumber);
			if($query_phonenumber){
				echo"<script type='text/javascript'>alert('School Phonenumber Added !!! ')</script>";
				echo "<script type ='text/javascript'>window.location.href='school_profile.php';</script>";
			}
		}

			if(isset($_POST['add_address'])){
			$school_address = strip_tags(mysqli_real_escape_string($con, $_POST['address']));
			$add_address = "UPDATE `school_info` SET `address` = '$school_address' WHERE `id` = '$id'"; 
			$query_address = mysqli_query($con, $add_address);
			if($query_address){
				echo"<script type='text/javascript'>alert('School Address Added !!! ')</script>";
				echo "<script type ='text/javascript'>window.location.href='school_profile.php';</script>";
			}
		}
	}

?>