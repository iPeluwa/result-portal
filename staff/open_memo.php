<?php

if(isset($_POST['check_memo']))
{
     if(isset($_POST['filename'])){
      $filename = $_POST['filename'];
      $file = "../memo/".$filename;
if (file_exists($file))
    {
    	echo "exists";
    header('Content-Description: File Transfer');
    header('Content-Type: application/vnd.ms-word');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
    }else{
	echo "Doesnt exist";
	echo $filename;
}
}else{
	echo "<script type='text/javascript'> alert('Something Went wrong!! Please try again')</script>";
}

}

if(isset($_POST['open_memo']))
{
     if(isset($_POST['filename'])){
      $filesname = $_POST['filename'];
      $file_array = explode(".", $filesname);
      $filename = $file_array[0];
      $file = "../memo/".$filename.".pdf";
if (file_exists($file))
    {
        echo "exists";
    header('Content-Description: File Transfer');
header('Content-Type: application/pdf');
header("Content-Transfer-Encoding: Binary");
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
    }else{
    echo "Doesnt exist";
   // echo $filename;
}
}else{
    echo "<script type='text/javascript'> alert('Something Went wrong!! Please try again')</script>";
}

}

?>