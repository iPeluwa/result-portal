<?php



if(isset($_POST['create_admin'])){


	$insert_name = strip_tags(mysqli_real_escape_string($con,$_POST['name']));
	$insert_email = strip_tags(mysqli_real_escape_string($con, $_POST['email']));
	$insert_number = strip_tags(mysqli_real_escape_string($con, $_POST['number']));
	$insert_category = strip_tags(mysqli_real_escape_string($con, $_POST['category']));
	if($insert_category != 'HOD'){
		$insert_category = ucfirst($insert_category);
	}
	$insert_pass = strip_tags(mysqli_real_escape_string($con, $_POST['password']));
	$insert_password = md5($insert_pass);


	$select_online = "SELECT * FROM `admin` WHERE `email` = '$insert_email'";
	$req_select_online = mysqli_query($conn,$select_online);

	if(mysqli_num_rows($req_select_online)>= 1 ){
		echo"<script type='text/javascript'>alert('Your email has already being used!!')</script>";

	}else{

		$insert_online = "INSERT INTO `admin` (`id`,`email`,`Category`,`password`) VALUES('','$insert_email','$insert_category','$insert_password')";
		$req_insert_online = mysqli_query($conn, $insert_online);

		if($req_insert_online){


			$select = "SELECT * FROM `admin` WHERE `email` = '$insert_email'";
			$req_select = mysqli_query($con,$select);

			if(mysqli_num_rows($req_select)>= 1 ){
				echo"<script type='text/javascript'>alert('Your email has already being used!!')</script>";

			}else{

				$insert = "INSERT INTO `admin` (`id`, `name`, `email`,`phone`,`Category`,`password`) VALUES('','$insert_name', '$insert_email','$insert_number', '$insert_category','$insert_password')";
				$req_insert = mysqli_query($con, $insert);

				if($req_insert){
					echo"<script type='text/javascript'>alert('You have created a new admin!!')</script>";

				}
			}


		}
	}



}

if(isset($_POST['add_signature'])){

	if($_FILES){


		if($userid){

			$file = $_FILES['file'];
			$tmp_name = $file['tmp_name'];
			$filename = $file['name'];
			$array = explode('.', $filename);
			$ext = end($array);
			$dir =  "../signature/";
			$new_filename = $userid."_admin_signature.".$ext;
			$new_name = $dir.$new_filename;

			if(( $ext == 'jpg')  || ($ext == 'png')){
				if(move_uploaded_file($tmp_name, $new_name)){
					$insert_signature = "UPDATE `admin` SET `signature`='$new_filename' WHERE `id`='$userid'";
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

$select_sign = "SELECT * FROM `admin` WHERE `id`='$userid'";
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