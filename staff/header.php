<?php
//include"../connect.php";
include"../connection.php";
session_start();
if(!isset($_SESSION['TEACHER_ID'])){
    header("location: index.php");
}
$userid =$_SESSION['TEACHER_ID'];
$username =$_SESSION['TEACHER_NAME'];
$email =$_SESSION['TEACHER_EMAIL'];
$category =$_SESSION['TEACHER_CAT'];
$phone = $_SESSION['TEACHER_NUMBER'];
$class = "SELECT * FROM `classes` WHERE teacher_id='$userid'";
$query_class = mysqli_query($con,$class);
$num_rows = mysqli_num_rows($query_class);
if($num_rows >= 1 ){
while ($query1 = mysqli_fetch_assoc($query_class)){ 
$classroom_id= $query1 ['id'];
$classroom= $query1 ['class'];
}
}else{
  $classroom = "No Class Yet";
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
    <a class="navbar-brand" href="home.php">Teachers</a>
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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My subject">
          <a class="nav-link" href="subjects.php">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text">My Subject</span>
          </a>
          <?php
           if ($category == "1") echo '
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Students">
          <a class="nav-link" href="students.php">
            <i class="fa fa-fw fa-list-alt"></i>
            <span class="nav-link-text">My Students</span>
          </a>
        </li>';
                    if ($category == "1" )  echo '
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Parents">
          <a class="nav-link" href="parent_view.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Parents</span>
          </a>
        </li>';
        elseif ($category == "2");

                    if ($category == "1" )  echo '
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Class">
          <a class="nav-link" href="class.php">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">My Class</span>
          </a>
        </li>';
        elseif ($category == "2") echo '
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Students">
          <a class="nav-link" href="students.php">
            <i class="fa fa-fw fa-list-alt"></i>
            <span class="nav-link-text">My Students</span>
          </a>
        </li>';
                    ?>

       
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Upload Result">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseterm1" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-cloud-upload"></i>
            <span class="nav-link-text">Upload Result</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseterm1">
            <li>
              <a href="term1_upload.php">First Term</a>
            </li>
            <li>
              <a href="term2_upload.php">Second Term</a>
            </li>
            <li>
              <a href="term3_upload.php">Third Term</a>
            </li>
          </ul>
        </li>
        </li>

        <?php if($category == "1"){ ?>
             <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Promote">
          <a class="nav-link" href="promote.php">
            <i class="fa fa-fw fa-"></i>
            <span class="nav-link-text">Promote</span>
          </a>
        </li>

<?php } ?>
              
           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Memos">
          <a class="nav-link" href="memo.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Memos</span>
          </a>
        </li>    
  
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="HOD's Report">
          <a class="nav-link" href="hod_report.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">HOD's Report</span>
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
       
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Advance Request Form ">
          <a class="nav-link" href="advance_request.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Advance Request Form</span>
          </a>
        </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Message">
          <a class="nav-link" href="message.php">
            <i class="fa fa-fw fa-codepen"></i>
            <span class="nav-link-text">Message</span>
          </a>
        </li>
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