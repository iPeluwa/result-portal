<?php include_once 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Parent Create</li>
      </ol>
      <div class="row">
        <div class="col-12">
           <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register a new student profile</div>
      <div class="card-body">
      <?php
  include_once '../connection.php';

  $error = false;

  if ( isset($_POST['btn-signup']) ) {

   $fname = trim($_POST['fname']);
       $lname = trim($_POST['lname']);
       $gender = trim($_POST['gender']);
       $bday = trim($_POST['bday']);
       $email = trim($_POST['email']);
       $upass = trim($_POST['password']);

    // if there's no error, continue to signup
    if( !$error ) {

     $query = "INSERT INTO `students`(`fname`, `lname`, `gender`, `birthday`, `email`, `password`) VALUES ('$fname','$lname','$gender','$bday','$email','$upass')";
      $res = mysql_query($query);

      if ($res) {
        $errTyp = "success";
        $errMSG = "Successfully Created Teacher..";
        unset($name);
        unset($session);
              // unset($amount);

        // unset($status);
      } else {
        $errTyp = "danger";
        $errMSG = "Something went wrong, try again later...";
      }

    }


  }
?>
<?php

                      if ( isset($errMSG) ) {

                        ?>
                        <div class="form-group">
                              <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
                        <span class="fa fa-cog"></span> <?php echo $errMSG; ?>
                                </div>
                              </div>
                                <?php
                      }
                      ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">First name</label>
                <input class="form-control" type="text" name="fname" placeholder="Enter first name">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Last name</label>
                <input class="form-control" type="text" name="lname" placeholder="Enter last name">
              </div>
            </div>
          </div>
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Gender</label>
                <br>
                Male <input type="radio" name="gender" value="M">
                 Female <input  type="radio" name="gender" value="F">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Birthday</label>
                <input class="form-control" type="date" name="bday">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Email">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password">
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit" name="btn-signup">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include_once 'footer.php'; ?>