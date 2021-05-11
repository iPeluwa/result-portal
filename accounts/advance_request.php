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
        <a  href="my_requests.php" class="btn btn-primary pull-right">My Requests</a>

        <h1>Advance Request Form</h1>
        <div class = "col-12">

          <form action ='request_insert.php' method='post'>
           <div class="form-group">
             <label for="select_staff">Name / Designation of Staff making request:</label>
             <div class="form-row">
              <div class="col-md-3 offset-1">
               <select class='form-control' required = 'required' name="select_staff">
                 <?php
                 $select_adm  = "SELECT * FROM `admin`";
                 $query_adm = mysqli_query($con, $select_adm);
                 while($row_adm = mysqli_fetch_assoc($query_adm)){
                  $id_adm = $row_adm['id'];
                  $name_adm = $row_adm['name'];
                  $admin_value = 'admin_'.$id_adm;
                  echo "<option value='$admin_value'>$name_adm</option>";
                } ?>

                <?php
                $select_staff  = "SELECT * FROM `teacher`";
                $query_staff = mysqli_query($con, $select_staff);
                while($row_staff = mysqli_fetch_assoc($query_staff)){
                  $id_staff = $row_staff['id'];
                  $name_staff = $row_staff['name'];
                  $teacher_value = 'teacher_'.$id_staff;
                  echo "<option value='$teacher_value'>$name_staff</option>";
                } ?>

                <?php
                $select_acc  = "SELECT * FROM `accounts`";
                $query_acc = mysqli_query($con, $select_acc);
                while($row_acc = mysqli_fetch_assoc($query_acc)){
                  $id_acc = $row_acc['id'];
                  $name_acc = $row_acc['name'];
                  $acc_value = 'accounts_'.$id_acc;
                  echo "<option value='$acc_value'>$name_acc</option>";
                } ?> 
              </select>
            </div>
          </div>
        </div>


        <div class="form-group">
          <div class="form-row">
            <div class="col-md-10 offset-1">
              <label for="exampleInputName">Amount beign requested(#)</label>
              <input type="number" min='1' step ='0.01' required = 'required' class='form-control' name="amt_in_num" oninput="validity.valid||(value='')" />
            </div>      
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md-10 offset-1">
              <label for="exampleInputName">Amount in words:</label>
              <input type="text" required= 'required' class='form-control' name="amt_in_words" />
            </div>      
          </div>
        </div>


        <div class="form-group">
          <div class="form-row">
            <div class="col-md-10 offset-1">
              <label for="exampleInputName">Purpose:</label>
              <textarea required = 'required' class='form-control' name="purpose"> </textarea>
            </div>      
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md-10 offset-1">
              <label for="exampleInputName">Date the funds will be needed</label>
              <input type="date" required = 'required' class='form-control' name="date" />
            </div>      
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md-10 offset-1">
              <label for="exampleInputName">Date the funds will be returned</label>
              <input type="date" required = 'required' class='form-control' name="date_returned" />
            </div>      
          </div>
        </div>
        
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-10 offset-1">
              <label for="exampleInputName">Signature:</label>
              <a class='form-control'> The request form will be sent to the staff for signing </a>
            </div>      
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md-10 offset-1">
             <label for="exampleInputName"  class="font-weight-bold">To be authorized by:</label>
             <select  class='form-control' required = 'required' name="authorized_by">
              <?php
              $select_rev  = "SELECT * FROM `admin`";
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
          <div class="col-md-10 offset-1">        
            <label for="exampleInputName"  class="font-weight-bold"> Approved by:</label>
            <select  class='form-control' required = 'required' name="approved_by">
              <?php
              $select_app  = "SELECT * FROM `admin`";
              $query_app = mysqli_query($con, $select_app);
              while($row_app = mysqli_fetch_assoc($query_app)){
                $id_app = $row_app['id'];
                $name_app = $row_app['name'];
                echo "<option value='$id_app'>$name_app</option>";
              }
              ?>
            </select>       
          </div>
        </div>
      </div>


      <div class="form-group">
       <div class="col-md-3 ">       
         <button class='btn btn-success ' type='submit' name='create_request'>Create Form</button>
       </div>
     </div>
   </form>
 </div>

 <div class="col-lg-10 col-md-10">
  <h2> Advance Request Forms </h2>
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <th> SN </th>
      <th> Created For</th>
      <th>Amount</th>
      <th>To be paid back </th>
      <th>Date Created </th>
      <th>Status  </th>
      <th>Change Status </th>
    </thead>
    <tbody>
      <?php
      $I = 0;
      $receive_req = "SELECT * FROM `advance_request` ORDER BY `id` DESC";
      $query_receive_req = mysqli_query($con, $receive_req);
      while($row_req = mysqli_fetch_assoc($query_receive_req)){
        $I += 1;
        $staff_id = $row_req['staff_id'];
        $staff_cat = $row_req['staff_category'];

        $select_staff = "SELECT * FROM `$staff_cat` WHERE `id` = '$staff_id' ORDER BY `id` DESC";
        $query_select = mysqli_query($con, $select_staff);
        $row_select = mysqli_fetch_assoc($query_select);

        $form_id = $row_req['id'];
        $staff_name = $row_select['name'];
        $amount = $row_req['amt_in_num'];
        $date = $row_req['date']; 
        $date_returned = $row_req['date_returned'];
        if($row_req['signature'] == '0'){
          $status = 'Not Signed yet';
        }else if($row_req['authorized_state'] == '0'){
          $status = 'Not Authorized yet';
        }else if($row_req['approved_state'] == '0'){
         $status = 'Not Approved yet';              
       }else{
        if($row_req['paid_back'] == '0'){
          $status = 'Not Paid';
        }else if($row_req['paid_back'] == '1'){
          $status = 'Paid Back';
        }
      }
      ?>

      <tr>
        <td> <?php echo $I; ?> </td>
        <td><?php echo $staff_name; ?> </td> 
        <td><?php echo $amount; ?> </td> 
        <td><?php echo $date_returned; ?> </td>
        <td><?php echo $date; ?> </td>
        <td><?php echo $status; ?></td>
        <td><?php
        if($status == 'Not Paid'){
          ?>
          <form method='post' action='request_insert.php'>
            <input type='hidden' value = '<?php echo $form_id; ?>' name='form_id' />
            <button class='btn btn-success' name='pay' type='submit'> Money Returned </button>
          </form>
          <?php   } ?>
        </td>

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
