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

        <h1>Receipt</h1>
        <div class = "col-12">

          <div class="form-group pull-right">
            <div class="form-row">
              <div class="col-lg-6 offset-4">
                <label for="exampleInputName"  class="font-weight-bold">Date:</label>
                <a ><?php echo date('Y-m-d'); ?></a>

              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-10 offset-1">
                <label for="exampleInputName"  class="font-weight-bold">Address:</label>
                <a><?php //echo $address; ?></a>
              </div>       
            </div>
          </div>

          <form action="receipt_insert.php" method="post" enctype="multipart/form-data">

           <table>
            <tr><th class='form-label'>Received from:</th>
             <td><input type="text" class='form-control' required = 'required' name="received_from"/></td>
           </tr>

           <tr> <th class='form-label' >The sum of / Cheque of(words):</th>
             <td><input type="text" class='form-control' required = 'required' name="money_naira" /></td><td>Naira</td>
             <td><input type="text" class='form-control' required = 'required' name = "money_kobo"/></td><td>Kobo </td>
           </tr>

           <tr> <th class='form-label' >Amount in number:</th>
             <td><input type="number" min='1' step = '0.01' oninput="validity.valid||(value='')" class='form-control' required = 'required' name="money_naira" /></td><td>Naira</td>
           </tr>

           <tr> <th class='form-label'>Being payment for:</th>
             <td><input type="text" class='form-control' required = 'required' name="payment_for" /></td>
           </tr>
           
           <tr> <th class='form-label'>Customer's Sign:</th> 
            <td><input type="file" class='form-control' required = 'required' name="file" /></td></tr>
            <tr> <th class='form-label'>Account's Sign:</th> </tr>


            <tr><th></th><td>
             <button class='btn btn-primary' name='create_receipt'> Create Receipt </button>
           </td>
         </tr>
       </table>
     </form>



     <div class="col-lg-5 col-md-5">
      <h2> Receipts </h2>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <th> SN </th>
          <th> Customer </th>
          <th>Date Sent </th>
          <th>  </th>
        </thead>
        <tbody>
          <?php
          $I = 0;
          $receive_receipts = "SELECT * FROM `receipt` ORDER BY `id` DESC";
          $query_receive_receipts = mysqli_query($con, $receive_receipts);
          while($row_rec = mysqli_fetch_assoc($query_receive_receipts)){
            $I += 1;
            $customer_name = $row_rec['received_from'];
            $filename = $row_rec['filename'];
            $date = $row_rec['date'];
            ?>

            <tr><td> <?php echo $I; ?> </td><td><?php echo $customer_name;?> </td> <td><?php echo $date; ?></td>
              <form method = 'post' action='open_memo.php';>
                <input type='hidden' value="<?php echo $filename; ?>" name='filename'/>
                <td> <!-- note the action of the form is open_memo.php because thebscript works for both memo and invoice !-->
                  <button class="btn btn-success" type='submit' name="open_receipt" >Open </button></td></tr>
                </form>
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
