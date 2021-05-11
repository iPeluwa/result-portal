<?php
include_once '../connection.php';
session_start();
if(!isset($_SESSION['DB_ID'])){
	header("location: index.php");
}

$delimiter = ",";
$filename ="classes_" . date('Y-m-d') . ".csv";

			    //create a file pointer
$f = fopen('php://memory', 'w');

			    //set column headers
$fields = array('Class','Super Class','Teachers Name');
fputcsv($f, $fields, $delimiter);

			    //output each row of the data, format line as csv and write to file pointer

			     //move back to beginning of file
fseek($f, 0);

			    //set headers to download file rather than displayed
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="'.$filename.'";');

			    //output all remaining data on a file pointer
fpassthru($f);

exit();


?>