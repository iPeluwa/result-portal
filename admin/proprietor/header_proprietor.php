<?php include_once '../../connection.php';
session_start();
$admin_category = $_SESSION['PROPRIETOR_CATEGORY'];
if(!isset($_SESSION['PROPRIETOR_ID'])){
 header("location: ../index.php");
}
$userid =$_SESSION['PROPRIETOR_ID'];
$username =$_SESSION['PROPRIETOR_NAME'];
$email =$_SESSION['PROPRIETOR_EMAIL'];
$phone =$_SESSION['PROPRIETOR_PHONE'];
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
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="home_proprietor.php">Proprietors</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="home_proprietor.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Profile">
          <a class="nav-link" href="profile.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">My Profile</span>
          </a>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Vouchers">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#voucher" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-cloud-upload"></i>
            <span class="nav-link-text">Vouchers</span>
          </a>
          <ul class="sidenav-second-level collapse" id="voucher">
            
            <li>
              <a href="payment_voucher.php">Payment Voucher</a>
            </li>
            <li>
              <a href="petty_cash_voucher.php">Petty Cash Voucher</a>
            </li>
            
          </ul>
        </li>

        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Principal's Reports">
          <a class="nav-link" href="principals_report.php">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text">Principals's Reports</span>
          </a>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Teachers">
          <a class="nav-link" href="teachers.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Teachers</span>
          </a>
        </li>
        
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="General School Upkeep">
          <a class="nav-link" href="school_upkeep.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">General School Upkeep</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Advance Request Form">
          <a class="nav-link" href="advance_request.php">
            <i class="fa fa-fw fa-codepen"></i>
            <span class="nav-link-text">Advance Request Form</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
          <a class="nav-link" href="message.php">
            <i class="fa fa-fw fa-codepen"></i>
            <span class="nav-link-text">Messages</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Settings">
          <a class="nav-link" href="settings.php">
            <i class="fa fa-fw fa-code-fork"></i>
            <span class="nav-link-text">Settings</span>
          </a>
        </li>
        
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
       
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
          </li>
          
        </ul>
      </div>
    </nav>

