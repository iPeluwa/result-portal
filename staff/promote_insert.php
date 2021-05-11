<?php

if(isset($_POST['promote'])){

	 
	$class = strip_tags(mysqli_real_escape_string($con,$_POST['class']));
	//$student_name = $_POST['student_name'];

		$promote = "UPDATE `student` SET `class_id` = '$class'";
		$query_promote = mysqli_query($con,$promote);

		 if($_POST['student'] != ""){ 
	foreach($_POST['student'] AS $student){
	$dont_promote = "UPDATE `student` SET `class_id` = '$classroom_id' WHERE `id`='$student' ";
	$query_dont_promote = mysqli_query($con,$dont_promote);
		}
	}

		if($query_promote){
			echo"<script type = 'text/javascript'>alert('Promotion successfull!!')</script>";
			echo"<script type='text/javascript'> window.location.href='promote.php'</script>";
		}
	}



?>