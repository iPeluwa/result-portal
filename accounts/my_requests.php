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
              $receive_req = "SELECT * FROM `advance_request` WHERE `staff_id` = '$userid' AND `staff_category` = 'accounts' ORDER BY `id` DESC";
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
         </div>

         <?php include_once 'footer.php'; ?>
