  <?php include_once ('header.php');
  include_once('../online_connection.php');
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
      <form action=''class = 'form-inline' method = 'post'>
       <div class="md-form active-pink active-pink-2 mb-3 mt-0">
        <input class="form-control" type="text" name = 'search_name' required = 'required' placeholder="Search Admin Name" aria-label="Search"/>
        <button class='btn btn-success' type = 'submit' name='search'>Search </button>
      </div>
    </form>
    <div class="row pull-right">
      <div class="col-2 offset-6">
        <!-- <a href="staff_category.php" class="text-primary">Edit Staff Categories</a> -->
      </div>
      <button type="button"data-toggle="modal" data-target="#delete" class="btn btn-primary">Delete Staff Record</button>
    </div>
    <table class="table table-user-information">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
           <th>Staff </th>
           <th> Email Address <a data-toggle="modal" data-target="#change_email" class="text-primary pull-right">Change<a></th>
           <th> Category <a data-toggle="modal" data-target="#changecat" class="text-primary pull-right">Change<a></th>
         </tr>
       </thead>
       <tbody>
         <?php 
         if(!isset($_POST['search'])){
          $get = "SELECT * FROM `admin` WHERE `date_left` = ''";
          $query_get = mysqli_query($con,$get);
          while ($query = mysqli_fetch_assoc($query_get)){
           ?>
           <tr>
            <td><?php echo $query['name']; ?></td>
            <td><?php echo $query['email'];?> </td>
            <td><?php echo $query['Category']; ?>
            </td>
          </tr>
          <?php }}
          else{
            if(isset($_POST['search'])){
              $search_name = strip_tags(mysqli_real_escape_string($con, $_POST['search_name']));
              $get_search = "SELECT * FROM `admin` WHERE `date_left` = '' AND (`name` LIKE '%".$search_name."%') ORDER BY `id` DESC";
              $query_get_search = mysqli_query($con,$get_search);
              while ($query = mysqli_fetch_assoc($query_get_search)){
               ?>

               <tr>
                <td><?php echo $query['name']; ?></td>
                <td><?php echo $query['email'];?> </td>
                <td><?php echo $query['Category']; ?>
                </td>
              </tr>


              <?php
            }
            if(mysqli_num_rows($query_get_search) < 1){
              echo "<b> The name you searched doesnt exist </b>";
            }
          }
        }
        ?>
      </tbody>
    </table>
  </table>
</div>
</div>

<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include_once 'footer.php'; ?>


<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete">Delete Admin Record</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!-- Change email section -->
      <div class="col-10 offset-1" id="delete_staff">
       <form method="post" action="">
         <div class="form-group">
           <div class="col-md-12">
            <label for="exampleInputPassword1">Email</label>
            <input class="form-control" type="email" name="email" required = "required" placeholder="Email">
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="delete_staff">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="changecat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Category</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"><!--Change Category Section -->

       <div class="col-12 " id="change_category">
        <!-- <h4> Change Category </h4> -->
        <form method="post" action="">

         <div class="form-group">
          <div class="form-row">
           <div class="col-md-6">
            <label for="exampleInputPassword1">Email</label>
            <input class="form-control" type="email" name="c_email" placeholder="Email" required = 'required'>
          </div>               

          <div class="col-md-6">
            <label for="category">Category</label>
            <select class='form-control' name="new_category" required = 'required'>
              <option>Database Manager</option>
              <option>HOD</option>
              <option>Principal</option>
              <option>Proprietor</option>
            </select> 
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" type="submit" name="btn-change-category">Change</button>
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

       <div class="col-10 offset-1" id="change_email">
        <!-- <h4> Change Category </h4> -->
        <form method="post" action="">

         <div class="form-group">
          <div class="form-row">
           <div class="col-md-6">
             <label for="exampleInputPassword1">Old Email</label>
             <input class="form-control" type="email" name="old_email" required = 'required' placeholder="Old Email">
           </div>

           <div class="col-md-6">
            <label for="exampleInputPassword1">New Email</label>
            <input class="form-control" type="email" name="new_email" required = 'required' placeholder=" New Email">
          </div>

        </div>
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" type="submit" name="btn_change_email">Change</button>

      </div>
    </form>
  </div>
</div>
</div>
</div>
</div>

<?php include("admin_query.php"); ?> 
