
<?php require_once ('header.php');
require_once('../online_connection.php');
require_once('settings_insert.php');

?>
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="home.php">Dashboard</a>

      </li>

    </ol>
    <div class="row pull-right">
      <div class="col-2 offset-6">
        <!-- <a href="staff_category.php" class="text-primary">Edit Staff Categories</a> -->
      </div>
      <button data-toggle="modal" data-target="#change_password" class="btn btn-primary pull-right">Change Password</button> 
    </div>
    <div class="row">
      <div class="col-12">

        <h1>Update Admin Information</h1>

        <table class="table table-user-information">
          <tbody class="col-4">
            <tr>
              <td>Name</td>
              <td>
                <?php echo $name; ?> </td>
                <td>  <button data-toggle="modal" data-target="#change_name" class="btn btn-primary pull-right">Change Name</button> </td>
              </tr>
              <tr>
                <td>Email</td>
                <td>  <?php echo $email; ?></td>
                <td>  <button data-toggle="modal" data-target="#change_email" class="btn btn-primary pull-right">Change Email </button></td>
              </tr>
              <tr>
                <td>Phone Number:</td>
                <td>  <?php echo $phone; ?></td>
                <td>  <button data-toggle="modal" data-target="#change_number" class="btn btn-primary pull-right">Change Number</button></td>
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
    <div class="modal fade" id="change_name" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change Name</h5>
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
                 <label for="exampleInputPassword1">Name</label>
                 <input class="form-control" type="text" name="name" required = "required" placeholder="Enter name">
               </div>

               <div class="col-md-6">
                 <label for="exampleInputPassword1">Password</label>
                 <input class="form-control" type="password" name="password" required = "required" placeholder="Enter password">
               </div>
             </div>

           </div>

           <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit" name="change_admin_name">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> 
</div>


<div class="modal fade" id="change_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Email</h5>
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
             <label for="exampleInputPassword1">New Email</label>
             <input class="form-control" type="email" name="new_email" required = "required" placeholder="Enter new email">
           </div>

           <div class="col-md-6">
             <label for="exampleInputPassword1">Password</label>
             <input class="form-control" type="password" name="password" required = "required" placeholder="Enter password">
           </div>
         </div>

       </div>

       <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" type="submit" name="change_admin_email">Create</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
</div>

<div class="modal fade" id="change_number" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Phone number</h5>
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
             <label for="exampleInputPassword1">Phone number</label>
             <input class="form-control" type="number" name="number" min = "1" required = "required" oninput = "validity.valid || (value = '')" placeholder="Enter new number">
           </div>

           <div class="col-md-6">
             <label for="exampleInputPassword1">Password</label>
             <input class="form-control" type="password" name="password" required = "required" placeholder="Enter password">
           </div>
         </div>

       </div>

       <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" type="submit" name="change_admin_number">Create</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
</div>

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
             <input class="form-control" type="password" name="old_password" required = "required" placeholder="Enter old password">
           </div>

           <div class="col-md-6">
             <label for="exampleInputPassword1">New Password</label>
             <input class="form-control" type="password" name="new_password" required = "required" placeholder="Enter new password">
           </div>
         </div>

       </div>

       <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" type="submit" name="change_admin_password">Create</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
</div>