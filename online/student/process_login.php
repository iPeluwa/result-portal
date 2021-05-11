<?php
require_once('../connection.php');
session_start();

function clean($str) {
	global $con;
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($con,$str);
	}
	//Sanitize the POST values
	$login = clean($_POST['email']);
	$pass = clean($_POST['password']);
	$password = md5($pass);
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}  
	//If there are input validations, redirect back to the login form
	//Create query
	$qry="SELECT * FROM `student` WHERE `email`='$login' AND password='$password'";
	$result=mysqli_query($con,$qry);
	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$STUDENT = mysqli_fetch_assoc($result);
			$_SESSION['STUDENT_ID'] = $STUDENT['id'];
			$_SESSION['STUDENT_FNAME'] = $STUDENT['fname'];
			$_SESSION['STUDENT_LNAME'] = $STUDENT['lname'];
			$_SESSION['STUDENT_EMAIL'] = $STUDENT['email'];
			// $_SESSION['STUDENT_PRO_PIC'] = $STUDENT['file'];
			$_SESSION['STUDENT_GENDER'] = $STUDENT['gender'];
			$_SESSION['STUDENT_BIRTHDAY'] = $STUDENT['birthday'];
			$_SESSION['STUDENT_CLASS'] = $STUDENT['class_id'];
			session_write_close();
			header("location: home.php");
			exit();
		}else {
  echo '<script language = "javascript">';
  // echo "window.location.href='login.php'";
  echo "alert('Something went wrong, Enter correct details');window.location.href='index.php'";
   echo '</script>';
    exit;
   // echo "<script language = 'javascript'> alert('Wrong Details');'</script>";
                    }
	}else {
		die("Query failed");
	}
?>