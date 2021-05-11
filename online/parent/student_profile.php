<?php include_once 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php?id=<?php echo $child_id;?>">Dashboard</a>
        </li>
        <!-- <li class="breadcrumb-item active">Blank Page</li> -->
      </ol>
        <button type="button"data-toggle="modal" data-target="#child" class="btn btn-primary offset-8">Select Child</button>
      <div class="row">
        <div class="col-12">
          <h1>My Child's Information</h1>
           <table class="table table-user-information">
            <?php include_once('student_insert.php'); ?>
                                  <tbody class="col-4">
                                      <tr>
                                          <td>Name:</td>
                                          <td>
                                              <?php echo $student_name; ?> </td>
                                      </tr>
                                      <tr>
                                          <td>Gender:</td>
                                          <td><?php echo $student_gender; ?></td>
                                      </tr>
                                      <tr>
                                          <td> Birthday (Y-M-D): </td>
                                          <td> <?php echo $birthday;?> </td>
                                      <tr>
                                          <td>Class:</td>
                                          <td><?php echo $student_class; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Class Teacher:</td>
                                          <td><?php echo $teacher_name; ?> </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

 <div class="modal fade" id="child" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <!-- select session section -->
               <div class="col-10 offset-1" id="Select Session">
                  <form action="" method="post">
          
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
<?php
if(isset($_POST['choose_child'])){
    $child_id = $_POST['child_id']; 

      echo '<script> window.location.href="student_profile.php?id='.$child_id.'";</script>';

}
?>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include_once 'footer.php'; ?>