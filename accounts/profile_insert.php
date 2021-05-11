<?php

if(isset($_POST['add_signature'])){

	if($_FILES){

		if($userid){
			
			$file = $_FILES['file'];
			$tmp_name = $file['tmp_name'];
			$filename = $file['name'];
			$array = explode('.', $filename);
			$ext = end($array);
			$dir =  "../signature/";
			$new_filename = $userid."_account_signature.".$ext;
			$new_name = $dir.$new_filename;

			if(( $ext == 'jpg')  || ($ext == 'png')){
				if(move_uploaded_file($tmp_name, $new_name)){
					$insert_signature = "UPDATE `accounts` SET `signature`='$new_filename' WHERE `id`='$userid'";
					$query_sign = mysqli_query($con, $insert_signature);
					if($query_sign){
						echo "<script type='text/javascript'>alert('Signature Added')</script>";
					}
				}else{
					echo "<script type='text/javascript'>alert('Couldnt upload file. Please try again !!!')</script>";
				}
			}else{
				echo "<script type='text/javascript'>alert('Only .png or .jpg files allowed')</script>";

			}

		}else{
			echo "<script type='text/javascript'>alert('Something Went Wrong. Please try again!!')</script>";

		}
	}
}

$select_sign = "SELECT * FROM `accounts` WHERE `id`='$userid'";
$query_select = mysqli_query($con, $select_sign);
if($query_select){
	$row = mysqli_fetch_assoc($query_select);

	if($row['signature'] == ''){
		$signature_state = FALSE;
	}else{
		$signature_state = TRUE;
	}

}
?>