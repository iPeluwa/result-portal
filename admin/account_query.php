<?php
if(isset($_POST['btn-signup'])){
	$name = strip_tags(mysqli_real_escape_string($con,$_POST['name']));
	$email = strip_tags(mysqli_real_escape_string($con,$_POST['email']));
	$pass = strip_tags(mysqli_real_escape_string($con,$_POST['password']));
	$phonenumber = strip_tags(mysqli_real_escape_string($con,$_POST['phonenumber']));
	$position = strip_tags(mysqli_real_escape_string($con,$_POST['position']));
	$password = md5($pass);

	$check_online = "SELECT * FROM `accounts` WHERE `email`='$email'";
	$check_query_online = mysqli_query($conn,$check_online);
	if(mysqli_num_rows($check_query_online) >= '1')
	{
		echo"<script type'text/javascript'>alert('Email exist already')</script>";
		echo"<script type='text/javascript'> window.location.href='account.php'</script>";
	}
	else{

		$account_insert_online = "INSERT INTO `accounts`(`id`,`email`, `position`,`password`) VALUES('','$email','$position','$password')";
		$account_query_online = mysqli_query($conn,$account_insert_online);
		if($account_query_online){


			$check = "SELECT * FROM `accounts` WHERE `email`='$email'";
			$check_query = mysqli_query($con,$check);
			if(mysqli_num_rows($check_query) >= '1')
			{
				echo"<script type'text/javascript'>alert('Email exist already')</script>";
				echo"<script type='text/javascript'> window.location.href='account.php'</script>";		}
				else{

					$account_insert = "INSERT INTO `accounts`(`id`,`name`,`phonenumber`, `email`, `position`,`password`) VALUES('','$name','$phonenumber','$email','$position','$password')";
					$account_query = mysqli_query($con,$account_insert);
					if($account_query){
						echo"<script type'text/javascript'>alert('New accounts, successfully created!!!')</script>";
						echo"<script type='text/javascript'> window.location.href='account.php'</script>";
					}
				}

			}
		}

	}



	if(isset($_POST['btn_change_email'])){ 
		$old_email = strip_tags(mysqli_real_escape_string($con,$_POST['old_email']));
		$new_email = strip_tags(mysqli_real_escape_string($con,$_POST['new_email']));

		$pick_online = "SELECT * FROM `accounts` WHERE `email`='$old_email'";
		$pick_query_online = mysqli_query($conn,$pick_online);
		if(mysqli_num_rows($pick_query_online)<1){
			echo"<script type'text/javascript'>alert('Your Old Email doesnt exist!!!')</script>";
			echo"<script type='text/javascript'> window.location.href='account.php'</script>";
		}else{

			$pick_online = "UPDATE `accounts` SET `email` = '$new_email' WHERE `email`='$old_email' AND `date_left` = ''";
			$query_pick_online = mysqli_query($conn,$pick_online);
			if($query_pick_online){


				$pick = "SELECT * FROM `accounts` WHERE `email`='$old_email'";
				$pick_query = mysqli_query($con,$pick);
				if(mysqli_num_rows($pick_query)<1){
					echo"<script type'text/javascript'>alert('Your Old Email doesnt exist!!!')</script>";
					exit();

				}else{

					$pick = "UPDATE `accounts` SET `email` = '$new_email' WHERE `email`='$old_email' AND `date_left` = ''";
					$query_pick = mysqli_query($con,$pick);
					if($query_pick){
						echo"<script type'text/javascript'>alert('Your email has been changed!!!')</script>";
						echo"<script type='text/javascript'> window.location.href='account.php'</script>";

					}else{
						echo "<script type'text/javascript'>alert('Something Went Wrong !!!')</script>";
					}
				}

			}else{
				echo "<script type'text/javascript'>alert('Something Went Wrong !!!')</script>";
			}
		}

	}

	if(isset($_POST['btn-change-category']))
	{

		$email = strip_tags(mysqli_real_escape_string($con,$_POST['c_email']));
		$position = strip_tags(mysqli_real_escape_string($con,$_POST['new_position']));

		$pick_online = "SELECT * FROM `accounts` WHERE `email`='$email'";
		$pick_query_online = mysqli_query($conn,$pick_online);

		if(mysqli_num_rows($pick_query_online) <1){
			echo"<script type'text/javascript'>alert('Your Email doesnt exist!!!')</script>";
		}else{



			$pick_insert_online = "UPDATE `accounts` SET `position` = '$position' WHERE `email`='$email' AND `date_left` = ''";
			$query_pick_insert_online = mysqli_query($conn,$pick_insert_online);
			if($query_pick_insert_online){


				$pick = "SELECT * FROM `accounts` WHERE `email`='$email'";
				$pick_query = mysqli_query($con,$pick);

				if(mysqli_num_rows($pick_query) <1){
					echo"<script type'text/javascript'>alert('Your Email doesnt exist!!!')</script>";
				}else{

					

					$pick = "UPDATE `accounts` SET `position` = '$position' WHERE `email`='$email' AND `date_left` = ''";
					$query_pick = mysqli_query($con,$pick);
					if($query_pick){
						echo"<script type'text/javascript'>alert('Your category has been changed!!!')</script>";
						echo"<script type='text/javascript'> window.location.href='account.php'</script>";

					}


				} 	
			}

		}


	} 

	if(isset($_POST['delete_staff'])){
		$date = date('Y-m-d');
		$email = strip_tags(mysqli_real_escape_string($con,$_POST['email']));
		
		$delete_online =  "UPDATE `accounts` SET `date_left` = '$date' WHERE `email`='$email'";
		$q_del_online = mysqli_query($conn,$delete_online);

		if($q_del_online){

			$delete =  "UPDATE `accounts` SET `date_left` = '$date' WHERE `email`='$email'";
			$q_del = mysqli_query($con,$delete);

			if($q_del){
				echo"<script type'text/javascript'>alert('Staff record has been deleted')</script>";
				echo"<script type='text/javascript'> window.location.href='account.php'</script>";

			}

		}

	}

	?>