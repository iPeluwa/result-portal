<?php include_once 'header.php'; ?>
<div class="content-wrapper">    <!-- /.container-fluid-->
  <div class="container-fluid">    <!-- /.content-wrapper-->

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="home.php">Dashboard</a>
      </li>
      <!-- <li class="breadcrumb-item active">Blank Page</li> -->
    </ol>
    <div class="row">
      <div class="col-12">
        <button type="button"data-toggle="modal" data-target="#add_record" class="btn btn-primary pull-right">Add Staff Salary</button>
        <h1>Pay Roll</h1>

          <div class="col-10 offset-1">
          <h2> Records </h2>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <th>SN </th>
              <th> Staff </th>
              <th> Salary </th>
              <th> Change Salary </th>
              <th> Delete Record </th>
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
                  <td>
                    <form action='payroll_insert.php' method='post'>
                     <div class="col-12" id="change salary">

                      <div class="form-row">
                        <div class="col-md-5 col-lg-5 ">
                          <input type="number" min="1" class='form-control' oninput="validity.valid||(value='1')"  placeholder='New Salary' name="new_price"/>
                          <input type="hidden" value="<?php echo $payroll_id; ?>" name="payroll_id"/>
                        </div>

                        <button class='btn btn-success' type='submit' name="change_price">Change Price </button> 
                      </div>
                    </div>
                  </form>   
                </td>
                <td>
                 <form action='payroll_insert.php' method='post'>
                   <div class="col-12" id="restock">

                    <div class="form-row">
                      <div class="col-md-5 col-lg-5 ">
                        <input type="hidden" value="<?php echo $payroll_id; ?>" name="payroll_id"/>
                      </div>

                      <button class='btn btn-danger' type='submit' name="delete_payroll">Delete </button> 
                    </div>
                  </div>
                </form>                  
              </td>
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


<div class="modal fade" id="add_record" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add">Add Staff Salary</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!-- Change email section -->
      <div class="col-12" id="send_memo">
        <form action="payroll_insert.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-10 offset-1">
                <label for="exampleInputName">Staff</label>
                <select class="form-control" required='required' name="staff_id">

                  <?php
                  $select_teacher = "SELECT * FROM `teacher`";
                  $query_teacher = mysqli_query($con, $select_teacher);
                  while($row_teacher = mysqli_fetch_assoc($query_teacher)){
                    $teacher_name = $row_teacher['name'];
                    $teacher_id = $row_teacher['id'];
                    $teacher_value = "teacher_".$teacher_id;
                    echo "<option value='$teacher_value'>$teacher_name</option>";
                  }

                  $select_account = "SELECT * FROM `accounts`";
                  $query_account = mysqli_query($con, $select_account);
                  while($row_account = mysqli_fetch_assoc($query_account)){
                    $account_name = $row_account['name'];
                    $account_id = $row_account['id'];
                    $account_value = "accounts_".$account_id;
                    echo "<option value='$account_value'>$account_name</option>";
                  }

                  $select_admin = "SELECT * FROM `admin`";
                  $query_admin = mysqli_query($con, $select_admin);
                  while($row_admin = mysqli_fetch_assoc($query_admin)){
                    $admin_name = $row_admin['name'];
                    $admin_id = $row_admin['id'];
                    $admin_value = "admin_".$admin_id;
                    echo "<option value='$admin_value'>$admin_name</option>";
                  }
                  ?>

                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-10 offset-1">
                <label for="exampleInputName">Salary</label>
                <input type='number' min='1' class="form-control" required='required' name="price" oninput="validity.valid||(value='1')" placeholder='salary'>
              </div>
            </div>
          </div>
          <div class="form-group">

          </div>


          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit" name="add_record"> Add </button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
</div>




<?php include_once 'footer.php'; ?>
