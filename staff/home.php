<?php require_once 'header.php'; 
include_once('profile_insert.php');
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
      <div class="row">
        <div class="col-12">
          <h1>Educator Information</h1>
           <table class="table table-user-information">
                                  <tbody class="col-4">
                                      <tr>
                                          <td>Name</td>
                                          <td>
                                              <?php echo $username; ?> </td>
                                      </tr>
                                     <?php if($category == "1"){ ?>

                                      <tr>
                                          <td>Class Incharge</td>
                                          <td>
                                             <?php echo $classroom; ?>
                                          </td>
                                      </tr>
                                      <?php } ?>
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
                                      <tr>
                                          <td>Email</td>
                                          <td><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include_once 'footer.php'; ?>
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
