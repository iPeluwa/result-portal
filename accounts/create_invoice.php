
<?php
require_once('../fpdf/fpdf.php');
require_once('../connection.php');
if(isset($_POST['create_invoice'])){
	$pick_stud = "SELECT * FROM `student`";
	$query_stud = mysqli_query($con, $pick_stud);
	$row_stud = mysqli_fetch_assoc($query_stud);

	$customer_name = ucfirst($row_stud['fname']) . " " . ucfirst($row_stud['lname']);
	$customer_id = $_POST['customer_id'];
	$username = $_POST['username'];
	$userid = $_POST['userid'];

	$select_sign = "SELECT `signature` FROM `accounts` WHERE `id` = '$userid'";
	$query_sign = mysqli_query($con, $select_sign);
	$row_sign = mysqli_fetch_assoc($query_sign);
	$sign_url = $row_sign['signature'];

	if($sign_url == ''){
		echo "<script type='text/javascript'>alert('You have not added your signature yet!! Please go to your profile page')</script>";
		echo "<script type='text/javascript'>window.location.href='invoice.php';</script>";
	}else{
		
		$signature_url = "../signature/".$sign_url; 

		
		$date = date('Y-m-d');

		$date = "Date: ".$date;
		$pdfusername = "Name: ".$username;

		$fpdf = new FPDF('P','mm', 'A4');
		$fpdf -> SetFont('Arial', 'B', '20');
		$fpdf -> AddPage();
		$fpdf -> Cell( '','' , "Invoice" ,'0' ,'0' ,'C' );    
		$fpdf -> Ln(15);
		//heading info
		$fpdf -> Cell('','',"Signature: ",'0','0','L');
		$fpdf -> Image($signature_url,'50','20','25');
		$fpdf -> Ln(10);

		$fpdf -> Cell('','',$date,'0','0','L');
		$fpdf -> Ln(10);
		$fpdf -> Cell('','',$pdfusername,'0','0','L');
		$fpdf -> Ln(10);

//set table heads
		$fpdf -> Cell('60','10',"Product ",'1','0','C');
		$fpdf -> Cell('40','10',"Price",'1','0','C');
		$fpdf -> Cell('40','10',"Quantity",'1','0','C');
		$fpdf -> Cell('40','10',"Total",'1','0','C');
		$fpdf -> Ln(10);

		$fpdf -> SetFont('Times', '', '10');

		$invoice_id = $_POST['invoice_id'];
//dont forget to correct the update statement
		$date = date('Y-m-d');
		$time = date('h-i-s');
		$filename = $customer_name."_".$username."_".$date.$time.".pdf";

		$update_invoice = "UPDATE `invoice` SET 
		`signature` = 'Signed',
		`signatory_id` = '$userid',
		`customer_id` = '$customer_id',
		`filename` = '$filename',
		`date` = '$date'
		WHERE `id` = '$invoice_id'";

		$query_update = mysqli_query($con, $update_invoice);
		if($query_update){
			$select_invoice = "SELECT * FROM `invoice` WHERE `id` = '$invoice_id'";
			$query_select = mysqli_query($con, $select_invoice);

			if($query_select){
				$row  = mysqli_fetch_assoc($query_select);
				$product_and_qty = $row['product_and_qty'];


			$product_and_quantities = explode(",", $product_and_qty);//to get each product and quantity combination

			$total_product_price = 0;

			foreach ($product_and_quantities as $each_prod_and_qty) {
				$product_quant = explode("_",$each_prod_and_qty);
				
				$product_id = $product_quant[0];
				$quantity = end($product_quant);

					//get the name of each material given their id 
				$get_prod_name = "SELECT `material`,`price` FROM `materials` WHERE `id` = '$product_id'";
				$query_get_prod_name = mysqli_query($con, $get_prod_name);
				$row_mat = mysqli_fetch_assoc($query_get_prod_name);
				$product_name = ucfirst($row_mat['material']);
				$product_price = $row_mat['price'];

				$print_price = "#".$row_mat['price'];
				$total =$product_price * $quantity;
				$total_product_price = $total_product_price + $total;

				$total = "#". $total;
					//write to pdf
				if($product_name != ''){
					$fpdf -> Cell('60','10',$product_name,'1','0','C');
					$fpdf -> Cell('40','10',$print_price,'1','0','C');
					$fpdf -> Cell('40','10',$quantity,'1','0','C');
					$fpdf -> Cell('40','10',$total,'1','0','C');
					$fpdf -> Ln(10);
				}
				
			}
			$fpdf -> SetFont('Times', 'B', '10');

			$fpdf -> Cell('40','10',"Total Price: ",'0','0','C');
			$fpdf -> Cell('40','10',"#".$total_product_price,'0','0','C');
			$fpdf -> Ln('5');
			$fpdf -> Cell('40','10',"Student Name: ",'0','0','C');
			$fpdf -> Cell('40','10',$customer_name,'0','0','C');	
			$fpdf -> Ln('5');
			
			$new_filename = "../invoice/".$filename;
			$fpdf->Output($filename, "I");
			$fpdf->Output($new_filename, "F");

		}

		echo "<script type='text/javascript'>alert('$invoice_id')</script>";
	}else{

		echo "<script type='text/javascript'>alert('Something Went Wrong!!! Please try again!!!')</script>";
		echo "<script type='text/javascript'>window.location.href='invoice.php';</script>";
	}

}
}else{
	echo "<script type='text/javascript'>window.location.href='invoice.php';</script>";
}
?>