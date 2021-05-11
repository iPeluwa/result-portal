<?php
require_once('header.php');
	if(isset($_POST['create_pettyv'])){

		$transact_code = $_POST['transact_code'];
		$details = strip_tags(mysqli_real_escape_string($con, $_POST['details']));
		$chargeable_to =  strip_tags(mysqli_real_escape_string($con, $_POST['chargeable_to']));
		$amt_in_words =  strip_tags(mysqli_real_escape_string($con, $_POST['amt_in_words']));
		$amt_in_num = $_POST['amt'];
		$payee =  strip_tags(mysqli_real_escape_string($con, $_POST['customer_id']));
		$received_by =  strip_tags(mysqli_real_escape_string($con, $_POST['received_by']));
		$rev_auth_by = $_POST['rev_auth_by'];
		$approved_by = $_POST['approved_by'];
		$date = date('Y-m-d');

		$select_trans = "SELECT * FROM `petty_cash_voucher` WHERE `transact_code`='$transact_code'";
		$query_trans = mysqli_query($con, $select_trans);
		$row_trans = mysqli_num_rows($query_trans);
		if($row_trans == 1){
			echo "<script type='text/javascript'>alert('The transaction code you added has already beign used')</script>";
			echo "<script type='text/javascript'>window.location.href='petty_cash_voucher.php'</script>";
		}else{

		$insert_pv = "INSERT INTO `petty_cash_voucher`
		(`id`, `chargeable_to`,`payee`, `transact_code`,`details`, `amt_in_num`,`amt_in_words`,`prepared_by`,`date_prepared`,
			`rev_auth_by`,`approved_by`,`received_by`) 
		VALUES ('','$chargeable_to','$payee','$transact_code','$details','$amt_in_num','$amt_in_words', '$userid','$date','$rev_auth_by','$approved_by','$received_by')";
		$require_pv = mysqli_query($con, $insert_pv);
		if($require_pv){
			echo "<script type='text/javascript'>alert('Petty Cash Voucher Created')</script>";
			echo "<script type='text/javascript'>window.location.href='petty_cash_voucher.php'</script>";
		}else{
		echo "<script type='text/javascript'>alert('Not' Created')</script>";

		}
	}

	}

?>	