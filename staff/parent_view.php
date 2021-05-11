<?php include_once 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tables</li>
      </ol>

      <div class="row pull-right">
        <div class="col-7 offset-1  ">
          <!-- <a href="staff_category.php" class="text-primary">Edit Staff Categories</a> -->
        </div>
                <button type="button"data-toggle="modal" data-target="#choose" class="btn btn-primary">
                      Choose Existing Parent
               </button>
                   <div class=" offset-1">
          <!-- <a href="staff_category.php" class="text-primary">Edit Staff Categories</a> -->
        </div>
                <button type="button"data-toggle="modal" data-target="#create" class="btn btn-primary">
                      Create Parents
               </button>
         
                 </div>

      <!-- Example DataTables Card-->
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Relation</th>
                  <th>Gender</th>
                  <th>Phone</th>
                  <th>Email</th>
                </tr>
              </thead>
             
              <tbody>
                 <?php
                                                  $sql="SELECT * FROM parents WHERE `child_class_id`='$classroom_id'";
                                                        $qry1=mysqli_query($con,$sql);
                                                      while($re=mysqli_fetch_assoc($qry1))
                                                      {
                                                      ?>
                <tr>
                  <td><?php echo $re['name'];?></td>
                  <td><?php echo $re['relation'];?></td>
                  <td><?php echo $re['gender'];?></td>
                  <td><?php echo $re['phone'];?></td>
                  <td><?php echo $re['email'];?></td>
                </tr>
                 <?php
                                                  }
                                                  ?>
              </tbody>
            </table>
          </div>
      </div>

   <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="delete">Create Parent Profile</h5>
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
                <label for="exampleInputName">Name</label>
                <input class="form-control" type="text" name="name" required="required" placeholder="Enter name">
              </div>
             
              <div class="col-md-6">
                <label for="exampleInputName" required="required" >Gender</label>
                <br>
                Male <input type="radio" name="gender" value="M">
                 Female <input  type="radio" name="gender" value="F">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputLastName">Relation</label>
                <select class="form-control" type="text" required="required"  name="relation">
                  <option>Parents</option>
                  <option>Guardian</option>

                </select>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Phone Number</label>
                <input class="form-control" type="number" min = "1" oninput = "validity.valid || (value = '')" required="required"  name="phonenumber"/>
                 
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Email</label>
                <input class="form-control" type="email" name="email" required="required"  placeholder="Email">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Password</label>
                <input class="form-control" type="password" name="password" required="required"  placeholder="Password">
              </div>
                          </div>
          </div>
            <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="parent-signup">Create</button>
        </div>
        </form>
          </div>
        </div>
      </div>
    </div>

    </div>

    <div class="modal fade" id="choose" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="delete">Create Parent Profile</h5>
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
                <label for="exampleInputName">Parent's Email</label>
                <input class="form-control" type="email" required="required"  name="email" placeholder="Enter Parent's email">
              </div>
             
              
          </div>
            <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="choose_parent">Create</button>
        </div>
        </form>
          </div>
        </div>
      </div>
    </div>
</div>
              <?php include("add.php"); ?> 

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include_once 'footer.php'; ?>