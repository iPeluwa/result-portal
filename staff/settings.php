
<?php
require_once('../online_connection.php');
 include_once ('header.php');
 require_once('../connection.php');

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
        <div class="col-2 offset-6">
          <!-- <a href="staff_category.php" class="text-primary">Edit Staff Categories</a> -->
        </div>
                                </div>
      <div class="row">




        <div class="col-12">

          <h1>Update Your Information</h1>

           <table class="table table-user-information">
                                  <tbody class="col-4">
                                      <tr>
                                          <td>Name</td>
                                          <td>
                                              <?php echo $username; ?> </td>
                                                                                  </tr>
                                      <tr>
                                          <td>Email</td>
                                          <td>  <?php echo $email; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Password</td>
                                          <td>  *********</td>
                                          <td>  <button data-toggle="modal" data-target="#change_password" class="btn btn-primary pull-right">Change Password</button></td>
                                      </tr>
                                     
                                    </table>
                                </div>
                              </div>
                             </tbody>
   						   </div>
   						 <!-- /.container-fluid-->
   				 <!-- /.content-wrapper-->

   		 <?php
   		  include_once 'footer.php';
   		   ?>

  <div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body"><!--Change Category Section -->
             <div class="col-10 offset-1" id="">
               <form method="post" action="">        
                <div class="form-group">
                 <div class="form-row">

                  <div class="col-md-6">
                   <label for="exampleInputPassword1">Old Password</label>
                    <input class="form-control" type="password" name="old_password" placeholder="Enter old password">
               </div>
            
              <div class="col-md-6">
               <label for="exampleInputPassword1">New Password</label>
                    <input class="form-control" type="password" name="new_password" placeholder="Enter new password">
              </div>
            </div>

            </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit" name="change_staff_password">Change</button>
        </div>
             </form>
             <?php   include('settings_insert.php'); ?>
          </div>
        </div>
    </div>
</div>
</div>