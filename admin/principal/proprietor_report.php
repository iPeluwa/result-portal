<?php include_once 'header.php'; ?>
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
        <h1>Proprietor's  Report</h1>
        
        <div class="col-12" id="principal's_report">
          <form action="report_insert.php" method="post" >

           <div class="form-group">
            <div class="form-row">
              <div class="col-md-10 offset-1">
                <label for="title">Title: </label>
                <input name='title' class='form-control' placeholder='Title' required='required' />
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-10 offset-1">
                <label for="report">Report: </label>
                <textarea type='text' name='report' required = 'required' class='form-control'></textarea>
              </div>
            </div>
          </div>

          
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-10 offset-1">
                <label for="exampleInputName">To :</label>
                <select  class="form-control" name="recepient">
                  <?php 

                  $select_proprietor = "SELECT `id`,`name` FROM `admin` WHERE `Category` = 'Proprietor'";
                  $query_select_proprietor = mysqli_query($con, $select_proprietor);
                  while($query_proprietor = mysqli_fetch_assoc($query_select_proprietor)){
                    $proprietor_id = $query_proprietor['id']; $proprietor_name = $query_proprietor['name'];
                    echo "<option value='$proprietor_id'>$proprietor_name</option>";
                    
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>



          <div class="modal-footer">
           
           <button class="btn btn-primary" type="submit" name="send_report"> Send </button>
         </div>

       </form>
     </div>


     <div class="col-lg-10 col-md-10">
      <h2> Reports Sent </h2>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <th> SN </th>
          <th> Sender</th>
          <th> Recepient</th>
          <th>Date Sent </th>
          <th>  </th>
        </thead>
        <tbody>
          <?php
          $I = 0;

          $sender_name = $username;
          $select = "SELECT * FROM `report` WHERE `sender_id` = '$userid' ORDER BY `id` DESC";
          $query_select  = mysqli_query($con, $select);
          while( $row = mysqli_fetch_assoc($query_select)){
            $I += 1;
            $recepient_id = $row['recepient_id'];
            $recepient_category = $row['recepient_category'];
            $date = $row['date'];
            $report_id = $row['id'];

            $select_recepient = "SELECT `name` FROM `$recepient_category` WHERE `id`='$recepient_id'";
            $query_recepient = mysqli_query($con, $select_recepient);
            $row_recepient = mysqli_fetch_assoc($query_recepient);

            $recepient_name = $row_recepient['name'];
            
            ?>

            <tr><td> <?php echo $I; ?> </td><td><?php echo $sender_name;?> </td> <td><?php echo $recepient_name;?> </td><td><?php echo $date; ?></td>
              <form method = 'post' action='show_report.php';>
                <input type='hidden' value="<?php echo $report_id; ?>" name='report_id'/>
                <td> <button class="btn btn-success" type='submit' name="open_report" >Open </button></td></tr>
              </form>
              <?php   }   ?>
            </tbody>
          </table>

        </div>




      </div>
    </div>
  </div>
</div>


<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include_once 'footer.php'; ?>