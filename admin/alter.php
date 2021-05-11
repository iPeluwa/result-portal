<?php

if(isset($_POST['alter_subject'])){
	$email = strip_tags(mysqli_real_escape_string($con,$_POST['email']));
	$subject = strip_tags(mysqli_real_escape_string($con,$_POST['subject']));

	$search = "SELECT * FROM `subjects` WHERE `subject`='$subject'";
	$query_search = mysqli_query($con,$search);
	if(mysqli_num_rows($query_search)<1){
		echo"<script type='text/javascript'>alert('The subject you inputed doesnt exist')</script>";
		echo"<script type='text/javascript'>alert('Ask your admin officer for assistance')</script>";

	}else{


		$alter_subject = "UPDATE `subject_teachers` SET `subject`='$subject' WHERE email='$email'";
		$query_alter_subject = mysqli_query($con,$alter_subject);
		if($query_alter_subject){
			echo"<script type = 'text/javascript'>alert('The subject has been changed!!')</script>";
		}else{
			echo"<script type = 'text/javascript'>alert('You entered a wrong email!!')</script>";
		}
	}

}

if(isset($_POST['delete_subject'])){
	$subject = strip_tags(mysqli_real_escape_string($con,$_POST['subject']));

	$delete = "DELETE FROM `subjects` WHERE `subject`='subject'";
	$q_del = mysqli_query($con,$delete);	
	
	if($q_del){
		echo"<script type='text/javascript'>alert('You have deleted a subject')</script>";
	} 
}


if(isset($_POST['alter_class'])){
	$email = strip_tags(mysqli_real_escape_string($con,$_POST['email']));
	$class = strip_tags(mysqli_real_escape_string($con,$_POST['class']));

	$search = "SELECT * FROM `classes` WHERE `class`='$class'";
	$query_search = mysqli_query($con,$search);
	if(mysqli_num_rows($query_search)<1){
		echo"<script type='text/javascript'>alert('The class you inputed doesnt exist')</script>";
		echo"<script type='text/javascript'>alert('Ask your admin officer for assistance')</script>";

	}else{	

		$alter_class = "UPDATE `class_teachers` SET `class`='$class' WHERE `email`='$email'";
		$query_alter_class = mysqli_query($con,$alter_class);
		if($query_alter_class){
			echo"<script type = 'text/javascript'>alert('The class has been changed!!)</script>";
		}else{
			echo"<script type = 'text/javascript'>alert('You entered a wrong email!!')</script>";

		}
	}



	if(isset($_POST['delete_class'])){
		$class = strip_tags(mysqli_real_escape_string($con,$_POST['class']));

		$delete = "DELETE FROM `classes` WHERE `class`='$class'";
		$q_del = mysqli_query($con,$delete);	
		
		if($q_del){
			echo"<script type='text/javascript'>alert('You have deleted a class')</script>";
		} 
	}
}
?>