<?php

    $get_child_id = $_GET['id'];
	$select_child = "SELECT * FROM `student` WHERE `parent_id` = '$userid' AND `id`='$get_child_id'";
	$query_select_child = mysqli_query($con,$select_child);

	$row = mysqli_fetch_assoc($query_select_child);

	$student_id = $row['id'];
	$student_name = $row['lname'] . " " . $row['fname'];
		//echo "<script type='text/javascript'>alert('$student_name')</script>";

if( $row['gender'] =='M'){$student_gender = "Male";}else 
	if($row['gender'] == 'F'){$student_gender = "Female";}

	$birthday = $row['birthday'];
	
	$class_id = $row['class_id'];
	$pick = "SELECT * FROM `classes` WHERE `id` = '$class_id'";
	$query_pick = mysqli_query($con,$pick);

	$take = mysqli_fetch_assoc($query_pick);
	$student_class = $take['class'];
	$teacher_id = $take['teacher_id'];

	$require = "SELECT * FROM `teacher` WHERE `id`='$teacher_id'";
	$query_require = mysqli_query($con,$require);

	$lift = mysqli_fetch_assoc($query_require);
	$teacher_name = $lift['name']; 




?>