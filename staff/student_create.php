<?php include_once 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Student Create</li>
      </ol>
      <div class="row">
        <div class="col-12">
           <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register a new student profile</div>
      <div class="card-body">
      
        <form action="" method="post">
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
              <div class="col-md-12">
                <label for="exampleConfirmPassword">Select Parent</label>
                <select class="form-control" type="text" name="parent_id">
                  <?php
                          $state_result = mysql_query("SELECT * FROM parents");
                          while ($array = mysql_fetch_array($state_result)) {
                          echo "<option value='{$array['id']}'>{$array['name']}</option>";
                            }
                            ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
                <input class="hidden" type="text" name="class_id" value="<?php echo $classroom_id; ?>">
              </div>
          <button class="btn btn-primary btn-block" type="submit" name="btn-signup">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include("add.php"); ?> 
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include_once 'footer.php'; ?>