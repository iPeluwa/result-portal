<?php include_once '../connection.php';
session_start();
if(!isset($_SESSION['ACCOUNTS_ID'])){
 header("location: index.php");
}
$userid =$_SESSION['ACCOUNTS_ID'];
$username =$_SESSION['ACCOUNTS_NAME'];
$email =$_SESSION['ACCOUNTS_EMAIL'];
$phone =$_SESSION['ACCOUNTS_PHONE'];
$Userposition = $_SESSION['ACCOUNTS_POSITION'];
 ?>