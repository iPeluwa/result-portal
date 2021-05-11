<?php
if(isset($_POST['add_subject'])){
	$subject =strip_tags(mysqli_real_escape_string($con,$_POST['subject']));
	$class =strip_tags(mysqli_real_escape_string($con,$_POST['c_id']));
	$teacher =strip_tags(mysqli_real_escape_string($con,$_POST['t_id']));
	$date = $date = date("Y-m-d");

	$select = "SELECT * FROM `subjects` WHERE `subject`='$subject' AND `class_id`='$class'";
	$query_select = mysqli_query($con,$select);

	if(mysqli_num_rows($query_select) >=1 ){
		echo"<script type='text/javascript'>alert('The subject you added to the class already exists')</script>";
		
	}
	else{
		$insert = "INSERT INTO `subjects` (`id`,`subject`,`class_id`,`teacher_id`,`date`) VALUES('','$subject','$class','$teacher','$date')";
		$insert_query = mysqli_query($con,$insert);

		if($insert_query){
			echo"<script type='text/javascript'>alert('You have added a new subject')</script>";
			echo"<script type='text/javascript'>window.location.href='subject.php' </script>";
		}
	}
}




if(isset($_POST['add_subject_csv'])){

	if($_FILES){

		if($_FILES['file']['size'] > 0){

			$filename = $_FILES['file']['tmp_name'];
			$fh = fopen($filename, "r");
			echo "<script type='text/javascript'> alert('$filename')</script>";


			while(($column = fgetcsv($fh, "1024", ",")) !== FALSE ){
		//echo "<script type='text/javascript'> alert('$column[0]')</script>";



				$subject =strip_tags(mysqli_real_escape_string($con,$column[0]));
				$class =strip_tags(mysqli_real_escape_string($con,$column[1]));
				$teacher =strip_tags(mysqli_real_escape_string($con,$column[2]));
				$date = $date = date("Y-m-d");



				$teacher_pick = "SELECT * FROM 
				`teacher` 
				WHERE 
				`name`='$teacher' AND `date_left` = ''";

				$query_teacher = mysqli_query($con,$teacher_pick);
				$teacher_row = mysqli_fetch_assoc($query_teacher);
				$teacher_id = $teacher_row['id'];

				if((mysqli_num_rows($query_teacher)) < 1){
					if($teacher != 'Teacher'){
						echo "<script type='text/javascript'> alert('One of the teachers  $teacher you put doesnt exist')</script>";
					}
					continue;
				}
				$pick = "SELECT * FROM 
				`classes` 
				WHERE 
				`class`='$class'";

				$query_pick = mysqli_query($con,$pick);
				$class_row = mysqli_fetch_assoc($query_pick);
				$class_id = $class_row['id'];
				if ((mysqli_num_rows($query_pick)) < 1){
					echo "<script type='text/javascript'> alert('The class you put doesnt exist')</script>";
					continue;

				}
				$select = "SELECT * FROM 
				`subjects` 
				WHERE 
				`subject`='$subject' 
				AND 
				`class_id`='$class_id'";
				$query_select = mysqli_query($con,$select);

				if((mysqli_num_rows($query_select)) >=1 ){
					echo"<script type='text/javascript'>alert('
						The subject, $subject you added to the class, $class already exists'
						)</script>";
continue;

}
else{
	$insert = "INSERT INTO `subjects` (
		`id`,
		`subject`,
		`class_id`,
		`teacher_id`,
		`date`
		) VALUES(
		'',
		'$subject',
		'$class_id',
		'$teacher_id',
		'$date'
		)";
$insert_query = mysqli_query($con,$insert);

if($insert_query){
	echo"<script type='text/javascript'>alert('You have added a new subject')</script>";
	echo"<script type='text/javascript'> window.location.href='subject.php'</script>";
}
}
}
}
}
}

if(isset($_POST['delete_subject'])){
	$subject =strip_tags(mysqli_real_escape_string($con,$_POST['subject']));
	$class =strip_tags(mysqli_real_escape_string($con,$_POST['c_id']));


	$select = "DELETE FROM `subjects` WHERE `subject`='$subject' AND `class_id`='$class'";
	$query_select = mysqli_query($con,$select);

	if($query_select){
		echo"<script type='text/javascript'>alert('You have deleted a subject!!')</script>";
		echo"<script type='text/javascript'> window.location.href='subject.php'</script>";
		
	}
	

}


