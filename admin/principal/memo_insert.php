<?php
require_once('header.php');
require_once('../../fpdf/fpdf.php');

if(isset($_POST['preview_memo'])){
  echo "<script type='text/javascript'>window.location.href='memo_template.php';</script>";
}


if(isset($_POST['send_memo'])){

  $sender_id = $userid;
    $sender_category = "admin";//this is different for each staff
    //$message = strip_tags(mysqli_real_escape_string($con,$_POST['message']));
    $date = date('Y-m-d');
    $time = date('h-i-s');

    $select = "SELECT `name` FROM `$sender_category` WHERE `id` = '$sender_id'";
    $select_query = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($select_query);

    $name = $row['name'];
    $new_name = $name.$date.$time;//the unique name of the memo file

    if($_FILES['file']){
      $file = $_FILES['file'];
      $name = $file['name'];
      $tmp_name = $file["tmp_name"];
      $file_ext  = explode("." , $name);
    $file_ext = strtolower(end($file_ext)); // to select the last item in the file_ext array in small letters

    $allowed = array('doc');
    if(in_array($file_ext, $allowed)){//to check f the file extension is in the allowed array
      $dir = "../../memo/".$new_name.".".$file_ext;
      $db_filename = $new_name.".".$file_ext;
    if($file["size"] > 0){//ensure the file isnt empty

      if(move_uploaded_file($tmp_name, $dir)){
    //send info to database

        
        

        if(isset($_POST['subject_staff_recepient'])){

          
          $total_substaff = "";

          foreach($_POST['subject_staff_recepient'] AS $subjectstaff){
            $total_substaff = $total_substaff . $subjectstaff .",";


          }
        }else{
          $total_substaff = "";
        }
        if(isset($_POST['class_staff_recepient'])){
          $total_clstaff="";

          foreach($_POST['class_staff_recepient'] AS $class_staff){
            $total_clstaff = $total_clstaff . $class_staff . ",";
          }
        }else{
          $total_clstaff="";
        }

        $total_staff = $total_clstaff.$total_substaff;
        

        if(isset($_POST['account_recepient'])){
          $total_accountstaff = "";
          foreach($_POST['account_recepient'] AS $accountstaff){
            $total_accountstaff = $total_accountstaff . $accountstaff . "," ;


          }

        }else{
          $total_accountstaff = "";
        }

        if(isset($_POST['admin_recepient'])){
          $total_adminstaff = "";
          foreach($_POST['admin_recepient'] AS $adminstaff){
            $total_adminstaff = $total_adminstaff . $adminstaff. ",";

          }

        }else{
          $total_adminstaff = "";
        }
        if(isset($_POST['signed_by'])){
          $signatory_id = $_POST['signed_by'];
        }

        if(isset($_POST['subject_staff_recepient']) || isset($_POST['class_staff_recepient']) || isset($_POST['account_recepient']) || isset($_POST['admin_recepient'])){
          $not_signed = "Not signed";
          $insert = "INSERT INTO `memo` 
          (`id`, `sender_id`, `sender_category`,`filename`, `teachers_id`, `account_id`, `admin_id`,`signatory_id`,`signature`)
          VALUES('','$sender_id', '$sender_category', '$db_filename', '$total_staff', '$total_accountstaff', '$total_adminstaff', '$signatory_id', '$not_signed')";
          $query_insert = mysqli_query($con, $insert);

          if($query_insert){
            echo "<script type='text/javascript'>alert('Memo Sent out for signing')</script>";
            echo "<script type='text/javascript'> window.location.href='memo.php';</script>";
          }
        }

      }else   {
        echo "<script type='text/javascript'>alert('Couldn't upload memo. Please try again!!!')</script>";
        echo "<script type='text/javascript'> window.location.href='memo.php';</script>";
      }
    }

  }else{
    echo "<script type='text/javascript'> alert('The only format allowed is .doc');</script>";
    echo "<script type='text/javascript'> window.location.href='memo.php';</script>";
  }


} else{
  echo "<script type='text/javascript'> alert('Not Set');</script>";

}
}

if(isset($_POST['sign_memo'])){

  //to get the signature of the signer 


  $select_sign = "SELECT `signature` FROM `admin` WHERE `id`='$userid'";
  $query_select_sign = mysqli_query($con, $select_sign);
  $row_signer = mysqli_fetch_assoc($query_select_sign);
  $sign_url = $row_signer['signature'];

  if($sign_url == ''){
    echo "<script type='text/javascript'>alert('You have not added your signature!!! Please go to your profile page')</script>";
    echo "<script type='text/javascript'>window.location.href='memo.php'</script>";
  }else{

    $date = date('Y-m-d');
    $memo_id = $_POST['memo_id'];
    $filename = $_POST['filename'];

    $signature_url = "../../signature/".$sign_url;
    $file = "../../memo/".$filename;
    $main_filename = explode(".", $filename);
    $new_filename = "../../memo/".$main_filename[0].".pdf";

  //convert the memo from word to pdf

    $pdf = new FPDF('P', 'mm', 'A5');
   $pdf->SetFont( 'Arial', 'B', '10' );//setting the font 
   $handle = fopen($file, "r");
   if ($handle) {

     $pdf -> AddPage();
         $pdf->Ln(5);//to allow the "signature " text to align with the signature

         $pdf->Cell( '','' , "MEMO" ,'0' ,'0' ,'C' );    
    $pdf->Ln(15);//to allow the "signature " text to align with the signature

    $pdf->Cell( '','' , "Signature:" ,'0' ,'0' ,'L ' );    
    $pdf ->Image($signature_url, '40','20 ','50','20');//inserting the signature
    $pdf -> Write(10, "From: ");
    $pdf->Ln(10);//to give enough allowance befire the first text

       $pdf->SetFont( 'Times', '', '10  ' );//setting the font 

       while (($line = fgets($handle)) !== false) {
        $pdf ->Ln('Memo');
        $pdf -> Write(8, $line);

      }
      
      $pdf->Output($new_filename, "F");

    } else {
    // error opening the file.
    }
    fclose($handle);

    $sign_memo = "UPDATE `memo` SET `signature` = 'Signed', `date` = '$date' WHERE `id` = '$memo_id'";
    $query_sign = mysqli_query($con, $sign_memo);
    if($query_sign){
      unlink(realpath($file));
      echo "<script type = 'text/javascript'>alert('Memo Signed')</script>";
      echo "<script type='text/javascript'>window.location.href='memo.php';</script>";
    }

  }

}

?>