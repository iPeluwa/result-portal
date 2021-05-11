
<?php require_once ('header.php');
include_once('school_insert.php'); ?>

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

        <h1>School Information</h1>

        <table class="table table-user-information">
          <tbody class="col-4">
            <tr>
              <td>School Name:</td>
              <td>
               <td>
                <?php 
                if($school_name_state == TRUE){
                  echo $school_name;
                }elseif($school_name_state == FALSE){
                  echo "<button data-toggle='modal' data-target='#name' class='btn btn-primary'>Add School Name</button>";
                }
                ?>
              </tr>
              <tr>
                <td>School Email:</td>
                <td>       <td>
                  <?php 
                  if($school_email_state == TRUE){
                    echo $email;
                  }elseif($school_email_state == FALSE){
                    echo "<button data-toggle='modal' data-target='#email' class='btn btn-primary'>Add School Email</button>";
                  }
                  ?>
                </tr>
                <tr>
                  <td>Contact Phonenumber:</td>
                  <td>        <td>
                    <?php 
                    if($school_number_state == TRUE){
                      echo $phonenumber;
                    }elseif($school_number_state == FALSE){
                      echo "<button data-toggle='modal' data-target='#phonenumber' class='btn btn-primary'>Add School Number</button>";
                    }
                    ?>
                  </tr>
                  <tr>
                    <td>Address:</td>
                    <td>        <td>
                      <?php 
                      if($school_address_state == TRUE){
                        echo $school_address;
                      }elseif($school_address_state == FALSE){
                        echo "<button data-toggle='modal' data-target='#address' class='btn btn-primary'>Add School Address</button>";
                      }
                      ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.container-fluid-->
          <!-- /.content-wrapper-->
          <?php include_once 'footer.php'; ?>
          <div class="modal fade" id="name" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add School Name</h5>
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
                       <label for="exampleInputPassword1">School Name</label>
                       <input class="form-control" type="text" name="name" required="required" Placeholder = 'School Name'/>
                     </div>
                   </div>
                 </div>

                 <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <button class="btn btn-primary" type="submit" name="add_name">Add</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div> 


    </div>

    <div class="modal fade" id="email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add School Email</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body"><!--Change Category Section -->
           <div class="col-10 offset-1" id="">
             <form method="post" action="">        
              <div class="form-group">
               <div class="form-row">
                <div class="col-md-10">
                 <label for="exampleInputPassword1">School Email</label>
                 <input class="form-control" type="email" name="email" required="required" Placeholder = 'School Email'/>
               </div>
             </div>
           </div>

           <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit" name="add_email">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> 
</div>

<div class="modal fade" id="phonenumber" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add School Phonenumber</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"><!--Change Category Section -->
       <div class="col-10 offset-1" id="">
         <form method="post" action="">        
          <div class="form-group">
           <div class="form-row">
            <div class="col-md-10">
             <label for="exampleInputPassword1">Contact Phonenumber</label>
             <input class="form-control" type="number" min = '1' oninput = "validity.valid||(value='')" name="phonenumber" Placeholder = 'School Phonenumber'required="required"/>
           </div>
         </div>
       </div>

       <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" type="submit" name="add_phonenumber">Add</button>
      </div>
    </form>
  </div>
</div>
</div>
</div> 


</div>
<div class="modal fade" id="address" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add School Address</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"><!--Change Category Section -->
       <div class="col-10 offset-1" id="">
         <form method="post" action="">        
          <div class="form-group">
           <div class="form-row">
            <div class="col-md-10">
             <label for="exampleInputPassword1">School Address</label>
             <input class="form-control" type="text" name="address" Placeholder = 'School address' required="required"/>
           </div>
         </div>
       </div>

       <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" type="submit" name="add_address">Add</button>
      </div>
    </form>
  </div>
</div>
</div>
</div> 


</div>