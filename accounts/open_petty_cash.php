<?php
require_once('header.php');
require_once('../fpdf/fpdf.php');
if(isset($_POST['review_petty_cash'])){
  $pv_id = $_POST['pv_id'];

  $select_pv = "SELECT * FROM `petty_cash_voucher` WHERE `id` = '$pv_id'";
  $query_pv = mysqli_query($con, $select_pv);
  $row = mysqli_fetch_assoc($query_pv);
  $chargeable_to = $row['chargeable_to'];
  $pv_id = $row['id'];
  $transact_code = $row['transact_code'];
  $details = $row['details'];
  $amt_in_words = $row['amt_in_words'];
  $amt_in_num = $row['amt_in_num'];
  $payee = $row['payee'];
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
                    <label for="exampleInputName">Details</label>
                    <textarea class='form-control' name='details' required='required' type='text'><?php echo $details; ?></textarea>
                  </div>
                </div>
              </div>
            </td>
            

            <td> 
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-10 offset-1">
                    <label for="exampleInputName">Amount(#)</label>
                    <input type="number" min='1' required = 'required' value = '<?php echo $amt_in_num; ?>' class='form-control' name="amt" oninput="validity.valid||(value='')" />
                  </div>      
                </div>
              </div>
            </td>

          </tr>


        </tbody>
      </table>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-5">
            <label for="exampleInputName" class="font-weight-bold">Payee:</label>
            <input type="text" class='form-control' value='<?php echo $payee; ?>' required = 'required' name="customer_id"  />

          </div>  

          
          <div class="col-md-5 ">
            <label for="exampleInputName"  class="font-weight-bold">Chargeable To:</label>
            <input type="text" class='form-control' value='<?php echo $chargeable_to; ?>' required = 'required' name="customer_id"  />
          </div>
          

        </div>
      </div>
      
      <div class="form-group">
        <div class="form-row">
          
         <div class="col-md-5 ">
           <label for="exampleInputName"  class="font-weight-bold">To be received by:</label>
           <input type="text" class='form-control' required = 'required' value='<?php echo $received_by; ?>' name="received_by"/>
         </div>

         <div class="col-md-5">
          <label for="exampleInputName"  class="font-weight-bold">Amount in words:</label>
          <input type="text" class='form-control' value='<?php echo $amt_in_words; ?>' required = 'required' name="customer_id"  />
        </div>

      </div>
    </div>
    <div class="col-md-4 ">       
     <input type="hidden" value='<?php echo $pv_id; ?>' name="pv_id"/>
     <button class='btn btn-success ' type='submit' name='authorize_petty_cash'>Authorize</button>
     
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
if(isset($_POST['authorize_petty_cash'])){

  $pv_id = $_POST['pv_id'];

  $select_pv = "SELECT * FROM `petty_cash_voucher` WHERE `id` = '$pv_id'";
  $query_pv = mysqli_query($con, $select_pv);
  $row = mysqli_fetch_assoc($query_pv);
  $chargeable_to = $row['chargeable_to'];
  $pv_id = $row['id'];
  $transact_code = $row['transact_code'];
  $details = $row['details'];
  $amt_in_words = $row['amt_in_words'];
  $amt_in_num = $row['amt_in_num'];
  $payee = $row['payee'];
  $date = date('Y-m-d');

  $select_trans = "SELECT * FROM `petty_cash_voucher` WHERE `transact_code`='$transact_code' AND `id` <> '$pv_id'";
  $query_trans = mysqli_query($con, $select_trans);
  $row_trans = mysqli_num_rows($query_trans);
  if($row_trans == 1){
   echo "<script type='text/javascript'>alert('The transaction code you added has already beign used')</script>";
   echo "<script type='text/javascript'>window.location.href='sign_voucher.php'</script>";
 }else{

  $update_pv = "UPDATE `petty_cash_voucher` SET 
  `chargeable_to` = '$chargeable_to',
  `amt_in_words`= '$amt_in_words',
  `amt_in_num` = '$amt_in_num',
  `details` = '$details',
  `transact_code`= '$transact_code',
  `details` ='$details',
  `amt_in_words` = '$amt_in_words',
  `amt_in_num` = '$amt_in_num',
  `payee` = '$payee',
  `date_rev_auth` = '$date' WHERE `id` = '$pv_id'";
  $query_update = mysqli_query($con, $update_pv);
  if($query_update){
   echo "<script type='text/javascript'>alert('Petty Cash Voucher Authorized')</script>";
   echo "<script type='text/javascript'>window.location.href='sign_voucher.php'</script>";
 }else{
   echo "<script type='text/javascript'>alert('Something Went Wrong')</script>";
   echo "<script type='text/javascript'>window.location.href='sign_voucher.php'</script>";
 }
}
}

?>
<?php

if(isset($_POST['approve_petty_cash'])){
  $pv_id = $_POST['pv_id'];

  $select_pv = "SELECT * FROM `petty_cash_voucher` WHERE `id` = '$pv_id'";
  $query_pv = mysqli_query($con, $select_pv);
  $row = mysqli_fetch_assoc($query_pv);
  $pv_id = $row['id'];
  $transact_code = $row['transact_code'];
  $details = $row['details'];
  $amt_in_num = $row['amt_in_num'];
  $payee = $row['payee'];
  $chargeable_to = $row['chargeable_to'];
  $amt_in_words = $row['amt_in_words'];
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
                      <a class='form-control'><?php echo $transact_code; ?></a>
                    </div>
                  </div>
                </div>
              </td>
              

              <td>   
               <div class="form-group">
                <div class="form-row">
                  <div class="col-md-10 offset-1">
                    <label for="exampleInputName">Details</label>
                    <a class='form-control'><?php echo $details; ?></a>
                  </div>
                </div>
              </div>
            </td>
            

            <td> 
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-10 offset-1">
                    <label for="exampleInputName">Amount(#)</label>
                    <a class='form-control' ><?php echo $amt_in_num; ?> </a>
                  </div>      
                </div>
              </div>
            </td>

          </tr>


        </tbody>
      </table>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-5">
            <label for="exampleInputName" class="font-weight-bold">Payee:</label>
            <a class ='form-control'><?php echo $payee; ?></a>

          </div>  

          
          <div class="col-md-5 ">
            <label for="exampleInputName"  class="font-weight-bold">Chargeable To:</label>
            <a class='form-control'><?php echo $chargeable_to; ?></a>
          </div>
          

        </div>
      </div>
      
      <div class="form-group">
        <div class="form-row">
          
         
         <div class="col-md-5">
          <label for="exampleInputName"  class="font-weight-bold">Amount in words:</label>
          <a class='form-control'><?php echo $amt_in_words; ?></a>
        </div>

      </div>
    </div>
    <div class="col-md-4 ">       
     <input type="hidden" value='<?php echo $pv_id; ?>' name="pv_id"/>
     <button class='btn btn-success ' type='submit' name='approve_petty_cash_voucher'>Approve</button>
     
   </div>

 </forrm>

</div>
</div>
</div>
</div>
<?php

}else{
//echo "<script type='text/javascript'>window.location.href='sign_voucher.php'</script>";
}  ?>

