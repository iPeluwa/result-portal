
<?php include_once ('header.php');
require_once('../online_connection.php');
include_once('profile_insert.php'); ?>


<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="home.php">Dashboard</a>
      </li>
      <!-- <li class="breadcrumb-item active">Blank Page</li> -->
    </ol>
    <div class="row">




      <div class="col-12">
        <button data-toggle="modal" data-target="#create" class="btn btn-primary pull-right">Create New Admin</button>

        <h1>Admin Information</h1>

        <table class="table table-user-information">
          <tbody class="col-4">
            <tr>
              <td>Name</td>
              <td>
                <?php echo $name; ?> </td>
              </tr>
              <tr>
                <td>Email</td>
                <td>  <?php echo $email; ?></td>
              </tr>
              <tr>
                <td>Phone Number:</td>
                <td>  <?php echo $phone; ?></td>
              </tr>
              <tr>
                <td>Signature:</td>
                <td>
                  <?php 
                  if($signature_state == TRUE){
                    echo "Signature added";
                  }elseif($signature_state == FALSE){
                    echo "<button data-toggle='modal' data-target='#signature' class='btn btn-primary'>Add Signature</button>";
                  }
                  ?>
                </td>
              </tr>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include_once 'footer.php'; ?>

    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create New Admin</h5>
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
                 <input class="form-control" type="text" required="required" name="name" placeholder="Enter name">
               </div>
               <div class="col-md-6">
                 <label for="exampleInputPassword1">Email</label>
                 <input class="form-control" type="email" required="required" name="email" placeholder="Enter email">
               </div>
             </div>
           </div>
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="category">Category</label>
                <select class="form-control" name="category">
                 
                  <option value='Database Manager'>Database Manager</option>
                  <option value='Principal'>Principal</option>
                  <option value='Proprietor'>Proprietor</option>
                  <option value='HOD'>HOD</option>

                  
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
           <div class="form-row">
            <div class="col-md-6">
             <label for="exampleInputPassword1">Phonenumber</label>
             <input class="form-control" type="number" min = "1" name="number" required="required" oninput=" validity.valid||(value='')" placeholder="Enter number">
           </div>
           <div class="col-md-6">
             <label for="exampleInputPassword1">Password</label>
             <input class="form-control" type="password" name="password" required="required" placeholder="Enter password">
           </div>
         </div>
       </div>

       <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" type="submit" name="create_admin">Create</button>
      </div>

    </form>
  </div>
</div>
</div> 
</div>
</div>

<div class="modal fade" id="signature" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Signature</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"><!--Change Category Section -->
       <div class="col-10 offset-1" id="">
         <form method="post" action="" enctype='multipart/form-data'>        
          <div class="form-group">
           <div class="form-row">
            <div class="col-md-10">
             <label for="exampleInputPassword1">Signature File</label>
             <input class="form-control" type="file" name="file" required="required"/>
           </div>
         </div>
       </div>

       <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" type="submit" name="add_signature">Add</button>
      </div>
    </form>
  </div>
</div>
</div>
</div> 


</div>


