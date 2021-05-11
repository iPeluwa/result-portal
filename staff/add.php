<?php
if(isset($_POST['btn-signup'])){
	$fname =strip_tags(mysqli_real_escape_string($con,$_POST['fname']));
	$lname =strip_tags(mysqli_real_escape_string($con,$_POST['lname']));
	$gender =strip_tags(mysqli_real_escape_string($con,$_POST['gender']));
	$bday =strip_tags(mysqli_real_escape_string($con,$_POST['bday']));
	$email =strip_tags(mysqli_real_escape_string($con,$_POST['email']));
	$upass =strip_tags(mysqli_real_escape_string($con,$_POST['password']));
	$parent =strip_tags(mysqli_real_escape_string($con,$_POST['parent_id']));
	$adm_no =strip_tags(mysqli_real_escape_string($con,$_POST['adm_no']));
	$class =strip_tags(mysqli_real_escape_string($con,$_POST['class_id']));

	$password = md5($upass);
	$select = "SELECT * FROM `student` WHERE `email`='$email'";
	$query_select = mysqli_query($con,$select);
	
	if(mysqli_num_rows($query_select) >= 1){
		echo"<script type='text/javascript'>alert('The student you added already exists')</script>";
		
	}
	else{
	$insert = "INSERT INTO `student`(`id`,`adm_no`, `fname`, `lname`, `gender`, `birthday`, `email`, `password`, `parent_id`, `class_id`) VALUES('','$adm_no', '$fname','$lname','$gender','$bday','$email','$password','$parent','$class')";
	$insert_query = mysqli_query($con,$insert);

	if($insert_query){
		echo"<script type='text/javascript'>alert('You have added a new student')</script>";
				echo"<script type='text/javascript'>window.location.href='class.php' </script>";

	}
}
}


if(isset($_POST['delete_student'])){
	$email =strip_tags(mysqli_real_escape_string($con,$_POST['email']));
	
	$delete = "DELETE FROM `student` WHERE `email`='$email'";
	$query_delete = mysqli_query($con,$delete);


	if($query_delete){
		echo"<script type='text/javascript'>alert('You have deleted a student')</script>";
				echo"<script type='text/javascript'>window.location.href='class.php' </script>";

	}
}




if(isset($_POST['parent-signup'])){
	$name =strip_tags(mysqli_real_escape_string($con,$_POST['name']));
	$gender =strip_tags(mysqli_real_escape_string($con,$_POST['gender']));
	$relation =strip_tags(mysqli_real_escape_string($con,$_POST['relation']));
	$phonenumber =strip_tags(mysqli_real_escape_string($con,$_POST['phonenumber']));
	$upass =strip_tags(mysqli_real_escape_string($con,$_POST['password']));
	$email =strip_tags(mysqli_real_escape_string($con,$_POST['email']));
	$password  = md5($upass);
	$select = "SELECT * FROM `parents` WHERE `email`='$email'";
	$query_select = mysqli_query($con,$select);
	
	if(mysqli_num_rows($query_select) >= 1){
		echo"<script type='text/javascript'>alert('The parent you added already exists')</script>";
		
	}
	else{
	$insert = "INSERT INTO `parents`(`id`, `name`, `gender`, `relation`, `phone`, `password`,`child_class_id`, `email`) VALUES('', '$name','$gender','$relation','$phonenumber','$password','$classroom_id','$email')";
	$insert_query = mysqli_query($con,$insert);

	if($insert_query){
		echo"<script type='text/javascript'>alert('You have added a new parent')</script>";
		echo"<script type='text/javascript'>window.location.href='parent_view.php' </script>";

	}
}
}


if(isset($_POST['choose_parent'])){

	$email =strip_tags(mysqli_real_escape_string($con,$_POST['email']));

		$select = "SELECT * FROM `parents` WHERE `email`='$email'";
	$query_select = mysqli_query($con,$select);
			$row = mysqli_fetch_assoc($query_select);

	
	if(mysqli_num_rows($query_select) < 1){
		echo"<script type='text/javascript'>alert('The parent you chose doesnt exist')</script>";
		
	}else if((mysqli_num_rows($query_select) >= 1 )&& ($row['child_class_id'] == $classroom_id)){
				echo"<script type='text/javascript'>alert('The parent you chose already exists in your class')</script>";

	}
	else{

		$name = $row['name'];
		$gender = $row['gender'];
		$relation = $row['relation'];
		$phonenumber = $row['phone'];
		$password = $row['password'];
		$email = $row['email'];
		

	$insert = "INSERT INTO `parents`(`id`, `name`, `gender`, `relation`, `phone`, `password`,`child_class_id`, `email`) VALUES('', '$name','$gender','$relation','$phonenumber','$password','$classroom_id','$email')";
	$insert_query = mysqli_query($con,$insert);

	if($insert_query){
		echo"<script type='text/javascript'>alert('You have added a new parent')</script>";
	 echo"<script type='text/javascript'>window.location.href='parent_view.php' </script>";

	}
}
}
?>