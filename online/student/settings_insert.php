<?php
if(isset($_POST['change_admin_password'])){

	$old_pass =strip_tags(mysqli_real_escape_string($con,$_POST['old_password']));
		$new_pass =strip_tags(mysqli_real_escape_string($con,$_POST['new_password']));
		$old_password = md5($old_pass);
		$new_password = md5($new_pass);

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
?>