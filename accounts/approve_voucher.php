<?php
require_once('pdfheader.php');
require_once('../fpdf/fpdf.php');

if(isset($_POST['approve'])){

	$pv_id = $_POST['pv_id'];
	$date = date('Y-m-d');

	$approve_pv = "UPDATE `payment_voucher` SET `date_approved`='$date', `date_received`='$date' WHERE `id` = '$pv_id'";
	$query_approve = mysqli_query($con, $approve_pv);
	if($query_approve){
		echo "<script type='text/javascript'>alert('Voucher Approved')</script>";
		echo "<script type='text/javascript'>window.location.href='sign_voucher.php'</script>";
	}else{
		echo "<script type='text/javascript'>alert('Something Went Wrong')</script>";
		echo "<script type='text/javascript'>window.location.href='sign_voucher.php'</script>";
	}
}


if(isset($_POST['approve_petty_cash_voucher'])){

	$pv_id = $_POST['pv_id'];
	$date = date('Y-m-d');

	$approve_pv = "UPDATE `petty_cash_voucher` SET `date_approved`='$date', `date_received`='$date' WHERE `id` = '$pv_id'";
	$query_approve = mysqli_query($con, $approve_pv);
	if($query_approve){
		echo "<script type='text/javascript'>alert('Petty Cash Voucher Approved')</script>";
		echo "<script type='text/javascript'>window.location.href='sign_voucher.php'</script>";
	}else{
		echo "<script type='text/javascript'>alert('Something Went Wrong')</script>";
		echo "<script type='text/javascript'>window.location.href='sign_voucher.php'</script>";
	}


}

?>
