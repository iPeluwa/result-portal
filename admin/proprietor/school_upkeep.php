<?php include_once 'header_proprietor.php'; ?>
<div class="content-wrapper">    <!-- /.container-fluid-->
  <div class="container-fluid">    <!-- /.content-wrapper-->

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="home_proprietor.php">Dashboard</a>
      </li>
      <!-- <li class="breadcrumb-item active">Blank Page</li> -->
    </ol>
    <div class="row">
      <div class="col-12">
        <h1>General School Upkeep</h1>

        <div class="col-10 offset-1">
          <h2> Upkeeps </h2>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <th>SN </th>
              <th> Upkeep </th>
              <th> Price per session</th>
              <th>Session started </th>

            </thead>
            <tbody>
              <?php

              $select_upkeep = "SELECT * FROM `gen_schl_upkeep` WHERE `session_ended` = '' ORDER BY `id` DESC";
              $query_select_upkeep = mysqli_query($con, $select_upkeep);
              $i = 0;
              while($row = mysqli_fetch_assoc($query_select_upkeep)){
                $i += 1;
                $upkeep = $row['name'];
                $price_per_session = $row['amt_per_session'];
                $session_started = $row['session_started'];
                $upkeep_id = $row['id'];

                ?>

                <tr>
                  <td> <?php echo $i; ?> </td>
                  <td><?php echo $upkeep;?> </td>
                  <td><?php echo $price_per_session; ?></td>
                  <td><?php echo  $session_started; ?></td>
                </tr>
              </div>

              <?php   }  ?>
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