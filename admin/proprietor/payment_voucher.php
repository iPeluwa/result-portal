<?php include_once 'header_proprietor.php'; ?>
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="home_proprietor.php">Dashboard</a>
      </li>
      <!-- <li class="breadcrumb-item active">Blank Page</li> -->
    </ol>
    <div class="row">
      <div class="col-12">
        <h1>Vouchers</h1>

        <div class="col-lg-12 col-md-12">
          <h2> Payment Vouchers </h2>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <th> SN </th>
              <th> Prepared By: </th>
              <th> Reviewed and Authorized By:</th>
              <th> Approved By: </th>
              <th>Receiver</th>
              <th>Amount  </th>
              <th>Date  </th>
              <th> </th>
            </thead>
            <tbody>
              <?php
              $I = 0;
              $receive_pv = "SELECT * FROM `payment_voucher` WHERE `date_received`<>'' ORDER BY `id` DESC";
              $query_receive_pv = mysqli_query($con, $receive_pv);
              while($row_rec = mysqli_fetch_assoc($query_receive_pv)){
                $I += 1;
                $pv_id = $row_rec['id'];
                $prepared_by = $row_rec['prepared_by'];
                $rev_auth_by = $row_rec['rev_auth_by'];
                $approved_by = $row_rec['approved_by'];


                $select_prepared = "SELECT `name` FROM `accounts` WHERE `id` ='$prepared_by'";
                $query_prepared = mysqli_query($con, $select_prepared);
                $row_prepared = mysqli_fetch_assoc($query_prepared);
                $prepared_by = $row_prepared['name'];

                $select_rev_auth = "SELECT `name` FROM `accounts` WHERE `id` ='$rev_auth_by'";
                $query_select_rev = mysqli_query($con, $select_rev_auth);
                $row_rev = mysqli_fetch_assoc($query_select_rev);
                $rev_auth_by = $row_rev['name'];

                $select_approved = "SELECT `name` FROM `accounts` WHERE `id` ='$approved_by'";
                $query_approved = mysqli_query($con, $select_approved);
                $row_approved = mysqli_fetch_assoc($query_approved);
                $approved_by = $row_approved['name'];

                $show_trans_code = $row_rec['transact_code'];
                $show_receiver = $row_rec['received_by'];
                $show_amount = $row_rec['amount']; 
                $show_date = $row_rec['date_received'];
                ?>

                <tr>
                  <td> <?php echo $I; ?> </td>
                  <td><?php echo $prepared_by; ?> </td>
                  <td><?php echo $rev_auth_by; ?> </td> 
                  <td><?php echo $approved_by; ?> </td>  
                  <td><?php echo $show_receiver; ?> </td> 
                  <td><?php echo "#".$show_amount; ?> </td>
                  <td><?php echo $show_date; ?></td>
                  <form method = 'post' action='print_voucher.php';>
                    <input type='hidden' value="<?php echo $pv_id; ?>" name="pv_id"/>
                    <td> <!-- note the action of the form is open_memo.php because thebscript works for both memo and invoice !-->
                      <button class="btn btn-success" type='submit' name="open_pv" >Open </button></td>
                    </form>
                  </tr>
                  
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