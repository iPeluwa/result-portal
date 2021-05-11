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
    <div class="row">
     
      <div class="col-10 offset-1">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>Sessions  </th>
              <th> Date Created(Y-m-d)</th>
            </tr>
          </thead>
          <tbody>
           <?php 
           $get = "SELECT * FROM `session_available`";
           $query_get = mysqli_query($con,$get);
           while ($query = mysqli_fetch_assoc($query_get)){
             ?>
             <tr>
              <td>Session <?php echo $query['session_name']; ?></td>
              <td><?php echo $query['date'];?> </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <div class="col-6 offset-3" id="create">
        <form method="post"  action="">
          <div class="form-group">
            <label for="session" class="control-label">New Session</label>
            <input class="form-control" id="session" min = "1" oninput = "validity.valid || (value = '')" type="number" required="required" name="session_name" aria-describedby="session" placeholder="Enter session(The current year)">
          </div>
          <button type ="submit" class="btn btn-primary btn-block" name="session_create" >Create</button>
        </form>

        <?php include_once("session_insert.php"); ?>

      </div>
    </div>
  </div>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->
  <?php include_once 'footer.php'; ?>