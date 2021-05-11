<?php
require_once('header.php');

if(isset($_POST['add_record'])){

	$staff = $_POST['staff_id'];
	$staff_mix = explode('_', $staff);
	$staff_category = $staff_mix[0];
	$staff_id = end($staff_mix);

	$salary = $_POST['price'];
	$check_staff = "SELECT * FROM `pay_roll` WHERE `staff_id`= '$staff_id' AND `staff_category`='$staff_category'";
	$query_check = mysqli_query($con, $check_staff);
	$row_staff = mysqli_num_rows($query_check);
	if($row_staff == '1'){
		echo "<script type='text/javascript'>alert('The staff you chose is already in the payroll')</script>";
		echo "<script type='text/javascript'>window.location.href='pay_roll.php'</script>";
	}else{
		$insert_payroll = "INSERT INTO `pay_roll` 
		(`id`,`staff_id`,`staff_category` , `salary`) VALUES
		('','$staff_id','$staff_category', '$salary')";
		$query_insert_payroll = mysqli_query($con, $insert_payroll);
		if($query_insert_payroll){
			echo "<script type='text/javascript'>alert('Record Added!!!') </script>";
			echo "<script type='text/javascript'>window.location.href='pay_roll.php'</script>";
		}
	}
}

if(isset($_POST['change_price'])){

	$payroll_id = $_POST['payroll_id'];
	$new_salary = $_POST['new_price'];

	$update_payroll = "UPDATE `pay_roll` SET `salary`='$new_salary' WHERE `id` ='$payroll_id'";
	$query_update_payroll = mysqli_query($con, $update_payroll);
	if($query_update_payroll){
		echo "<script type='text/javascript'>alert('Salary Changed!!!') </script>";
		echo "<script type='text/javascript'>window.location.href='pay_roll.php'</script>";
		
	}
}


if(isset($_POST['delete_payroll'])){

	$payroll_id = $_POST['payroll_id'];

	$delete_payroll = "DELETE FROM `pay_roll` WHERE `id` ='$payroll_id'";
	$query_delete_payroll = mysqli_query($con, $delete_payroll);
	if($query_delete_payroll){
		echo "<script type='text/javascript'>alert('Record deleted!!!') </script>";
		echo "<script type='text/javascript'>window.location.href='pay_roll.php'</script>";
		
	}
}
?>