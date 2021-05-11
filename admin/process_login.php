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


$qry_online="SELECT * FROM `admin` WHERE `email`='$login' AND password='$password'";
$result_online=mysqli_query($conn,$qry_online);
	//Check whether the query was successful or not
if($result_online) {
	if(mysqli_num_rows($result_online) > 0) {
			//Login Successful
		
		
		$qry="SELECT * FROM `admin` WHERE `email`='$login' AND password='$password'";
		$result=mysqli_query($con,$qry);
	//Check whether the query was successful or not
		if($result) {
			if(mysqli_num_rows($result) > 0) {
			//Login Successful
				$ADMIN = mysqli_fetch_assoc($result);

				
				if($ADMIN['Category'] == 'Database Manager'){
					session_regenerate_id();
					$_SESSION['DB_ID'] = $ADMIN['id'];
					$_SESSION['DB_NAME'] = $ADMIN['name'];
					$_SESSION['DB_EMAIL'] = $ADMIN['email'];
					$_SESSION['DB_PHONE'] = $ADMIN['phone'];
					$_SESSION['DB_CATEGORY'] = $ADMIN['Category'];

					session_write_close();
					header("location: home.php");



				}
				else if($ADMIN['Category'] == 'Principal'){
					session_regenerate_id();
					$_SESSION['PRINCIPAL_ID'] = $ADMIN['id'];
					$_SESSION['PRINCIPAL_NAME'] = $ADMIN['name'];
					$_SESSION['PRINCIPAL_EMAIL'] = $ADMIN['email'];
					$_SESSION['PRINCIPAL_PHONE'] = $ADMIN['phone'];
					$_SESSION['PRINCIPAL_CATEGORY'] = $ADMIN['Category'];

					session_write_close();
					header("location: principal/home.php");
					
					session_write_close();
				}else if($ADMIN['Category'] == 'Proprietor'){
					session_regenerate_id();
					$_SESSION['PROPRIETOR_ID'] = $ADMIN['id'];
					$_SESSION['PROPRIETOR_NAME'] = $ADMIN['name'];
					$_SESSION['PROPRIETOR_EMAIL'] = $ADMIN['email'];
					$_SESSION['PROPRIETOR_PHONE'] = $ADMIN['phone'];
					$_SESSION['PROPRIETOR_CATEGORY'] = $ADMIN['Category'];

					session_write_close();
					header("location: proprietor/home_proprietor.php");
				}else if($ADMIN['Category']== 'HOD'){
					session_regenerate_id();
					$_SESSION['HOD_ID'] = $ADMIN['id'];
					$_SESSION['HOD_NAME'] = $ADMIN['name'];
					$_SESSION['HOD_EMAIL'] = $ADMIN['email'];
					$_SESSION['HOD_PHONE'] = $ADMIN['phone'];
					$_SESSION['HOD_CATEGORY'] = $ADMIN['Category'];

					session_write_close();
					header("location: HOD/home.php");
				}
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
}
?>