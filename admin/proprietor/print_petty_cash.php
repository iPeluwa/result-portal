 <?php
 require_once('printheader.php');
 if(isset($_POST['print_petty_cash'])){
    $petty_cash_id = $_POST['petty_cash_id'];

    $select_pv = "SELECT * FROM `petty_cash_voucher` WHERE `id` = '$petty_cash_id'";
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
      $date = date('Y-m-d');
         $date_prepared = $row['date_prepared'];
      $date_rev_auth = $row['date_rev_auth'];
      $date_approved = $row['date_approved'];

      $prepared_by = $row['prepared_by'];
      $rev_auth_by = $row['rev_auth_by'];
      $approved_by = $row['approved_by'];

      $get_prep = "SELECT `name` FROM `accounts` WHERE `id` = '$prepared_by'";
      $query_prep = mysqli_query($con, $get_prep);
      $row_prep = mysqli_fetch_assoc($query_prep);
      $prep_name = $row_prep['name'];

      $get_rev = "SELECT `name` FROM `accounts` WHERE `id` = '$rev_auth_by'";
      $query_rev = mysqli_query($con, $get_rev);
      $row_rev = mysqli_fetch_assoc($query_rev);
      $rev_name = $row_rev['name'];

      $get_app = "SELECT `name` FROM `accounts` WHERE `id` = '$approved_by'";
      $query_app = mysqli_query($con, $get_app);
      $row_app = mysqli_fetch_assoc($query_app);
      $app_name = $row_app['name'];
  ?>
<div class="content-wrapper">    <!-- /.container-fluid-->
    <div class="container-fluid">    <!-- /.content-wrapper-->
        <link rel='stylesheet' href='css/no_border.css' type='text/css' />

      <!-- Breadcrumbs-->
      
      <div class="row">
          <h1>Payment Voucher</h1>

        <div class="col-10">

  <form action ='' method='post'>

              <div class="form-group">
            <div class="form-row">
        <div class="col-md-5 ">
                <label for="exampleInputName"  class="font-weight-bold">Chargeable To:</label>
            <a class='form-control no-border'><?php echo $chargeable_to; ?></a>
               </div>

                    <div class="col-md-5 ">
                <label for="exampleInputName"  class="font-weight-bold">P.V No:</label>
            <a class='form-control no-border'><?php echo $pv_id; ?></a>
               </div>

              </div>
            </div>

                <div class="form-group">
            <div class="form-row">
        <div class="col-md-5 ">
                <label for="exampleInputName"  class="font-weight-bold">Date:</label>
            <a class='form-control no-border'><?php echo $date; ?></a>
               </div>
             
             <div class="col-md-5 ">
                <label for="exampleInputName"  class="font-weight-bold">Address:</label>
            <a class='form-control no-border'><?php  ?></a>
               </div>

              </div>
            </div>

           
            <div class="form-group">
            <div class="form-row">
              <div class="col-md-5">
                <label for="exampleInputName" class="font-weight-bold">Payee:</label>
              <a class ='form-control no-border'><?php echo $payee; ?></a>

              </div>  

                                 </div>
           </div>

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
               <a class='form-control no-border'><?php echo $transact_code; ?></a>
              </div>
                </div>
             </div>
              </td>
         

              <td>   
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-10 offset-1">
                <label for="exampleInputName">Details</label>
              <a class='form-control no-border'><?php echo $details; ?></a>
              </div>
               </div>
             </div>
           </td>
         

                  <td> 
                  <div class="form-group">
            <div class="form-row">
              <div class="col-md-10 offset-1">
                <label for="exampleInputName">Amount(#)</label>
            <a class='form-control no-border' ><?php echo $amt_in_num; ?> </a>
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
                <label for="exampleInputName"  class="font-weight-bold">Amount in words:</label>
            <a class='form-control no-border'><?php echo $amt_in_words; ?></a>
              </div>

                </div>




                  <div class="form-group">
            <div class="form-row">
              <div class="col-md-12 offset-1">
               <a class='form-control font-weight-bold no-border'>I certify that the above account is correct, that the services have been duly performed or that the goods have been correctly received and that the expenditure was in the interest of the HA's works.</a>
              </div>
        
            </div>
          </div>

                 <div class="form-group">
        
                 <div class="form-row">

                <div class="col-md-5 offset-1 ">
                  <label for="exampleInputName"  class="font-weight-bold">Prepared by:</label>
               <a class='form-control no-border'><?php echo $prep_name; ?></a>
                </div>
                    <div class="col-md-4 ">
                  <label for="exampleInputName"  class="font-weight-bold">Date:</label>
               <a class='form-control no-border'><?php echo $date_prepared; ?></a>
                </div>
                 </div>

                          <div class="form-row">

                <div class="col-md-5 offset-1 ">
                  <label for="exampleInputName"  class="font-weight-bold">Reviewed and Authorized by:</label>
               <a class='form-control no-border'><?php echo $rev_name; ?></a>
                </div>
                    <div class="col-md-4 ">
                  <label for="exampleInputName"  class="font-weight-bold">Date:</label>
               <a class='form-control no-border'><?php echo $date_rev_auth; ?></a>
                </div>
                 </div>

                          <div class="form-row">

                <div class="col-md-5 offset-1 ">
                  <label for="exampleInputName"  class="font-weight-bold">Approved by:</label>
               <a class='form-control no-border'><?php echo $app_name; ?></a>
                </div>
                    <div class="col-md-4 ">
                  <label for="exampleInputName"  class="font-weight-bold">Date:</label>
               <a class='form-control no-border'><?php echo $date_approved; ?></a>
                </div>
                 </div>
                 

                     <div class="form-row">

                <div class="col-md-5 offset-1 ">
                  <label for="exampleInputName"  class="font-weight-bold">Received by:</label>
               <a class='form-control no-border'><?php echo $received_by; ?></a>
                </div>
                    <div class="col-md-4 ">
                  <label for="exampleInputName"  class="font-weight-bold">Date:</label>
               <a class='form-control no-border'><?php echo $received_by; ?></a>
                </div>
                 </div>

            </div>
              <div class="col-md-4 ">       
           <input type="hidden" value='<?php echo $pv_id; ?>' name="pv_id"/>
         <button class='btn btn-success '  onclick="window.print()" >Print</button>
                        
                      </div>

        </form>

    </div>
</div>
    </div>
</div>
<?php

}else{
echo "<script type='text/javascript'>window.location.href='petty_cash_voucher.php'</script>";
}  ?>
