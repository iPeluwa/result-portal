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
        <h1>Pay Roll</h1>

        <div class="col-10 offset-1">
          <h2> Records </h2>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <th>SN </th>
              <th> Staff </th>
              <th> Salary </th>
            </thead>
            <tbody>
              <?php

              $select_payroll = "SELECT * FROM `pay_roll` ORDER BY `id` DESC";
              $query_payroll = mysqli_query($con, $select_payroll);
              $i = 0;
              while($row = mysqli_fetch_assoc($query_payroll)){
                $i += 1;
                $payroll_id = $row['id'];
                $staff_id = $row['staff_id'];
                $staff_category = $row['staff_category'];
                $salary = $row['salary'];

                $get_name = "SELECT `name` FROM `$staff_category` WHERE `id` = '$staff_id'";
                $query_name = mysqli_query($con, $get_name);
                $row_name = mysqli_fetch_assoc($query_name);
                $staff_name = $row_name['name'];
                ?>

                <tr>
                  <td> <?php echo $i; ?> </td>
                  <td><?php echo ucfirst($staff_name);?> </td>
                  <td><?php echo $salary; ?></td>
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

<?php include_once 'footer.php'; ?>
