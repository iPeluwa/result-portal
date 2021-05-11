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

        <h1>Advance Request Form</h1>
        <div class = "col-12">
          <a class = 'font-weight-bold text-warning'> If you are in need of an advance request form, please contact the accounts officials.</a></br>
          <a class = 'font-weight-bold text-warning'> If you have returned the money and the status has not changed please contact the accounts officials. </a></br></br>

        </div>
        <h2> My Requests </h2>
        
        <div class="col-10">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <th> SN </th>
              <th>Amount</th>
              <th>To be paid back </th>
              <th>Date Created </th>
              <th>Status  </th>
            </thead>
            <tbody>
              <?php
              $I = 0;
              $receive_req = "SELECT * FROM `advance_request` WHERE `staff_id` = '$userid' AND `staff_category` = 'admin' ORDER BY `id` DESC";
              $query_receive_req = mysqli_query($con, $receive_req);
              while($row_req = mysqli_fetch_assoc($query_receive_req)){
                $I += 1;

                $form_id = $row_req['id'];
                $staff_name = $username;
                $amount = $row_req['amt_in_num'];
                $date = $row_req['date']; 
                $date_returned = $row_req['date_returned'];
               ?>

                <tr>
                  <td> <?php echo $I; ?> </td>
                  <td><?php echo $amount; ?> </td> 
                  <td><?php echo $date_returned; ?> </td>
                  <td><?php echo $date; ?> </td>
                  <td>
                    <?php
                    if($row_req['signature'] == '0'){
                      ?>
                      <form action ='sign_form.php' method = 'post'>
                        <input type='hidden' name='form_id' value = '<?php echo $form_id; ?>'  />
                        <button class='btn btn-primary' type='submit' name='sign_form'>Sign</button>
                      </form>
                      <?php
                    }else if($row_req['signature'] == '1') {
                     if ($row_req['paid_back'] == '0'){ echo 'Signed'; }
                     else if ($row_req['paid_back'] == '1'){ echo 'Paid Back'; }
                   }

                   ?></td>

                 </tr>

                 <?php   }   ?>
               </tbody>
             </table>

           </div>


           <div class="col-6 pull-right">
             <h2> Authorize </h2>
             <table class="table table-striped table-bordered table-hover">
              <thead>
                <th> SN </th>
                <th>Staff </th>
                <th>Amount</th>
                <th>Open</th>
              </thead>
              <tbody>
                <?php
                $I = 0;
                $receive_auth = "SELECT * FROM `advance_request` WHERE `authorized_by` = '$userid' AND `authorized_state` = '0' AND `signature` <> '0' ORDER BY `id` DESC";
                $query_receive_auth = mysqli_query($con, $receive_auth);
                while($row_auth = mysqli_fetch_assoc($query_receive_auth)){
                  $I += 1;

                  $staff_id = $row_auth['staff_id'];
                  $staff_cat = $row_auth['staff_category'];

                  $select_staff = "SELECT `name` FROM `$staff_cat` WHERE `id` = '$staff_id'";
                  $query_select = mysqli_query($con, $select_staff);
                  $row_staff = mysqli_fetch_assoc($query_select);

                  $staff_name = ucfirst($row_staff['name']);
                  $form_id = $row_auth['id'];
                  $amount = $row_auth['amt_in_num'];
                  
                  ?>

                  <tr>
                    <td> <?php echo $I; ?> </td>
                    <td><?php echo $staff_name; ?> </td> 
                    <td><?php echo "#".$amount; ?> </td>
                    <td>
                      <form action='open_request.php' method='post'>
                        <input type='hidden' name='form_id' value='<?php echo $form_id; ?>' />
                        <button class='btn btn-success' ntype = 'submit' name='authorize_open'>Open</button>
                      </form> </td>
                      
                    </tr>
                    
                    <?php   }   ?>
                  </tbody>
                </table>

              </div>



              <div class="col-6 pull-right">
               <h2> Approve </h2>
               <table class="table table-striped table-bordered table-hover">
                <thead>
                  <th> SN </th>
                  <th>Staff </th>
                  <th>Amount</th>
                  <th>Open</th>
                </thead>
                <tbody>
                  <?php
                  $I = 0;
                  $receive_app = "SELECT * FROM `advance_request` WHERE `approved_by` = '$userid' AND `approved_state` = '0' AND `authorized_state` = '1' ORDER BY `id` DESC";
                  $query_receive_app = mysqli_query($con, $receive_app);
                  while($row_app = mysqli_fetch_assoc($query_receive_app)){
                    $I += 1;

                    $staff_id = $row_app['staff_id'];
                    $staff_cat = $row_app['staff_category'];

                    $select_staff = "SELECT `name` FROM `$staff_cat` WHERE `id` = '$staff_id'";
                    $query_select = mysqli_query($con, $select_staff);
                    $row_staff = mysqli_fetch_assoc($query_select);

                    $staff_name = ucfirst($row_staff['name']);
                    $form_id = $row_app['id'];
                    $amount = $row_app['amt_in_num'];
                    
                    ?>

                    <tr>
                      <td> <?php echo $I; ?> </td>
                      <td><?php echo $staff_name; ?> </td> 
                      <td><?php echo "#".$amount; ?> </td>
                      <td>
                        <form action='open_request.php' method='post'>
                          <input type='hidden' name='form_id' value='<?php echo $form_id; ?>' />
                          <button class='btn btn-success' type='submit' name='approve_open'>Open</button>
                        </form> </td>
                        
                      </tr>
                      
                      <?php   }   ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div>
          </div>
        </div>

        








        <?php include_once 'footer.php'; ?>
