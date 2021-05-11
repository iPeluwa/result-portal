<?php
include"../connection.php";
session_start();
if(!isset($_SESSION['PARENT_ID'])){
    header("location: index.php");
}
$userid =$_SESSION['PARENT_ID'];
$name =$_SESSION['PARENT_NAME'];
$relation =$_SESSION['PARENT_RELATION'];
$email =$_SESSION['PARENT_EMAIL'];
$phone =$_SESSION['PARENT_PHONE'];




$selec = "SELECT * FROM `student` WHERE `parent_id` = '$userid' ORDER BY `id` DESC";
$query_selec = mysqli_query($con,$selec);

$num_row = mysqli_num_rows($query_selec);
$catch = mysqli_fetch_assoc($query_selec);

if($num_row == 1){
  $child_id = $catch['id'];
}

if($num_row > 1){
  if(isset($_POST['choose_child']))
  {
  $child_id = $_POST['child_id']; 
  if($child_id){
  }
}else{
    $child_id = $catch['id'];

}
}

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

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="home.php">RMSP</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="home.php?id=<?php echo $child_id;?>">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
          <a class="nav-link" href="student_profile.php?id=<?php echo $child_id; ?>">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">My Child's Profile</span>
          </a>
        </li>


        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Result">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseterms" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">My Child's Result</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseterms">

             <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Result">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseterms1" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">First Term</span>
          </a>
          <ul class="sidenav-third-level collapse" id="collapseterms1">
            <li>
              <a href="student_result_term1_mid.php?id=<?php echo $child_id; ?>">Mid - Term</a>
              <a href="student_result_term1.php?id=<?php echo $child_id; ?>">End of Term</a>
            </li>
            
          </ul>
        </li>

              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Result">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseterms2" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Second Term</span>
          </a>
          <ul class="sidenav-third-level collapse" id="collapseterms2">
            <li>
              <a href="student_result_term2_mid.php?id=<?php echo $child_id; ?>">Mid - Term</a>
              <a href="student_result_term2.php?id=<?php echo $child_id; ?>">End of Term</a>
            </li>
            
          </ul>
        </li>
            
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Result">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseterms3" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Third Term</span>
          </a>
          <ul class="sidenav-third-level collapse" id="collapseterms3">
            <li>
              <a href="student_result_term3_mid.php?id=<?php echo $child_id; ?>">Mid - Term</a>
              <a href="student_result_term3.php?id=<?php echo $child_id; ?>">End of Term</a>
            </li>
            
          </ul>
        </li>

          </ul>
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
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-cog"></i>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
              <a href="settings.php"> Settings</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>