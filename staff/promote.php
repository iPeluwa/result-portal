
<?php include_once ('header.php');
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

          <h1>Promote students</h1>


              <div class="col-10 offset-1" id="">
               <form method="post" action="">        
                <div class="form-group">
                 <div class="form-row">

                  <div class="col-md-6 offset-3">
                   <label for="exampleInputPassword1"class="font-weight-bold">Promote all students except</label>
                     <select  multiple class="form-control" type="text" name="student[]">
                  <?php
                          $get = "SELECT * FROM `student` WHERE `class_id`='$classroom_id'";
                          $query_get = mysqli_query($con,$get);
                          while ($array = mysqli_fetch_assoc($query_get)) {
                          echo "<option value='{$array['id']}'>{$array['fname']} ". " "." {$array['lname']}"."</option>";
                            }
                            ?>
                </select>
               </div>
            
              <div class="col-md-6 offset-3">
               <label for="exampleInputPassword1" class="font-weight-bold">to</label>
                   <select class="form-control" type="text" name="class">
                      <option value='none'>None for now</option>
                  <?php
                          $get_c = "SELECT * FROM `classes`";
                          $query_get_c = mysqli_query($con,$get_c);
                          while ($array_c = mysqli_fetch_assoc($query_get_c)) {
                          echo "<option value='{$array_c['id']}' >{$array_c['class']} </option>";
                            }
                            ?>
                </select>              </div>
            </div>

            </div>

          <div class="modal-footer">
            <button class="btn btn-primary" type="submit" name="promote">Promote</button>
        </div>
             </form>
             <?php   include('promote_insert.php'); ?>
          </div>
        



                                </div>
                              </div>
                             </tbody>
   						   </div>
               </div>
   						 <!-- /.container-fluid-->
   				 <!-- /.content-wrapper-->

   		 <?php
   		  include_once 'footer.php';
   		   ?>
