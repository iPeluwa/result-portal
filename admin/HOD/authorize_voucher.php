<?php
require_once('header.php');
if(isset($_POST['authorize_pv'])){

	$pv_id = $_POST['pv_id'];
	$transact_code = $_POST['transact_code'];
	$description = strip_tags(mysqli_real_escape_string($con, $_POST['description']));
	$amt = $_POST['amt'];
	$bank_name =  strip_tags(mysqli_real_escape_string($con, $_POST['bank_name']));
	$cheque_num = $_POST['cheque_num'];
	$total_amt_in_words =  strip_tags(mysqli_real_escape_string($con, $_POST['amt_in_words']));
	$total_amt_in_num = $_POST['amt'];
	$payee =  strip_tags(mysqli_real_escape_string($con, $_POST['customer_id']));
	$received_by =  strip_tags(mysqli_real_escape_string($con, $_POST['received_by']));
	$date = date('Y-m-d');

	$select_trans = "SELECT * FROM `payment_voucher` WHERE `transact_code`='$transact_code' AND `id` <> '$pv_id'";
	$query_trans = mysqli_query($con, $select_trans);
	$row_trans = mysqli_num_rows($query_trans);
	if($row_trans == 1){
		echo "<script type='text/javascript'>alert('The transaction code you added has already beign used')</script>";
		echo "<script type='text/javascript'>window.location.href='sign_voucher.php'</script>";
	}else{

		$update_pv = "UPDATE `payment_voucher` SET 
		`bank_name` = '$bank_name',
		`cheque_num` = '$cheque_num',
		`total_amt_in_words`= '$total_amt_in_words',
		`total_amt_in_no` = '$total_amt_in_num',
		`transact_code`= '$transact_code',
		`description` ='$description',
		`amount`= '$amt',
		`date_rev_auth` = '$date' WHERE `id` = '$pv_id'";
		$query_update = mysqli_query($con, $update_pv);
		if($query_update){
			echo "<script type='text/javascript'>alert('Voucher Authorized')</script>";
			echo "<script type='text/javascript'>window.location.href='sign_voucher.php'</script>";
		}else{
			echo "<script type='text/javascript'>alert('Something Went Wrong')</script>";
			echo "<script type='text/javascript'>window.location.href='sign_voucher.php'</script>";
		}
	}
}

?>


