<?php include_once 'header.php';

include('student_insert.php');
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
          <h1>Parent Information</h1>
           <table class="table table-user-information">
                                  <tbody class="col-4">
                                      <tr>
                                          <td>Name:</td>
                                          <td>
                                              <?php echo $name; ?> </td>
                                      </tr>
                                      <tr>
                                          <td>Relationship:</td>
                                          <td><?php echo $relation; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Phone Number:</td>
                                          <td><?php echo $phone; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Email</td>
                                          <td><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></td>
                                        </tr>
                                         <tr>
                                          <td>Number of Children</td>
                                         <?php $num_child = "SELECT * FROM `student` WHERE `parent_id` = '$userid'";
                                           $q_num_child = mysqli_query($con,$num_child);

                                           $child_num = mysqli_num_rows($q_num_child);
                                           echo "<td>". $child_num . "</td>";
                                           ?>

                                           </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->


     <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <!-- select session section -->
               <div class="col-10 offset-1" id="Select Session">
                  <form action="home.php" method="post">
          
              <div class="col-md-12">
                <label for="exampleConfirmPassword">Select Child</label>
                <select class="form-control" type="text" name="child_id">
                  <?php
                          $get = "SELECT * FROM `student` WHERE `parent_id` = '$userid'";
                          $query_get = mysqli_query($con,$get);

                          while ($array = mysqli_fetch_assoc($query_get)) {
                          echo "<option value='{$array['id']}'>{$array['fname']}". " " . "{$array['lname']}" ."</option>";
                            }
                            ?>
                  </select>
                      </div>
         
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="choose_child">Choose</button>
        </div>
        </form>
            </div>
          </div>
          </div>
</div>
    <?php include_once 'footer.php'; ?>