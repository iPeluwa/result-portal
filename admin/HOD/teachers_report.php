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
        <h1>Teacher's Report</h1>
        

        <div class="col-lg-5 col-md-5">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <th> SN </th>
              <th> Sender</th>
              <th>Date Sent </th>
              <th>  </th>
            </thead>
            <tbody>
              <?php
              $I = 0;

              $sender_name = $username;
              $select = "SELECT * FROM `report` WHERE `recepient_id` = '$userid' ORDER BY `id` DESC";
              $query_select  = mysqli_query($con, $select);
              while( $row = mysqli_fetch_assoc($query_select)){
                $I += 1;
                $sender_id = $row['sender_id'];
                $sender_category = $row['sender_category'];
                $date = $row['date'];
                $report_id = $row['id'];

                $select_sender = "SELECT `name` FROM `$sender_category` WHERE `id`='$sender_id'";
                $query_sender = mysqli_query($con, $select_sender);
                $row_sender = mysqli_fetch_assoc($query_sender);

                $sender_name = $row_sender['name'];
                
                ?>

                <tr><td> <?php echo $I; ?> </td><td><?php echo $sender_name;?> </td> <td><?php echo $date; ?></td>
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

  </div>
</div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include_once 'footer.php'; ?>