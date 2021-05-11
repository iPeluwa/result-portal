<?php include_once 'header.php';?>
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
        <button type="button"data-toggle="modal" data-target="#send_memo" class="btn btn-primary pull-right">Send Memo</button>
        <button type="button"data-toggle="modal" data-target="#awaiting_signing" class="btn btn-primary ">Memos awaiting your signature</button>
        <button type="button"data-toggle="modal" data-target="#view_unsigned" class="btn btn-primary offset-3 ">Unsigned Memo</button>
        <h1>Memos</h1>
        <div class="col-lg-5 col-md-5 pull-right">
          <h2> Sent Memos </h2>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <th> SN </th>
              <th>Date Sent </th>
              <th>  </th>

            </thead>
            <tbody>
              <?php
              $i = 0;
              $select_memo = "SELECT * FROM `memo` WHERE `sender_id` = '$userid' AND `sender_category` ='admin' AND `signature`='Signed' ORDER BY `id` DESC";
              $query_select_memo = mysqli_query($con, $select_memo);
              while($row = mysqli_fetch_assoc($query_select_memo)){
                $i += 1;
                $sender_id = $row['sender_id']; 
                $sender_category = $row['sender_category'];
                $filename = $row['filename'];
                ?>
                <tr> <td> <?php echo $i; ?> </td><td><?php echo $row['date']; ?></td>
                 <form method = 'post' action='open_memo.php';>
                  <input type='hidden' value="<?php echo $filename; ?>" name='filename'/>
                  <td> <button class="btn btn-success" action = "open_memo.php" name="open_memo" >Open </button></td></tr>
                </form>
                <?php } ?>
              </tbody>
            </table>

          </div>


          <div class="col-lg-5 col-md-5">
            <h2> Recieved memos </h2>
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <th>SN </th>
                <th> Sender ID </th>
                <th>Date Sent </th>
                <th>  </th>
              </thead>
              <tbody>
                <?php

                $receive_memo = "SELECT * FROM `memo`  WHERE `signature`='Signed' ORDER BY `id` DESC";
                $query_receive_memo = mysqli_query($con, $receive_memo);
                while($row_rec = mysqli_fetch_assoc($query_receive_memo)){
                  

                  $hods_id = explode("," , $row_rec['admin_id']);
                  $memo_id = $row_rec['id'];
                  $sent = array();
                  foreach($hods_id AS $hod_id){
                    if($hod_id == $userid){


                     $sent[] = $memo_id;
                   }
                 }
                 
                 $I = 0;
                 foreach ($sent as $id) {
                  $I += 1;
                  $show_memo = "SELECT * FROM `memo` WHERE `id`  = '$memo_id' ORDER BY `id` DESC";
                  $query_show_memo = mysqli_query($con, $show_memo);
                  $row_sent = mysqli_fetch_assoc($query_show_memo);
                  $filename = $row_sent['filename'];


                  $senders_id = $row_sent['sender_id']; 
                  $senders_category = $row_sent['sender_category'];      
                  $select_sender = "SELECT `name` FROM `$senders_category` WHERE `id` = '$senders_id' ";
                  $q_select_sender = mysqli_query($con, $select_sender);
                  $pick = mysqli_fetch_assoc($q_select_sender);
                  $sender_name = $pick['name'];          

                  ?>

                  <tr><td><?php echo $I; ?> </td><td><?php echo $sender_name;?> </td> <td><?php echo $row_sent['date']; ?></td>
                   <form method = 'post' action='open_memo.php';>
                    <input type='hidden' value="<?php echo $filename; ?>" name='filename'/>
                    <td> <button class="btn btn-success" action = "open_memo.php" name="open_memo" >Open </button></td></tr>
                  </form>
                  <?php   }   } ?>
                </tbody>
              </table>

            </div>

          </div>
        </div>
      </div>
    </div>

    

    <div class="modal fade" id="view_unsigned" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="delete">Unsigned Memo</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <!-- Change email section -->
          <div class="col-12" id="view_memo">

            <h2>Memos Awaiting Signing </h2>
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <th> SN </th>
                <th>  </th>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $select_memo = "SELECT * FROM `memo` WHERE `sender_id` = '$userid' AND `signature` = 'Not signed' ORDER BY `id` DESC";
                $query_select_memo = mysqli_query($con, $select_memo);
                while($row = mysqli_fetch_assoc($query_select_memo)){
                  $i += 1;
                  $sender_id = $row['sender_id']; 
                  $sender_category = $row['sender_category'];
                  $filename = $row['filename'];

                  ?>
                  <tr><td><?php echo $i; ?> </td>
                    <td>  <form method = 'post' action='open_memo.php';>
                      <input type='hidden' value="<?php echo $filename; ?>" name='filename'/>
                      <button class="btn btn-success" action = "open_memo.php" name="check_memo" >Open </button>
                    </form>

                  </td></tr>
                  <?php } ?>
                </tbody>
              </table>



            </div>

          </div>
        </div>
      </div>
      <div class="modal fade" id="awaiting_signing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="delete">Memos </h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <!-- Change email section -->
            <div class="col-12" id="view_memo">

              <h2>Memos you are required to sign </h2>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <th> SN </th>
                  <th>  Written By:</th>
                  <th> </th>
                  <th> </th>
                </thead>
                <tbody>
                  <?php
                  $i = 0;
                  $select_memo = "SELECT * FROM `memo` WHERE `signatory_id` = '$userid' AND `signature` = 'Not signed' ORDER BY `id` DESC";
                  $query_select_memo = mysqli_query($con, $select_memo);
                  while($row = mysqli_fetch_assoc($query_select_memo)){
                    $i += 1;
                    $sender_id = $row['sender_id']; 
                    $sender_category = $row['sender_category'];
                    $filename = $row['filename'];
                    
                    $memo_id = $row['id'];
                    $select_sender = "SELECT `name` FROM `$sender_category` WHERE `id` = '$sender_id'";
                    $query_sender = mysqli_query($con, $select_sender);
                    $row_sender = mysqli_fetch_assoc($query_sender);

                    $sender_name = $row_sender['name'];
                    ?>
                    <tr><td><?php echo $i; ?> </td><td><?php echo $sender_name; ?></td>
                      <td>  <form method = 'post' action='open_memo.php';>
                        <input type='hidden' value="<?php echo $filename; ?>" name='filename'/>
                        <button class="btn btn-success"  name="check_memo" >Open </button>
                      </form>

                    </td> <td>  <form method = 'post' action='memo_insert.php';>
                    <input type='hidden' value="<?php echo $filename; ?>" name='filename'/>
                    <input type='hidden' value="<?php echo $memo_id; ?>" name='memo_id'/>
                    <button class="btn btn-success"  name="sign_memo" > Sign</button>
                  </form>

                </td></tr>
                <?php } ?>
              </tbody>
            </table>



          </div>

        </div>
      </div>
    </div>





    <div class="modal fade" id="send_memo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="delete">Send Memo</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <!-- Change email section -->
          <div class="col-12" id="send_memo">
            <form action="memo_insert.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-10 offset-1">
                    <label for="exampleInputName">File</label>
                    <input type='file' class="form-control" required='required' name="file"> </textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-10 offset-1">
                    <label for="exampleInputName">To Subject teachers</label>
                    <select  multiple class="form-control" name="subject_staff_recepient[]">
                      <?php 

                      $select = "SELECT `id`,`name` FROM `teacher` WHERE `category` = '2'";
                      $query_select = mysqli_query($con, $select);
                      while($query = mysqli_fetch_assoc($query_select)){
                        $staff_id = $query['id']; $staff_name = $query['name'];
                        echo "<option value='$staff_id'>$staff_name</option>";
                        
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-10 offset-1">
                    <label for="exampleInputName">To Class teachers</label>
                    <select  multiple class="form-control" name="class_staff_recepient[]">
                      <?php 

                      $select_c_teacher = "SELECT `id`,`name` FROM `teacher` WHERE `category` = '1'";
                      $query_select_c = mysqli_query($con, $select_c_teacher);
                      while($query_c = mysqli_fetch_assoc($query_select_c)){
                        $staff_c_id = $query_c['id']; $staff_c_name = $query_c['name'];
                        echo "<option value='$staff_c_id'>$staff_c_name</option>";
                        
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-10 offset-1">
                    <label for="exampleInputName">To Accountants</label>
                    <select  multiple class="form-control" name="account_recepient[]">
                      <?php 

                      $select_acc = "SELECT `id`,`name` FROM `accounts`";
                      $query_select_acc = mysqli_query($con, $select_acc);
                      while($query_acc = mysqli_fetch_assoc($query_select_acc)){
                        $acc_id = $query_acc['id']; $acc_name = $query_acc['name'];
                        echo "<option value='$acc_id'>$acc_name</option>";
                        
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-10 offset-1">
                  <label for="exampleInputName">To Admin</label>
                  <select multiple class="form-control" name="admin_recepient[]">
                    <?php 

                    $select_admin = "SELECT `id`,`name` FROM `admin`";
                    $q_select_admin = mysqli_query($con, $select_admin);
                    while($query = mysqli_fetch_assoc($q_select_admin)){
                      $admin_id = $query['id']; $admin_name = $query['name'];
                      echo "<option value='$admin_id'>$admin_name</option>";
                      
                    }
                    ?>
                  </select>
                </div>
              </div>


              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-10 offset-1">
                    <label for="exampleInputName">To be signed by</label>
                    <select  class="form-control" name="signed_by" required="required">
                      <?php 

                      $select_sign = "SELECT `id`,`name` FROM `admin`";
                      $query_select_sign = mysqli_query($con, $select_sign);
                      while($query_sign = mysqli_fetch_assoc($query_select_sign)){
                        $sign_id = $query_sign['id']; $sign_name = $query_sign['name'];
                        echo "<option value='$sign_id'>$sign_name</option>";
                        
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>


              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary"  type="submit" name="preview_memo">Download Template</button>
                <button class="btn btn-primary" type="submit" name="send_memo"> Send </button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>




  <?php include_once 'footer.php'; ?>
