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
        <h1>Sign Vouchers </h1>
        
        <h2>Payment Voucher</h2>
        <div class = "col-6 pull-right">
          <h3>Review and authorize</h3>

          <div class="col-lg-10 col-md-10">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <th> SN </th>
                <th>Receiver</th>
                <th>Amount  </th>
                <th> </th>
              </thead>
              <tbody>
                <?php
                $I = 0;
                $receive_pv = "SELECT * FROM `payment_voucher` WHERE `rev_auth_by`='$userid' AND `date_rev_auth` = '' ORDER BY `id` DESC";
                $query_receive_pv = mysqli_query($con, $receive_pv);
                while($row_rec = mysqli_fetch_assoc($query_receive_pv)){
                  $I += 1;
                  $pv_id = $row_rec['id'];
                  $show_trans_code = $row_rec['transact_code'];
                  $show_receiver = $row_rec['received_by'];
                  $show_amount = $row_rec['amount']; 
                  $show_date = $row_rec['date_received'];
                  ?>

                  <tr>
                    <td> <?php echo $I; ?> </td>
                    <td><?php echo $show_receiver; ?> </td> 
                    <td><?php echo $show_amount; ?> </td>
                    <form method = 'post' action='open_voucher.php';>
                      <input type='hidden' value="<?php echo $pv_id; ?>" name='pv_id'/>
                      <td> <!-- note the action of the form is open_memo.php because thebscript works for both memo and invoice !-->
                        <button class="btn btn-success" type='submit' name="review_pv" >Review </button></td>
                      </form>
                    </tr>
                    
                    <?php   }   ?>
                  </tbody>
                </table>

              </div>

            </div>


            <div class = "col-6 ">
              <h3>Approve</h3>

              <div class="col-lg-10 col-md-10">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <th> SN </th>
                    <th>Receiver</th>
                    <th>Amount  </th>
                    <th> </th>
                  </thead>
                  <tbody>
                    <?php
                    $I = 0;
                    $approve_pv = "SELECT * FROM `payment_voucher` WHERE `approved_by`='$userid' AND `date_approved` = '' AND `date_rev_auth` <> ''  ORDER BY `id` DESC";
                    $query_approve_pv = mysqli_query($con, $approve_pv);
                    while($row_rec = mysqli_fetch_assoc($query_approve_pv)){
                      $I += 1;
                      $pv_id = $row_rec['id'];
                      $show_trans_code = $row_rec['transact_code'];
                      $show_receiver = $row_rec['received_by'];
                      $show_amount = $row_rec['amount']; 
                      ?>

                      <tr>
                        <td> <?php echo $I; ?> </td>
                        <td><?php echo $show_receiver; ?> </td> 
                        <td><?php echo $show_amount; ?> </td>
                        <form method = 'post' action='open_voucher.php';>
                          <input type='hidden' value="<?php echo $pv_id; ?>" name='pv_id'/>
                          <td> <!-- note the action of the form is open_memo.php because thebscript works for both memo and invoice !-->
                            <button class="btn btn-success" type='submit' name="approve_pv" >Approve </button></td>
                          </form>
                        </tr>
                        
                        <?php   }   ?>
                      </tbody>
                    </table>

                  </div>

                </div>


              </div>
            </div>







            <div class="row">
              <div class="col-12">
                <h2>Petty Cash Voucher</h2>
                <div class = "col-6 pull-right">
                  <h3>Review and authorize</h3>

                  <div class="col-lg-10 col-md-10">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <th> SN </th>
                        <th>Receiver</th>
                        <th>Amount  </th>
                        <th> </th>
                      </thead>
                      <tbody>
                        <?php
                        $I = 0;
                        $receive_pv = "SELECT * FROM `petty_cash_voucher` WHERE `rev_auth_by`='$userid' AND `date_rev_auth` = '' ORDER BY `id` DESC";
                        $query_receive_pv = mysqli_query($con, $receive_pv);
                        while($row_rec = mysqli_fetch_assoc($query_receive_pv)){
                          $I += 1;
                          $pv_id = $row_rec['id'];
                          $show_trans_code = $row_rec['transact_code'];
                          $show_receiver = $row_rec['received_by'];
                          $show_amount = $row_rec['amt_in_num']; 
                          $show_date = $row_rec['date_received'];
                          ?>

                          <tr>
                            <td> <?php echo $I; ?> </td>
                            <td><?php echo $show_receiver; ?> </td> 
                            <td><?php echo $show_amount; ?> </td>
                            <form method = 'post' action='open_petty_cash.php';>
                              <input type='hidden' value="<?php echo $pv_id; ?>" name='pv_id'/>
                              <td> <!-- note the action of the form is open_memo.php because thebscript works for both memo and invoice !-->
                                <button class="btn btn-success" type='submit' name="review_petty_cash" >Review </button></td>
                              </form>
                            </tr>
                            
                            <?php   }   ?>
                          </tbody>
                        </table>

                      </div>    
                    </div>


                    <div class = "col-6 ">
                      <h3>Approve</h3>

                      <div class="col-lg-10 col-md-10">
                        <table class="table table-striped table-bordered table-hover">
                          <thead>
                            <th> SN </th>
                            <th>Receiver</th>
                            <th>Amount  </th>
                            <th> </th>
                          </thead>
                          <tbody>
                            <?php
                            $I = 0;
                            $approve_pv = "SELECT * FROM `petty_cash_voucher` WHERE `approved_by`='$userid' AND `date_approved` = '' AND `date_rev_auth` <> ''  ORDER BY `id` DESC";
                            $query_approve_pv = mysqli_query($con, $approve_pv);
                            while($row_rec = mysqli_fetch_assoc($query_approve_pv)){
                              $I += 1;
                              $pv_id = $row_rec['id'];
                              $show_trans_code = $row_rec['transact_code'];
                              $show_receiver = $row_rec['received_by'];
                              $show_amount = $row_rec['amt_in_num']; 
                              ?>

                              <tr>
                                <td> <?php echo $I; ?> </td>
                                <td><?php echo $show_receiver; ?> </td> 
                                <td><?php echo $show_amount; ?> </td>
                                <form method = 'post' action='open_petty_cash.php';>
                                  <input type='hidden' value="<?php echo $pv_id; ?>" name='pv_id'/>
                                  <td> <!-- note the action of the form is open_memo.php because thebscript works for both memo and invoice !-->
                                    <button class="btn btn-success" type='submit' name="approve_petty_cash" >Approve </button></td>
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
                </div>
              </div>

              








              <?php include_once 'footer.php'; ?>
