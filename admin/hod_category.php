
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
    </ol>
    
    <div class="row">
      <div class="col-12">
        <button type="button"data-toggle="modal" data-target="#send_message" class="btn btn-primary pull-right">Create Category</button>
        <h1>HOD Categories</h1>
        
        <div class="col-10 offset-1">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>Category  </th>
                <th> Name </th>
                <th> Date Created(Y-m-d)</th>
              </tr>
            </thead>
            <tbody>
             <?php 
             $get = "SELECT * FROM `admin`,`hod_category` WHERE `admin`.`category`='HOD' AND `hod_category`.`HOD_id` =`admin`.`id` ";
             $query_get = mysqli_query($con,$get);
             while ($query = mysqli_fetch_assoc($query_get)){
               ?>
               <tr>
                <td><?php echo $query['Category']; ?> </td>
                <td><?php echo $query['name']; ?></td>
                <td><?php echo $query['date'];?> </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>


      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->

<?php
require_once('hod_insert.php');
include_once 'footer.php';
?>

<div class="modal fade" id="send_message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete"> Create Category</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!-- Change email section -->
      <div class="col-12" id="send_message">
        <form action="" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-10 offset-1">
                <label for="exampleInputName">Category</label>
                <input class="form-control" name="category" required = "required" placeholder='Input Category'/>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-10 offset-1">
                  <label for="exampleInputName">To</label>
                  <select class="form-control" name="hod" required="required">
                    <?php
                    $select = "SELECT id,name FROM `admin` WHERE `Category`='HOD' AND `date_left` = ''";
                    $query_select = mysqli_query($con, $select);
                    while ($row = mysqli_fetch_assoc($query_select)){ 
                      echo "<option value='{$row['id']}'> {$row['name']} </option>";
                    }

                    ?>
                  </select>
                </div>
              </div>


              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit" name="create_category">Create</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>