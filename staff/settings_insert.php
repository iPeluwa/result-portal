<?php
if(isset($_POST['change_staff_password'])){

	$old_pass =strip_tags(mysqli_real_escape_string($con,$_POST['old_password']));
		$new_pass =strip_tags(mysqli_real_escape_string($con,$_POST['new_password']));
		$old_password = md5($old_pass);
		$new_password = md5($new_pass);

		$email =$_SESSION['TEACHER_EMAIL'];

		$check_online = "SELECT * FROM `teacher` WHERE `email`='$email' AND `password` = '$old_password'";
		$req_check_online = mysqli_query($conn, $check_online);
		 $num_rows_online = mysqli_num_rows($req_check_online);
		if($num_rows_online < 1){
			echo "<script type='text/javascript'>alert('Wrong Password!!!')</script>";
			exit();
		}else{
			$update_online = "UPDATE `teacher` SET `password`= '$new_password' WHERE `email`= '$email'";
			$query_update_online = mysqli_query($conn,$update_online);

			if($query_update_online){

		$check = "SELECT * FROM `teacher` WHERE `id`='$userid' AND `password` = '$old_password'";
		$req_check = mysqli_query($con, $check);
		 $num_rows = mysqli_num_rows($req_check);
		if($num_rows < 1){
			echo "<script type='text/javascript'>alert('Wrong Password!!!')</script>";
			exit();
		}else{
			$update = "UPDATE `teacher` SET `password`= '$new_password' WHERE `id`= '$userid'";
			$query_update = mysqli_query($con,$update);

			if($query_update){
				echo "<script type='text/javascript'>alert('Password Change was Successful!!!')</script>";
				echo"<script type='text/javascript'> window.location.href = 'index.php'; </script>";
			}
		}
		}
		}

}
?>