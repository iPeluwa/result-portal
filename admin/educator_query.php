<?php
include_once '../connection.php';
if(isset($_POST['btn-signup'])){
	$name = strip_tags(mysqli_real_escape_string($con,$_POST['name']));
	$email = strip_tags(mysqli_real_escape_string($con,$_POST['email']));
	$pass = strip_tags(mysqli_real_escape_string($con,$_POST['password']));
	$phonenumber = strip_tags(mysqli_real_escape_string($con,$_POST['phonenumber']));
	$category = $_POST['category'];
	$password = md5($pass);

	$check_online = "SELECT * FROM `teacher` WHERE `email`='$email'";
	$check_query_online = mysqli_query($conn,$check_online);
	if(mysqli_num_rows($check_query_online) >= '1')
	{
		echo"<script type'text/javascript'>alert('Email exist already')</script>";
		exit();
	}
	else{
		$teacher_insert_online= "INSERT INTO `teacher`(`id`, `email`, `password`) VALUES('','$email','$password')";
		$teacher_query_online = mysqli_query($conn,$teacher_insert_online);
		if($teacher_query_online){
			



			$check = "SELECT * FROM `teacher` WHERE `email`='$email'";
			$check_query = mysqli_query($con,$check);
			if(mysqli_num_rows($check_query) >= '1')
			{
				echo"<script type'text/javascript'>alert('Email exist already')</script>";
				exit();
			}
			else{
				$teacher_insert = "INSERT INTO `teacher`(`id`,`name`, `email`, `password`,`phonenumber`,`category`) VALUES('','$name','$email','$password','$phonenumber','$category')";
				$teacher_query = mysqli_query($con,$teacher_insert);
				if($teacher_query){
					echo"<script type'text/javascript'>alert('Teacher, successfully created!!!')</script>";
					echo"<script type='text/javascript'> window.location.href='educator.php'</script>";
				}
			}
		}
	}


}
//note the online database has no date_left
if(isset($_POST['btn_change_email'])){ 
	$old_email = strip_tags(mysqli_real_escape_string($con,$_POST['old_email']));
	$new_email = strip_tags(mysqli_real_escape_string($con,$_POST['new_email']));

	$pick_online = "SELECT * FROM `teacher` WHERE `email`='$old_email'";
	$pick_query_online = mysqli_query($conn,$pick_online);
	if(mysqli_num_rows($pick_query_online)<1){
		echo"<script type'text/javascript'>alert('Your Old Email doesnt exist!!!')</script>";
		exit();

	}else{

		$pick_online = "UPDATE `teacher` SET `email` = '$new_email' WHERE `email`='$old_email' AND `date_left` = ''";
		$query_pick_online = mysqli_query($conn,$pick_online);
		if($query_pick_online){

			$pick = "SELECT * FROM `teacher` WHERE `email`='$old_email'";
			$pick_query = mysqli_query($con,$pick);
			if(mysqli_num_rows($pick_query)<1){
				echo"<script type'text/javascript'>alert('Your Old Email doesnt exist!!!')</script>";
				exit();

			}else{

				$pick = "UPDATE `teacher` SET `email` = '$new_email' WHERE `email`='$old_email' AND `date_left` = ''";
				$query_pick = mysqli_query($con,$pick);
				if($query_pick){
					echo"<script type'text/javascript'>alert('Your email has been changed!!!')</script>";
					echo"<script type='text/javascript'> window.location.href='educator.php'</script>";


				}
			}

		}
	}

}

if(isset($_POST['btn-change-category']))
{
	$email = strip_tags(mysqli_real_escape_string($con,$_POST['c_email']));
	$category = strip_tags(mysqli_real_escape_string($con,$_POST['new_category']));

	$pick = "SELECT * FROM `teacher` WHERE `email`='$email'";
	$pick_query = mysqli_query($con,$pick);

	if(mysqli_num_rows($pick_query) <1){
		echo"<script type'text/javascript'>alert('Your Email doesnt exist!!!')</script>";
	}else{

		$pick = "UPDATE `teacher` SET `category` = '$category' WHERE `email`='$email' AND `date_left` = ''";
		$query_pick = mysqli_query($con,$pick);
		if($query_pick){
			echo"<script type'text/javascript'>alert('Your category has been changed!!!')</script>";
			echo"<script type='text/javascript'> window.location.href='educator.php'</script>";
		}else{
			echo"<script type'text/javascript'>alert('Something Went Wrong !!!')</script>";
			echo"<script type='text/javascript'> window.location.href='educator.php'</script>";
		}

		
	} 	}

	if(isset($_POST['delete_staff'])){
		$email = strip_tags(mysqli_real_escape_string($con,$_POST['email']));
		
		$date = date('Y-m-d');
		$delete_online =  "UPDATE `teacher` SET `date_left` = '$date' WHERE `email`='$email' AND `date_left` = ''";
		$q_del_online = mysqli_query($conn,$delete_online);

		if($q_del_online){
			

			$delete =  "UPDATE `teacher` SET `date_left` = '$date' WHERE `email`='$email' AND `date_left` = ''";
			$q_del = mysqli_query($con,$delete);

			if($q_del){
				echo"<script type'text/javascript'>alert('Staff record has been deleted')</script>";
				echo"<script type='text/javascript'> window.location.href='educator.php'</script>";
			}else{
				echo"<script type'text/javascript'>alert('Something Went Wrong')</script>";
			}
		}else{
			echo"<script type'text/javascript'>alert('Something Went Wrong')</script>";
		}
	}

	?>