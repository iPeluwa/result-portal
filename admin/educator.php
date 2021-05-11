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
        <input class="form-control" type="text" name = 'search_name' required = 'required' placeholder="Search Staff Name" aria-label="Search">
        <button class='btn btn-success' type = 'submit' name='search'>Search </button>
      </div>
    </form>

    <div class="row pull-right">
      <div class="col-2 offset-6">   </div>
      <button type="button"data-toggle="modal" data-target="#delete" class="btn btn-primary"> Delete Staff Record </button>
    </div>
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>Staff <a data-toggle="modal" data-target="#create" class="text-primary pull-right">Create New <a> </th>
          <th> Email Address <a data-toggle="modal" data-target="#change_email" class="text-primary pull-right">Change<a>  </th>
          <th> Category <a data-toggle="modal" data-target="#changecat" class="text-primary pull-right">Change<a></th>
        </tr>
      </thead>
      <tbody>
       <?php 
       if(!isset($_POST['search'])){
        $get = "SELECT * FROM `teacher` WHERE `date_left` = '' ";
        $query_get = mysqli_query($con,$get);
        while ($query = mysqli_fetch_assoc($query_get)){
         ?>
         <tr>
          <td><?php echo $query['name']; ?></td>
          <td><?php echo $query['email'];?> </td>
          <td><?php if ($query['category'] == "1" )  echo "Class Teacher";
          elseif ($query['category'] == "2") echo "Subject Teacher";?>
        </td>
      </tr>
      <?php }}

      else{ 

        if(isset($_POST['search'])){
          $search_name = strip_tags(mysqli_real_escape_string($con, $_POST['search_name']));

          $get_search = "SELECT * FROM `teacher` WHERE `date_left` = '' AND (`name` LIKE '%".$search_name."%') ORDER BY `id` DESC ";
          $query_get_search = mysqli_query($con,$get_search);
          while ($query = mysqli_fetch_assoc($query_get_search)){
           ?>
           <tr>
            <td><?php echo $query['name']; ?></td>
            <td><?php echo $query['email'];?> </td>
            <td><?php if ($query['category'] == "1" )  echo "Class Teacher";
            elseif ($query['category'] == "2") echo "Subject Teacher";?>
          </td>
        </tr>
        <?php }
        if(mysqli_num_rows($query_get_search) < 1){
          echo "<b>The name you search doesnt exist </b>";
        }
      }
    } ?>

  </tbody>
</table>
</div>
<?php include("educator_query.php"); ?> 
</div>
<?php include_once 'footer.php'; ?>

<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changemail">Create a New Staff</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="col-10 offset-1" id="create">
        <!-- <h3> Create a New Staff </h3> -->
        <form method="post" action="">

         <div class="form-group">
          <div class="form-row">
           <div class="col-md-6">
            <label for="exampleInputName">Name</label>
            <input class="form-control" type="text" name="name" required = "required"  placeholder="Enter Name">
          </div>

          <div class="col-md-6">
            <label for="exampleInputPassword1">Email</label>
            <input class="form-control" type="email" name="email" required = "required"  placeholder="Email">
          </div>

        </div>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6">
            <label for="category">Category</label>
            <select class="form-control" name="category">
              <option value="1">Class Teacher</option>
              <option value="2">Subject Teacher </option>
            </select>
          </div>

          <div class="col-md-6">
            <label for="exampleConfirmPassword">Password</label>
            <input class="form-control" type="password" name="password" required = "required" placeholder="Password">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="form-row">
         <div class="col-md-6">
          <label for="exampleInputPassword1">Phone Number</label>
          <input class="form-control" type="number" min = "1" oninput=" validity.valid||(value='')"  required = "required"  name="phonenumber" placeholder="Phone Number">
        </div>        
      </div>
      <br>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" type="submit" name="btn-signup">Create</button>
      </div>
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

       <div class="col-10 offset-1" id="change_category">
        <!-- <h4> Change Category </h4> -->
        <form method="post" action="">

         <div class="form-group">
          <div class="form-row">
           <div class="col-md-6">
            <label for="exampleInputPassword1">Email</label>
            <input class="form-control" type="email" required = "required" name="c_email" placeholder="Email">
          </div>               

          <div class="col-md-6">
            <label for="category">Category</label>
            <select class="form-control" type="text" name="new_category">
              <option value="1">Class Teacher</option>
              <option value="2">Subject Teacher </option>
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

        <form method="post" action="">
         <div class="col-10 offset-1" id="change_category">
          <!-- <h4> Change Category </h4> -->
          <div class="form-group">
            <div class="form-row">
             <div class="col-md-6">
               <label for="exampleInputPassword1">Old Email</label>
               <input class="form-control" type="email" required = "required" name="old_email" placeholder="Old Email">
             </div>

             <div class="col-md-6">
              <label for="exampleInputPassword1">New Email</label>
              <input class="form-control" type="email" name="new_email" required = "required" placeholder=" New Email">
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="btn-change-email">Change</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete">Delete Staff Record</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!-- Change email section -->
      <form method="post" action="">
       <div class="col-10 offset-1" id="change_email">
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
      </div>
    </form>
  </div>
</div>
</div>

