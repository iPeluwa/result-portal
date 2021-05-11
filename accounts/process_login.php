<?php
require_once('../connection.php');
require_once('../online_connection.php');

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
$qry_online="SELECT * FROM `accounts` WHERE `email`='$login' AND `password`='$password'";
$result_online=mysqli_query($conn,$qry_online);
	//Check whether the query was successful or not
if($result_online) {
	if(mysqli_num_rows($result_online) > 0) {
		
		
		$qry="SELECT * FROM `accounts` WHERE `email`='$login' AND `password`='$password'";
		$result=mysqli_query($con,$qry);
	//Check whether the query was successful or not
		if($result) {
			if(mysqli_num_rows($result) > 0) {
			//Login Successful
				session_regenerate_id();
				$accounts = mysqli_fetch_assoc($result);
				$_SESSION['ACCOUNTS_ID'] = $accounts['id'];
				$_SESSION['ACCOUNTS_NAME'] = $accounts['name'];
				$_SESSION['ACCOUNTS_EMAIL'] = $accounts['email'];
				$_SESSION['ACCOUNTS_PHONE'] = $accounts['phonenumber'];
			// $_SESSION['TEACHER_PRO_PIC'] = $teacher['file'];
				$_SESSION['ACCOUNTS_POSITION'] = $accounts['position'];
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