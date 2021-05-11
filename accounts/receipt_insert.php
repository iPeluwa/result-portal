<?php
require_once('pdfheader.php');
require_once('../fpdf/fpdf.php');

if(isset($_POST['create_receipt'])){
	$issued_by = $userid;

	$date = date('Y-m-d');
	$time = date('H-i-s');
	$received_from = strip_tags(mysqli_real_escape_string($con, $_POST['received_from']));
	$money_in_naira = strip_tags(mysqli_real_escape_string($con, $_POST['money_naira']));
	$money_in_kobo = strip_tags(mysqli_real_escape_string($con, $_POST['money_kobo']));

	$amount_in_words= $money_in_naira." naira and ".$money_in_kobo." kobo"; 
	$amount_in_number = $_POST['money_naira'];

	$payment_for = strip_tags(mysqli_real_escape_string($con, $_POST['payment_for']));
	if(isset($_FILES)){

		$file = $_FILES['file'];
		$filename = $file['name'];
		$get_ext = explode(".",$filename);
		$ext = end($get_ext);
		$allowed = array('jpg', 'png');

		if(in_array($ext, $allowed)){
			$tmp_name = $file['tmp_name'];
			$dir = '../customer_signature/';
			$new_name = $dir.$received_from."_".$date.$time.".".$ext;
			$pdf_new_name = $received_from."_".$date.$time.".pdf";
			$customers_signature = $new_name;
			if(move_uploaded_file($tmp_name, $new_name)){

				$insert_receipt = "INSERT INTO `receipt` 
				(`id`,`issued_by`,`received_from`, `amount_in_words`, `amount_in_number`, `payment_for`,`customer_sign`,`account_sign`,`filename`,`date`)
				VALUES('','$issued_by','$received_from','$amount_in_words', '$amount_in_number', '$payment_for','$new_name', 'Signed','$pdf_new_name','$date')";

				$query_insert = mysqli_query($con, $insert_receipt);
				if($query_insert){


					$select_sign = "SELECT `signature` FROM `accounts` WHERE `id` = '$userid'";
					$query_sign = mysqli_query($con, $select_sign);
					$row_sign = mysqli_fetch_assoc($query_sign);
					$sign_url = $row_sign['signature'];

					if($sign_url == ''){
						echo "<script type='text/javascript'>alert('You have not added your signature yet!! Please go to your profile page')</script>";
						echo "<script type='text/javascript'>window.location.href='receipt.php';</script>";
					}else{
						$accounts_signature ="../signature/".$sign_url;

						$fpdf = new FPDF('P','mm', 'A5');
						$fpdf -> SetFont('Arial', 'B', '20');
						$fpdf -> AddPage();
						$fpdf -> Cell( '','' , "Receipt" ,'0' ,'0' ,'C' );    
						$fpdf -> Ln(25);
		//signature
						$fpdf -> SetFont('Times', 'B', '15');
						$fpdf -> Cell('','',"Customer's Signature: ",'0','0','L');
						$fpdf -> Image($customers_signature,'65','30','25');
						$fpdf -> Ln(10);

						$fpdf -> Cell('','',"Account's Signature: ",'0','0','L');
						$fpdf -> Image($accounts_signature,'65','40','25');
						$fpdf -> Ln(10);
		//receipt body
						$fpdf -> SetFont('Times', 'B', '15');
						$fpdf -> Cell( '','' , "Received from: ".  $received_from ,'0' ,'0' ,'L' );    
		//$fpdf -> SetFont('Times', 'U', '15');
		//$fpdf -> Cell( '','' , $received_from,'0' ,'0' ,'L' );   
						$fpdf -> Ln(15);

						$fpdf -> SetFont('Times', 'B', '15');
						$fpdf -> Cell( '','' , "The Sum/ Cheque of:",'0' ,'0' ,'L' );    
						$fpdf -> Write( '8',$money_in_naira." Naira and ". $money_in_kobo." kobo");    

		//$fpdf -> SetFont('Times', 'U', '15');
		//$fpdf -> Cell( '','' , $money_in_naira." Naira and ",'0' ,'0' ,'L' );  
		//$fpdf -> Cell( '','' , $money_in_kobo." kobo",'0' ,'0' ,'L' );  
						$fpdf -> Ln(15);

						

						$fpdf -> SetFont('Times', 'B', '15');
						$fpdf -> Cell( '','' , "Date ". $date  ,'0' ,'0' ,'L' );    
		//$fpdf -> SetFont('Times', '', '15');

						$fpdf -> Ln(15);


						$fpdf -> Cell( '','' , "# ". $amount_in_number,'0' ,'0' ,'R' ); 
						$fpdf -> Ln(15);

						$fpdf -> SetFont('Times', 'B', '15');
						$fpdf -> Cell( '','' , "Being Payment for: ",'0' ,'0' ,'L' );    
						$fpdf -> Write('8', $payment_for );

		//$fpdf -> SetFont('Times', '', '15');
		//$fpdf -> Cell( '','' , $payment_for,'0' ,'0' ,'L' );   
						$fpdf -> Ln(15);

						$fpdf -> Output("receipt.pdf", "I");
						$fpdf -> Output("../receipt/".$pdf_new_name, "F");
						if($fpdf){
							echo "<script type='text/javascript'>alert('Receipt Created !!')</script>";
							
						}
					}
				}else{
					echo "<script type='text/javascript'>alert('Couldnt resolve the customer signature!!! Please try again ')</script>";
					echo "<script type='text/javascript'>window.location.href='receipt.php';</script>";
				}

			}else{
				echo "<script type='text/javascript'>alert('Something Went Wrong !!! Please try again ')</script>";
				echo "<script type='text/javascript'>window.location.href='receipt.php';</script>";
			}

		}else{
			echo "<script type='text/javascript'>alert('Only jpg and png files are allowed')</script>";
			echo "<script type='text/javascript'>window.location.href='receipt.php';</script>";
		}


	}
}
?>