<?php
require_once('header_proprietor.php');

	if(isset($_POST['sign_form'])){
		$form_id = $_POST['form_id'];

		$update = "UPDATE `advance_request` SET `signature` = '1' WHERE `id` = '$form_id' ";
		$query_update = mysqli_query($con, $update);

		if($query_update){
			echo "<script type='text/javascript'>alert('Signature Appended!!')</script>";
			echo "<script type='text/javascript'>window.location.href='advance_request.php'</script>";
		}
	}

?>