<?php
require_once('header.php');
require_once('../fpdf/fpdf.php');
if(isset($_POST['review_pv'])){
  $pv_id = $_POST['pv_id'];

  $select_pv = "SELECT * FROM `payment_voucher` WHERE `id` = '$pv_id'";
  $query_pv = mysqli_query($con, $select_pv);
  $row = mysqli_fetch_assoc($query_pv);
  $pv_id = $row['id'];
  $transact_code = $row['transact_code'];
  $description = $row['description'];
  $amount = $row['amount'];
  $payee = $row['payee'];
  $bank_name = $row['bank_name'];
  $cheque_num = $row['cheque_num'];
  $amt_in_words = $row['total_amt_in_words'];
  $received_by = $row['received_by'];
  ?>
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
        <div class="col-10 offest-1">
          <form action ='' method='post'>
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
                      <input type="number" min='1' class='form-control' value = '<?php echo $transact_code; ?>' required = 'required' name="transact_code" oninput="validity.valid||(value='')" />
                    </div>
                  </div>
                </div>
              </td>


              <td>   
               <div class="form-group">
                <div class="form-row">
                  <div class="col-md-10 offset-1">
                    <label for="exampleInputName">Description</label>
                    <textarea class='form-control' name='description' required='required' type='text'><?php echo $description; ?></textarea>
                  </div>
                </div>
              </div>
            </td>


            <td> 
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-10 offset-1">
                    <label for="exampleInputName">Amount(#)</label>
                    <input type="number" min='1' required = 'required' value = '<?php echo $amount; ?>' class='form-control' name="amt" oninput="validity.valid||(value='')" />
                  </div>      
                </div>
              </div>
            </td>
          </tr>

        </tbody>
      </table>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-4">
            <label for="exampleInputName" class="font-weight-bold">Payee:</label>
            <input type="text" class='form-control' value='<?php echo $payee; ?>' required = 'required' name="customer_id"  />
          </div>  

          <div class="col-md-4 ">
            <label for="exampleInputName"  class="font-weight-bold">Bank Name:</label>
            <input type="text" class='form-control' required = 'required' value='<?php echo $bank_name; ?>' name="bank_name"  />
          </div>
          
          <div class="col-md-4 ">
            <label for="exampleInputName"  class="font-weight-bold">Cheque No:</label>
            <input type="number" class='form-control' min='1' required = 'required' value='<?php echo $cheque_num; ?>' name="cheque_num" oninput="validity.valid||(value='')" />
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-4">
            <label for="exampleInputName"  class="font-weight-bold">Amount in words:</label>
            <input type="text" class='form-control' required = 'required' value='<?php echo $amt_in_words; ?>' name="amt_in_words"  />
          </div>

          <div class="col-md-4 ">
           <label for="exampleInputName"  class="font-weight-bold">To be received by:</label>
           <input type="text" class='form-control' required = 'required' value='<?php echo $received_by; ?>' name="received_by"/>
         </div>

       </div>
     </div>

     <div class="form-group">
       <div class="col-md-3 ">       
         <input type="hidden" value='<?php echo $pv_id; ?>' name="pv_id"/>
         <button class='btn btn-success ' type='submit' name='authorize_pv'>Authorize</button>
       </div>
     </div>
   </form>

 </div>
</div>
</div>
</div>
<?php

}else{
//echo "<script type='text/javascript'>window.location.href='sign_voucher.php'</script>";
}  ?>

<?php include_once 'footer.php'; ?>

<?php
require_once('header.php');
if(isset($_POST['authorize_pv'])){

  $pv_id = $_POST['pv_id'];
  $transact_code = $_POST['transact_code'];
  $description = strip_tags(mysqli_real_escape_string($con, $_POST['description']));
  $amt = $_POST['amt'];
  $bank_name =  strip_tags(mysqli_real_escape_string($con, $_POST['bank_name']));
  $cheque_num = $_POST['cheque_num'];
  $total_amt_in_words =  strip_tags(mysqli_real_escape_string($con, $_POST['amt_in_words']));
  $total_amt_in_num = $_POST['amt'];
  $payee =  strip_tags(mysqli_real_escape_string($con, $_POST['customer_id']));
  $received_by =  strip_tags(mysqli_real_escape_string($con, $_POST['received_by']));
  $date = date('Y-m-d');

  $select_trans = "SELECT * FROM `payment_voucher` WHERE `transact_code`='$transact_code' AND `id` <> '$pv_id'";
  $query_trans = mysqli_query($con, $select_trans);
  $row_trans = mysqli_num_rows($query_trans);
  if($row_trans == 1){
   echo "<script type='text/javascript'>alert('The transaction code you added has already beign used')</script>";
   echo "<script type='text/javascript'>window.location.href='sign_voucher.php'</script>";
 }else{

  $update_pv = "UPDATE `payment_voucher` SET 
  `bank_name` = '$bank_name',
  `cheque_num` = '$cheque_num',
  `total_amt_in_words`= '$total_amt_in_words',
  `total_amt_in_no` = '$total_amt_in_num',
  `transact_code`= '$transact_code',
  `description` ='$description',
  `amount`= '$amt',
  `payee` = '$payee',
  `received_by`= '$received_by',
  `date_rev_auth` = '$date' WHERE `id` = '$pv_id'";
  $query_update = mysqli_query($con, $update_pv);
  if($query_update){
   echo "<script type='text/javascript'>alert('Voucher Authorized')</script>";
   echo "<script type='text/javascript'>window.location.href='sign_voucher.php'</script>";
 }else{
   echo "<script type='text/javascript'>alert('Something Went Wrong')</script>";
   echo "<script type='text/javascript'>window.location.href='sign_voucher.php'</script>";
 }
}
}

?>

<?php

if(isset($_POST['approve_pv'])){
  $pv_id = $_POST['pv_id'];

  $select_pv = "SELECT * FROM `payment_voucher` WHERE `id` = '$pv_id'";
  $query_pv = mysqli_query($con, $select_pv);
  $row = mysqli_fetch_assoc($query_pv);
  $pv_id = $row['id'];
  $transact_code = $row['transact_code'];
  $description = $row['description'];
  $amount = $row['amount'];
  $payee = $row['payee'];
  $bank_name = $row['bank_name'];
  $cheque_num = $row['cheque_num'];
  $amt_in_words = $row['total_amt_in_words'];
  $received_by = $row['received_by'];
  ?>
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
        <div class="col-10 offest-1">

          <form action ='approve_voucher.php' method='post'>

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
                      <a class='form-control'> <?php echo $transact_code; ?></a>
                    </div>
                  </div>
                </div>
              </td>


              <td>   
               <div class="form-group">
                <div class="form-row">
                  <div class="col-md-10 offset-1">
                    <label for="exampleInputName">Description</label>
                    <a class='form-control'><?php echo $description; ?></a>
                  </div>
                </div>
              </div>
            </td>


            <td> 
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-10 offset-1">
                    <label for="exampleInputName">Amount(#)</label>
                    <a  class='form-control'> <?php echo $amount; ?></a>
                  </div>      
                </div>
              </div>
            </td>

          </tr>


        </tbody>
      </table>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-4">
            <label for="exampleInputName" class="font-weight-bold">Payee:</label>
            <a class='form-control'><?php echo $payee; ?></a>

          </div>  

          <div class="col-md-4 ">
            <label for="exampleInputName"  class="font-weight-bold">Bank Name:</label>
            <a class='form-control' ><?php echo $bank_name; ?><a/>
            </div>

            <div class="col-md-4 ">
              <label for="exampleInputName"  class="font-weight-bold">Cheque No:</label>
              <a class='form-control'><?php echo $cheque_num; ?></a>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md-4">
              <label for="exampleInputName"  class="font-weight-bold">Amount in words:</label>
              <a class='form-control'><?php echo $amt_in_words; ?></a>
            </div>


            <div class="col-md-4 ">
             <label for="exampleInputName"  class="font-weight-bold">To be received by:</label>
             <a class='form-control'><?php echo $received_by; ?></a>
           </div>



         </div>
       </div>



       <div class="form-group">
         <div class="col-md-3 ">       
           <input type="hidden" value='<?php echo $pv_id; ?>' name="pv_id"/>
           <button class='btn btn-success ' type='submit' name='approve'>Approve</button>
         </div>
       </div>

     </form>

   </div>
 </div>
</div>
</div>
<?php

}else{
//echo "<script type='text/javascript'>window.location.href='sign_voucher.php'</script>";
}  ?>

