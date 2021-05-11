<?php

if(isset($_POST['change_admin_name'])){

	$name =strip_tags(mysqli_real_escape_string($con,$_POST['name']));
	$pass =strip_tags(mysqli_real_escape_string($con,$_POST['password']));
	$password = md5($pass);

	$check = "SELECT * FROM `admin` WHERE `email`='$email' AND `password` = '$password'";
	$req_check = mysqli_query($con, $check);
	$num_rows = mysqli_num_rows($req_check);
	if($num_rows < 1){
		echo "<script type='text/javascript'>alert('Wrong Password!!!')</script>";
		echo"<script type='text/javascript'> window.location.href = 'settings.php'; </script>";
		exit();
	}else{
		$update = "UPDATE `admin` SET `name`= '$name' WHERE `email`= '$email' AND `date_left` = ''";
		$query_update = mysqli_query($con,$update);

		if($query_update){
			echo "<script type='text/javascript'>alert('Change Name Success!!!')</script>";
			echo"<script type='text/javascript'> window.location.href = '../index.php'; </script>";
		}else{
			echo "<script type='text/javascript'>alert('Something Went wrong!!!')</script>";
		}
	}

}

if(isset($_POST['change_admin_email'])){

	$new_email =strip_tags(mysqli_real_escape_string($con,$_POST['new_email']));
	$pass =strip_tags(mysqli_real_escape_string($con,$_POST['password']));
	$password = md5($pass);

	$email =$_SESSION['HOD_EMAIL'];

	$check_online = "SELECT * FROM `admin` WHERE `email`='$email' AND `password` = '$password'";
	$req_check_online = mysqli_query($conn, $check_online);
	$num_rows_online = mysqli_num_rows($req_check_online);
	if($num_rows_online < 1){
		echo "<script type='text/javascript'>alert('Wrong Password!!!')</script>";
		echo"<script type='text/javascript'> window.location.href = 'settings.php'; </script>";
		exit();
	}else{
		$update_online = "UPDATE `admin` SET `email`= '$new_email' WHERE `email`= '$email' AND `date_left` =''";
		$query_update_online = mysqli_query($conn,$update_online);

		if($query_update_online){
			
			$check = "SELECT * FROM `admin` WHERE `id`='$userid' AND `password` = '$password'";
			$req_check = mysqli_query($con, $check);
			$num_rows = mysqli_num_rows($req_check);
			if($num_rows < 1){
				echo "<script type='text/javascript'>alert('Wrong Password!!!')</script>";
				echo"<script type='text/javascript'> window.location.href = 'settings.php'; </script>";
				exit();
			}else{
				$update = "UPDATE `admin` SET `email`= '$new_email' WHERE `id`= '$userid' AND `date_left` =''";
				$query_update = mysqli_query($con,$update);

				if($query_update){
					echo "<script type='text/javascript'>alert('Change Email Success!!!')</script>";
					echo"<script type='text/javascript'> window.location.href = '../index.php'; </script>";
				}else{
					echo "<script type='text/javascript'>alert('Something Went Wrong!!!')</script>";
				}
			}
		}else{
			echo "<script type='text/javascript'>alert('Something Went Wrong !!')</script>";
		}
	}
}

if(isset($_POST['change_admin_number'])){

	$number =strip_tags(mysqli_real_escape_string($con,$_POST['number']));
	$pass =strip_tags(mysqli_real_escape_string($con,$_POST['password']));
	$password = md5($pass);

	$check = "SELECT * FROM `admin` WHERE `id`='$userid' AND `password` = '$password'";
	$req_check = mysqli_query($con, $check);
	$num_rows = mysqli_num_rows($req_check);
	if($num_rows < 1){
		echo "<script type='text/javascript'>alert('Wrong Password!!!')</script>";
		echo"<script type='text/javascript'> window.location.href = 'settings.php'; </script>";
		exit();
	}else{
		$update = "UPDATE `admin` SET `phone`= '$number' WHERE `id`= '$userid' AND `date_left` = ''";
		$query_update = mysqli_query($con,$update);

		if($query_update){
			echo "<script type='text/javascript'>alert('Change Number Success!!!')</script>";
			echo"<script type='text/javascript'> window.location.href = '../index.php'; </script>";
		}else{
			echo "<script type='text/javascript'>alert('Something Went Wrong')</script>";
		}
	}

}
if(isset($_POST['change_admin_password'])){

	$old_pass =strip_tags(mysqli_real_escape_string($con,$_POST['old_password']));
	$new_pass =strip_tags(mysqli_real_escape_string($con,$_POST['new_password']));
	$old_password = md5($old_pass);
	$new_password = md5($new_pass);

	$check_online = "SELECT * FROM `admin` WHERE `email`='$email' AND `password` = '$old_password'";
	$req_check_online = mysqli_query($conn, $check_online);
	$num_rows_online = mysqli_num_rows($req_check_online);
	if($num_rows_online < 1){
		echo "<script type='text/javascript'>alert('Wrong Password!!!')</script>";
		echo"<script type='text/javascript'> window.location.href = 'settings.php'; </script>";
		exit();
	}else{
		$update_online = "UPDATE `admin` SET `password`= '$new_password' WHERE `email`= '$email' AND `date_left` = ''";
		$query_update_online = mysqli_query($conn,$update_online);

		if($query_update_online){
			
			
			$check = "SELECT * FROM `admin` WHERE `id`='$userid' AND `password` = '$old_password'";
			$req_check = mysqli_query($con, $check);
			$num_rows = mysqli_num_rows($req_check);
			if($num_rows < 1){
				echo "<script type='text/javascript'>alert('Wrong Password!!!')</script>";
				echo"<script type='text/javascript'> window.location.href = 'settings.php'; </script>";
				exit();
			}else{
				$update = "UPDATE `admin` SET `password`= '$new_password' WHERE `id`= '$userid' AND `date_left` = ''";
				$query_update = mysqli_query($con,$update);

				if($query_update){
					echo "<script type='text/javascript'>alert('Change Password Success!!!')</script>";
					echo"<script type='text/javascript'> window.location.href = '../index.php'; </script>";
				}else{
					echo "<script type='text/javascript'>alert('Something Went Wrong !!!')</script>";
				}
			}
		}else{
			echo "<script type='text/javascript'>alert('Something Went Wrong!!!')</script>";
		}
	}

}


?>