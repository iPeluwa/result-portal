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

        <h1>Vouchers</h1>
        <div class = "col-12">
          <h1>Petty Cash Voucher</h1>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-10 offset-1">
                <label for="exampleInputName"  class="font-weight-bold">Date:</label>
                <a ><?php echo date('Y-m-d'); ?></a>

              </div>
            </div>
          </div>


          <div class="form-group">
            <div class="form-row">
              <div class="col-md-10 offset-1">
                <label for="exampleInputName" class="font-weight-bold">Name:</label>
                <a><?php echo $username; ?></a>

              </div>       
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-10 offset-1">
                <label for="exampleInputName"  class="font-weight-bold">Address:</label>
                <a><?php //echo $address; ?></a>

              </div>       
            </div>
          </div>

          <form action ='pettyv_insert.php' method='post'>
           <table class="table table-striped table-bordered table-hover">
            <thead>
              <th> Transaction Code </th>
              <th>Description </th>
              <th>Amount</th>

            </thead>
            <tbody>

             <tr>
               <td>
                 <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-10 offset-1">
                      <label for="exampleInputName">Transaction Code:</label>
                      <input type="number" min='1' class='form-control' required = 'required' name="transact_code" oninput="validity.valid||(value='')" />
                    </div>
                  </div>
                </div>
              </td>


              <td>   
               <div class="form-group">
                <div class="form-row">
                  <div class="col-md-10 offset-1">
                    <label for="exampleInputName">Details</label>
                    <textarea class='form-control' name='details' required='required' type='text'></textarea>
                  </div>
                </div>
              </div>
            </td>


            <td> 
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-10 offset-1">
                    <label for="exampleInputName">Amount(#)</label>
                    <input type="number" min='1' required = 'required' class='form-control' max='20000' name="amt" oninput="validity.valid||(value='')" />
                  </div>      
                </div>
              </div>
            </td>

          </tr>


        </tbody>
      </table>
      <a><b>Total Price: <?php echo "#"//.$total_price; ?></b></a></br></br>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-4">
            <label for="exampleInputName" class="font-weight-bold">Payee:</label>
            <input type="text" class='form-control' required = 'required' name="customer_id"  />

          </div>  

          
          <div class="col-md-4 ">
            <label for="exampleInputName"  class="font-weight-bold">Chargeable To:</label>
            <input type="text" class='form-control' required = 'required' name="chargeable_to" />
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-4">
            <label for="exampleInputName"  class="font-weight-bold">Amount in words:</label>
            <input type="text" class='form-control' required = 'required' name="amt_in_words"  />
          </div>


          <div class="col-md-5 ">
            <label for="exampleInputName"  class="font-weight-bold">To be reviewed and authorized by:</label>
            <select  class='form-control' required = 'required' name="rev_auth_by">
              <?php
              $select_rev  = "SELECT * FROM `accounts`";
              $query_rev = mysqli_query($con, $select_rev);
              while($row_rev = mysqli_fetch_assoc($query_rev)){
                $id_rev = $row_rev['id'];
                $name_rev = $row_rev['name'];
                echo "<option value='$id_rev'>$name_rev</option>";
              }
              ?>
            </select>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-4 ">
            <label for="exampleInputName"  class="font-weight-bold">To be approved by:</label>
            <select  class='form-control' required = 'required' name="approved_by">
              <?php
              $select_app  = "SELECT * FROM `accounts`";
              $query_app = mysqli_query($con, $select_app);
              while($row_app = mysqli_fetch_assoc($query_app)){
                $id_app = $row_app['id'];
                $name_app = $row_app['name'];
                echo "<option value='$id_app'>$name_app</option>";
              }
              ?>
            </select>              </div>

            <div class="col-md-4 ">
              <label for="exampleInputName"  class="font-weight-bold">To be received by:</label>
              <input type="text" class='form-control' required = 'required' name="received_by"/>
            </div>



          </div>
        </div>

        <div class="form-group">
         <div class="col-md-3 ">       
           <button class='btn btn-success ' type='submit' name='create_pettyv'>Create Petty Cash Voucher</button>
         </div>
       </div>
     </form>
   </div>

   <div class="col-lg-8 col-md-8">
    <h2> Petty Cash Vouchers </h2>
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <th> SN </th>
        <th> Transaction Code</th>
        <th>Receiver</th>
        <th>Amount  </th>
        <th>Date  </th>
        <th> </th>
      </thead>
      <tbody>
        <?php
        $I = 0;
        $receive_pv = "SELECT * FROM `petty_cash_voucher` WHERE `date_received`<>'' ORDER BY `id` DESC";
        $query_receive_pv = mysqli_query($con, $receive_pv);
        while($row_rec = mysqli_fetch_assoc($query_receive_pv)){
          $I += 1;
          $petty_cash_id = $row_rec['id'];
          $show_trans_code = $row_rec['transact_code'];
          $show_receiver = $row_rec['received_by'];
          $show_amount = $row_rec['amt_in_num']; 
          $show_date = $row_rec['date_received'];
          ?>

          <tr>
            <td> <?php echo $I; ?> </td>
            <td><?php echo $show_trans_code; ?> </td> 
            <td><?php echo $show_receiver; ?> </td> 
            <td><?php echo $show_amount; ?> </td>
            <td><?php echo $show_date; ?></td>
            <form method = 'post' action='print_petty_cash.php';>
              <input type='hidden' value="<?php echo $petty_cash_id; ?>" name='petty_cash_id'/>
              <td> <!-- note the action of the form is open_memo.php because the script works for both memo and invoice !-->
                <button class="btn btn-success" type='submit' name="print_petty_cash" >Open </button></td>
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










<?php include_once 'footer.php'; ?>
