<?php
require_once('header.php');
	if(isset($_POST['create_pv'])){
		$transact_code = $_POST['transact_code'];
		$description = strip_tags(mysqli_real_escape_string($con, $_POST['description']));
		$amt = $_POST['amt'];
		$bank_name =  strip_tags(mysqli_real_escape_string($con, $_POST['bank_name']));
		$cheque_num = $_POST['cheque_num'];
		$total_amt_in_words =  strip_tags(mysqli_real_escape_string($con, $_POST['amt_in_words']));
		$total_amt_in_num = $_POST['amt'];
		$payee =  strip_tags(mysqli_real_escape_string($con, $_POST['customer_id']));
		$received_by =  strip_tags(mysqli_real_escape_string($con, $_POST['received_by']));
		$rev_auth_by = $_POST['rev_auth_by'];
		$approved_by = $_POST['approved_by'];
		$date = date('Y-m-d');

		$select_trans = "SELECT * FROM `payment_voucher` WHERE `transact_code`='$transact_code'";
		$query_trans = mysqli_query($con, $select_trans);
		$row_trans = mysqli_num_rows($query_trans);
		if($row_trans == 1){
			echo "<script type='text/javascript'>alert('The transaction code you added has already beign used')</script>";
			echo "<script type='text/javascript'>window.location.href='payment_voucher.php'</script>";
		}else{

		$insert_pv = "INSERT INTO `payment_voucher`
		(`id`, `bank_name`,`cheque_num`,`total_amt_in_words`, `total_amt_in_no`, `transact_code`, `description`, `amount`,`prepared_by`,`rev_auth_by`,`approved_by`,`date_prepared`,`payee`,`received_by`) 
		VALUES ('','$bank_name','$cheque_num','$total_amt_in_words','$total_amt_in_num','$transact_code', '$description', '$amt','$userid','$rev_auth_by','$approved_by','$date','$payee','$received_by')";
		$require_pv = mysqli_query($con, $insert_pv);
		if($require_pv){
			echo "<script type='text/javascript'>alert('Voucher Created')</script>";
			echo "<script type='text/javascript'>window.location.href='payment_voucher.php'</script>";
		}
	}

	}

?>