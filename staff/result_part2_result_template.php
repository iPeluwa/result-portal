<?php
include '../dbConfig.php';
include"../connection.php";
session_start();
if(!isset($_SESSION['TEACHER_ID'])){
    header("location: index.php");
}
$userid =$_SESSION['TEACHER_ID'];
$username =$_SESSION['TEACHER_NAME'];
$email =$_SESSION['TEACHER_EMAIL'];
$category =$_SESSION['TEACHER_CAT'];

$class = $_GET['class'];
//get records from database
  $query = $db->query("SELECT * FROM student WHERE class_id=$class"); 

if($query->num_rows > 0){
    $delimiter = ",";
    $filename ="TestPortal_" . date('Y-m-d') . ".csv";

    //create a file pointer
    $f = fopen('php://memory', 'w');

    //set column headers
     $fields = array('Adm No','Firstname','Lastname', 'NoteMark', 'ProjectMark','TestMark','Examination');
    fputcsv($f, $fields, $delimiter);

    //output each row of the data, format line as csv and write to file pointer
    
    while($row = $query->fetch_assoc()){
        $lineData = array($row['adm_no'],$row['fname'],$row['lname'],0,0,0,0);
        fputcsv($f, $lineData, $delimiter);
    }


    //move back to beginning of file
    fseek($f, 0);

    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
      header('Content-Disposition: attachment; filename="'.$filename.'";');

    //output all remaining data on a file pointer
    fpassthru($f);
}else{
    echo"<script type='text/javascript'> alert('There are no students in this class')</script>";
    echo"<script type='text/javascript'>window.location.href='home.php' </script>";

}
exit;

?>
