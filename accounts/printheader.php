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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Result Management System Portal</title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body class="" id="page-top">
  <!-- Navigation-->
 