if(isset($_POST['add_class'])){
	$class =strip_tags(mysqli_real_escape_string($con,$_POST['class']));
	$teacher =strip_tags(mysqli_real_escape_string($con,$_POST['t_id']));
	$super_class = $_POST['super_class'];
	$date = $date = date("Y-m-d");

	$select_c = "SELECT * FROM `classes` WHERE `class`='$class' OR `teacher_id`='$teacher' ";
	$query_select_c = mysqli_query($con,$select_c);

	if(mysqli_num_rows($query_select_c) >= 1){
		echo"<script type='text/javascript'>alert('The class you added already exists or the teacher is assigned to another class')</script>";
		exit();
	}
	else{
	// $insert_d = "UPDATE `teacher` SET `status`=a WHERE id='$teacher' AND category=1";
	// $insert_d_query = mysqli_query($con,$insert_d);
		$insert_c = "INSERT INTO `classes` (`id`,`class`,`super_class`,`teacher_id`,`date`) VALUES('','$class','$super_class','$teacher','$date')";
		$insert_c_query = mysqli_query($con,$insert_c);

		
		if($insert_c_query){
			echo"<script type='text/javascript'>alert('You have added a new class')</script>";
			echo"<script type='text/javascript'> window.location.href='classes.php'</script>";
		}
	}
}



if(isset($_POST['delete_class'])){
	$class =strip_tags(mysqli_real_escape_string($con,$_POST['class']));


	$select_c = "DELETE FROM `classes` WHERE `class`='$class'";
	$query_sel_c = mysqli_query($con,$select_c);

	if($query_sel_c){
		echo"<script type='text/javascript'>alert('You have deleted a class')</script>";
		echo"<script type='text/javascript'> window.location.href='classes.php'</script>";
		
	}
	

}



if(isset($_POST['add_class_csv'])){

	if($_FILES){


		$name = $_FILES['file']['tmp_name'];
		echo "<script type='text/javascript'>alert('$name')</script>";

		if($fh = fopen($name, "r")){

			while (($column = fgetcsv($fh, 1024, ",")) !== FALSE){
				if($_FILES['file']['size'] > 0){

					$class   = strip_tags(mysqli_real_escape_string($con,$column[0]));
					$super_class = strip_tags(mysqli_real_escape_string($con,$column[1]));
					$teacher = strip_tags(mysqli_real_escape_string($con,$column[2]));
					$date 	 = date("Y-m-d");

	//check the super class 
					switch ($super_class) {
						case ('JSS 1' || 'JSS 2' || 'JSS 3' || 'SSS 1' || 'SSS 2' || 'SSS 3' || 
							'Primary 1' || 'Primary 2' || 'Primary 3' || 'Primary 4' || 'Primary 5' || 'Primary 6'|| ' Nursery 1' || 'Nursery 2'):
						$sup_class_status = TRUE;
						break;

						default:
						$sup_class_status = FALSE;
						break;
					}

					if(($sup_class_status == FALSE) && ($super_class != 'Super Class')){
						echo "<script type='text/javascript'>alert('The super class you put is wrong. Please check the format in the create class form!!! ')</script>";
						continue;
					}

	$pick = "SELECT * FROM `teacher` WHERE `name`= '$teacher' AND `date_left` = ''"; //AND `category`='1'";
	$query_pick = mysqli_query($con,$pick);
	$row = mysqli_fetch_assoc($query_pick);

	$teacher_id = $row['id'];
	//echo "<script type='text/javascript'>alert('$teacher_id  $teacher')</script>";
	
	if((mysqli_num_rows($query_pick)) < 1){
		if($teacher != 'Teachers Name'){
			echo "<script type='text/javascript'>alert(' $teacher doesnt exist as a teacher')</script>";
		}
		continue;
	}


	$select_c = "SELECT * FROM `classes` WHERE `class`='$class' OR `teacher_id`='$teacher_id'";
	$query_select_c = mysqli_query($con,$select_c);

	if((mysqli_num_rows($query_select_c)) >= 1){
		echo"<script type='text/javascript'>alert('The class you added already exists or the teacher is assigned to another class')</script>";
		continue;
	}
	else{
	// $insert_d = "UPDATE `teacher` SET `status`=a WHERE id='$teacher' AND category=1";
	// $insert_d_query = mysqli_query($con,$insert_d);
		$insert_c = "INSERT INTO `classes` (`id`,`class`,`super_class`,`teacher_id`,`date`) VALUES('','$class','$super_class','$teacher_id','$date')";
		$insert_c_query = mysqli_query($con,$insert_c);

		
		

		if($insert_c_query){
			echo"<script type='text/javascript'>alert('You have added a new class')</script>";
			echo"<script type='text/javascript'> window.location.href='classes.php'</script>";
		}
	}
}
}
}
else{
	echo"<script type='text/javascript'> alert('Couldnt open file')</script>";
}
}
}

?>