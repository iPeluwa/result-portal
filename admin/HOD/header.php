<!--It is only the database manager that can add any official.i.e proncipal ,proprietor,HOD !-->
<?php include_once '../../connection.php';
session_start();
$admin_category = $_SESSION['HOD_CATEGORY'];
if(!isset($_SESSION['HOD_ID'])){
 header("location: ../index.php");
}
$userid =$_SESSION['HOD_ID'];
$username =$_SESSION['HOD_NAME'];
$email =$_SESSION['HOD_EMAIL'];
$phone =$_SESSION['HOD_PHONE'];


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
    <a class="navbar-brand" href="home.php">HOD</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="home.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Profile">
          <a class="nav-link" href="home.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">My Profile</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Memos">
          <a class="nav-link" href="memo.php">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Memos</span>
          </a>
        </li>

        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Principal's Reports">
          <a class="nav-link" href="principals_report.php">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text">Principals's Reports</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Teacher's Report">
          <a class="nav-link" href="teachers_report.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Teacher's Reports</span>
          </a>
        </li>

        

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Advance Request Form">
          <a class="nav-link" href="advance_request.php">
            <i class="fa fa-fw fa-book"></i>
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
    
    


