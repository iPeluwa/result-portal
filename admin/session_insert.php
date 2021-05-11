<?php

 if(isset($_POST['session_create'])){
	$session_name=strip_tags(mysqli_real_escape_string($con,$_POST['session_name']));
	$date = date("Y-m-d");

		$check = "SELECT * FROM `session_available` WHERE `session_name`='$session_name'";
		$check_query = mysqli_query($con,$check);
		if(mysqli_num_rows($check_query) >= '1')
		{
		echo"<script type'text/javascript'>alert('You have already created that session previously')</script>";
		exit();
		}
		else{
		$session_insert = "INSERT INTO `session_available` (`id`,`session_name`,`date`) VALUES('','$session_name','$date')";
		$session_query = mysqli_query($con,$session_insert);
		if($session_query){
		echo"<script type'text/javascript'>alert('New Session, successfully created!!!')</script>";
		echo"<script type='text/javascript'> window.location.href='sessions.php'</script>";
		}
	}
}	

?>