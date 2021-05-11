<?php
if(isset($_POST['send_message'])){
	$sender_id = $userid;
	$recepient_id = mysqli_real_escape_string($con, $_POST['recepient']);
	$message = mysqli_real_escape_string($con, $_POST['message']);
	$date = date('Y-m-d');
	$sender_category = 'admin';
	$recepient_category = 'admin';

	$insert = "INSERT INTO `message` (`id`,`sender_id`,`sender_category`,`message`,`recepient_id`,`recepient_category`,`date`) 
	VALUES('','$sender_id', '$sender_category' ,'$message', '$recepient_id','$recepient_category','$date')";
	$insert_query = mysqli_query($con, $insert);

	if($insert_query){
		echo "<script type ='text/javascript'>alert('Message Sent')</script>";
		echo "<script type='text/javascript'> window.location.href='message.php';</script>";

	}
}	

if(isset($_POST['reply_message'])){
	$sender_id = $userid;
	$recepient_id = mysqli_real_escape_string($con, $_POST['recepient']);
	$recepient_category = mysqli_real_escape_string($con, $_POST['recepient_category']);
	$reply = mysqli_real_escape_string($con, $_POST['reply']);
	$date = date('Y-m-d');
	$sender_category = 'admin';

	$insert = "INSERT INTO `message` (`id`,`sender_id`,`sender_category`,`message`,`recepient_id`,`recepient_category`,`date`) 
	VALUES('','$sender_id', '$sender_category','$reply', '$recepient_id','$recepient_category','$date')";
	$insert_query = mysqli_query($con, $insert);

	if($insert_query){
		echo "<script type ='text/javascript'>alert('Message Replied')</script>";
		echo "<script type='text/javascript'> window.location.href='message.php';</script>";

	}
}	
?>