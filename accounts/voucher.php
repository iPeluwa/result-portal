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
        <div class = "col-8 offset-2">
          <h1>Payment Voucher</h1>
          <button data-toggle="modal" data-target="#create_invoice" class="btn btn-primary pull-right">Add new Item</button>

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

          <table class="table table-striped table-bordered table-hover">
            <thead>
              <th> SN </th>
              <th> Transaction Code </th>
              <th>Description </th>
              <th>Amount</th>
              <th>Delete </th>

            </thead>
            <tbody>

              <?php
              $total_price = 0;

              $check = "SELECT * FROM `pv_transact` WHERE `signed`=''";
              $query_check = mysqli_query($con, $check);
           while($row = mysqli_fetch_assoc($query_check)){//there should be only one row so no while loop
            $PV_id = $row['id'];
            $transact_code = $row['transact_code'];
            $description = $row['description'];
            $amount = $row['amount'];
            $total_price += $amount;  
            ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $transact_code; ?></td>
              <td> <?php echo $description; ?></td>
              <td> <?php echo "#".$amount; ?></td>
              <td>
                <form action='invoice_insert.php' method='post'>
                  <input type='hidden' value='<?php echo $product_id; ?>' name='delete_product'/>
                  <button class='btn btn-danger' type='submit' name='delete'>Delete </button>
                </form>
              </td>
            </tr>


            <?php
          } 


          ?>
        </tbody>
      </table>
      <a><b>Total Price: <?php echo "#".$total_price; ?></b></a></br></br>
      <form action ='create_invoice.php' method='post'>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md-5">
              <label for="exampleInputName" class="font-weight-bold">Student Name:</label>
              <select class='form-control' name='customer_id'>
                <?php
                $pick_stud = "SELECT * FROM `student`";
                $query_stud = mysqli_query($con, $pick_stud);
                while($row_stud = mysqli_fetch_assoc($query_stud)){
                  $stud_id = $row_stud['id'];
                  $stud_name = $row_stud['fname']. " ". $row_stud['lname'];
                  echo "<option value='$stud_id'>$stud_name</option>";

                }

                ?>

              </select> 

            </div>       
            <div class="col-md-3 offset-2">
             <input type='hidden' name = 'invoice_id' value ='<?php echo $invoice_id; ?>' />  
             <input type='hidden' name = 'username' value ='<?php echo $username; ?>' />               
             <input type='hidden' name = 'userid' value ='<?php echo $userid; ?>' />               
             
             <button class='btn btn-success ' type='submit' name='create_invoice'>Create Invoice</button>
           </div>
         </div>
       </div>

     </form>
   </div>

   <div class="col-lg-5 col-md-5">
    <h2> Invoices </h2>
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <th> SN </th>
        <th> Student</th>
        <th>Date Sent </th>
        <th>  </th>
      </thead>
      <tbody>
        <?php
        $I = 0;
        $receive_invoice = "SELECT * FROM `invoice` ORDER BY `id` DESC";
        $query_receive_invoice = mysqli_query($con, $receive_invoice);
        while($row_rec = mysqli_fetch_assoc($query_receive_invoice)){
          $I += 1;
          $student_id = $row_rec['customer_id'];
          $filename = $row_rec['filename'];

                      //to get the student name              
          $select_student = "SELECT * FROM `student` WHERE `id` = '$student_id'";
          $query_student = mysqli_query($con, $select_student);
          $row_stud = mysqli_fetch_assoc($query_student);
          $student_name = $row_stud['fname']. " " .$row_stud['lname'];
          $date = $row_rec['date'];
          ?>

          <tr><td> <?php echo $I; ?> </td><td><?php echo $student_name;?> </td> <td><?php echo $date; ?></td>
            <form method = 'post' action='open_memo.php';>
              <input type='hidden' value="<?php echo $filename; ?>" name='filename'/>
              <td> <!-- note the action of the form is open_memo.php because thebscript works for both memo and invoice !-->
                <button class="btn btn-success" type='submit' name="open_invoice" >Open </button></td></tr>
              </form>
              <?php   }   ?>
            </tbody>
          </table>

        </div>

      </div>
    </div>
  </div>
</div>







<div class="modal fade" id="create_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete">Add new Item</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!-- Change email section -->
      <div class="col-12" id="send_memo">
        <form action="invoice_insert.php" method="post" enctype="multipart/form-data">

         <div class="form-group">
          <div class="form-row">
            <div class="col-md-10 offset-1">
              <label for="exampleInputName">Quantity:</label>
              <input type="number" min='1' required = 'required' name="qty" oninput="validity.valid||(value='')" />
            </div>
            
            <div class="col-md-10 offset-1">
              <label for="exampleInputName">Material</label>
              <select  class="form-control" name="material_id" required="required">
                <?php 

                $select_material = "SELECT `id`,`material` FROM `materials`";
                $query_material = mysqli_query($con, $select_material);
                while($row = mysqli_fetch_assoc($query_material)){
                  $material_id = $row['id']; $material = $row['material'];
                  echo "<option value='$material_id'>$material</option>";

                }
                ?>
              </select>
            </div>
          </div>
        </div>


        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="add_to_invoice"> Add</button>
        </div>
      </form>

    </div>

  </div>
</div>
</div>




<?php include_once 'footer.php'; ?>
