<?php include_once ('header.php');
      include_once('../connection.php');
 ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Dashboard</a>
                  </li>
        <!-- <li class="breadcrumb-item active">Blank Page</li> -->
      </ol>
       <div class="row pull-right">
        <div class="col-7 offset-1">
          <!-- <a href="staff_category.php" class="text-primary">Edit Staff Categories</a> -->
        </div>
                <button type="button"data-toggle="modal" data-target="#create" class="btn btn-primary">
                      Create Student
               </button>
                <div class="offset-1">
          <!-- <a href="staff_category.php" class="text-primary">Edit Staff Categories</a> -->
        </div>
                <button type="button"data-toggle="modal" data-target="#delete" class="btn btn-primary">
                      Delete Student
               </button>
                 </div>
         <table class="table table-user-information">
                                  <table class="table table-striped table-bordered table-hover">
                                          <thead>
                          <tr>
                             <th>ADM NO</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Birthday</th>
                            <th>Email</th>
                            </tr>
                      </thead>
                      <tbody>
                          <?php
                          $sql="SELECT * FROM student WHERE class_id=$classroom_id";
                          $qry1=mysqli_query($con,$sql);
                          while($re=mysqli_fetch_assoc($qry1))
                          {
                          ?>
                <tr>
                  <td><?php echo $re['adm_no'];?></td>
                  <td><?php echo $re['fname'];?></td>
                  <td><?php echo $re['lname'];?></td>
                  <td><?php echo $re['gender'];?></td>
                  <td><?php echo $re['birthday'];?></td>
                  <td><?php echo $re['email'];?></td>
                </tr>
                 <?php } ?>
                      </tbody>
                    </table>
         </div>
    </div>
  </div>
            </div> 
        </div>
      </div>
  </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="delete">Delete Student Profile</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <!-- Change email section -->
               <div class="col-10 offset-1" id="delete_student">
                  <form action="" method="post">
          
          <div class="form-group">
              <div class="col-md-8 offset-2">
                <label for="exampleInputPassword1">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Email" required ="required" >
              </div>
            
            </div>
     
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="delete_student">Delete</button>
        </div>
        </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="delete">Create Student Profile</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <!-- Change email section -->
               <div class="col-10 offset-1" id="change_email">
                  <form action="" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">First name</label>
                <input class="form-control" required ="required" type="text" name="fname" placeholder="Enter first name">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Last name</label>
                <input class="form-control" required ="required" type="text" name="lname" placeholder="Enter last name">
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
                <input class="form-control" required ="required" type="date" name="bday">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Email</label>
                <input class="form-control" type="email" required ="required" name="email" placeholder="Email">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Password</label>
                <input class="form-control" type="password" required ="required" name="password" placeholder="Password">
              </div>
              <div class="col-md-12">
                <label for="exampleConfirmPassword">Select Parent</label>
                <select class="form-control" required ="required" type="text" name="parent_id">
                  <?php
                          $get = "SELECT * FROM parents WHERE `child_class_id`='$classroom_id'";
                          $query_get = mysqli_query($con,$get);
                          while ($array = mysqli_fetch_assoc($query_get)) {
                          echo "<option value='{$array['id']}'>{$array['name']}</option>";
                            }
                            ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class = "form-row">
          <div class="col-md-6">
           <input class="form-control" name="class_id" type="hidden"  value="<?php echo $classroom_id; ?>"></option>  
              </div>

               <div class="col-md-6">
           <input type="number" class = "form-control" name="adm_no" min = "1" oninput = "validity.valid||(value = '')" placeholder="ADM No" />
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="btn-signup">Create</button>
        </div>
        </form>
          </div>
        </div>
      </div>
    </div>
          

  
            <?php include("add.php"); ?> 

    <?php include_once 'footer.php'; ?>